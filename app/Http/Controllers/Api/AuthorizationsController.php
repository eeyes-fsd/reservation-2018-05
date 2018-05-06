<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorizationsController extends Controller
{
    public function store(Request $request)
    {
        $code = $request->code;
        $miniProgram = \EasyWeChat::miniProgram();
        $data = $miniProgram->auth->session($code);
        if (isset($data['errcode'])) {
            return $this->response->errorUnauthorized('code 不正确');
        }
        $user = User::where('weapp_openid', $data['openid'])->first();
        $attributes['weixin_session_key'] = $data['session_key'];
        if (!$user) {
            // 找不到 openid 对应的用户要求用户提交
            if (!$request->username) {
                return $this->response->errorForbidden('用户不存在');
            }
            $username = $request->username;
            filter_var($username, FILTER_VALIDATE_EMAIL) ?
                $credentials['email'] = $username :
                $credentials['phone'] = $username;
            $credentials['password'] = $request->password;
            if (!Auth::guard('api')->once($credentials)) {
                return $this->response->errorUnauthorized('用户名或密码错误');
            }
            $user = Auth::guard('api')->getUser();
            $attributes['weapp_openid'] = $data['openid'];
        }
        $user->update($attributes);
        $token = Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    public function update()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    /**
     * @param $token
     * @return mixed
     * @throws \ErrorException
     */
    public function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
