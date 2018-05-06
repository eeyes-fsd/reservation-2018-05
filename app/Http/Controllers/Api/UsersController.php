<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UsersController extends Controller
{
    public function idCard(Request $request)
    {
        if ($request->hasFile('idcard') && $request->file('idcard')->isValid())
        {
            $path = $request->file('idcard')->store('id-card','public');
            Auth::user()->update([
                'id-card' => $path,
            ]);

            return response()->json([
                'code' => 200,
                'data' => asset('storage/'.$path),
                'msg' => 'OK',
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'msg' => '上传失败',
            ]);
        }
    }

    public function checkCard()
    {
        $data = false;
        if (Auth::user()->id_card)
        {
            $data = true;
        }

        return response()->json([
            'code' => 200,
            'data' => $data,
            'msg' => 'OK',
        ]);
    }
}
