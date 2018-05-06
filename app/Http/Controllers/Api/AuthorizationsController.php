<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Model\User;
use Illuminate\Http\Request;

class AuthorizationsController extends Controller
{
    /**
     * @param Request $request
     * @throws \ErrorException
     */
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
            $user = User::create([
                'weapp_openid' => $data['openid'],
                'weixin_session_key' => $data['session_key'],
            ]);
        }
        $user->update($attributes);
        $token = Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    /**
     * @return mixed
     * @throws \ErrorException
     */
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
