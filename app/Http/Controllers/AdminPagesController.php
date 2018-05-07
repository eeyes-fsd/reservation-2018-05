<?php

namespace App\Http\Controllers;

use App\Model\Block;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    //use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin',[
            'only' => ['Login','LoginStore']
        ]);
    }

    public function Login()
    {
        return view('admin.login');
    }

    public function LoginStore(Request $request)
    {
        $credentials = $this->validate($request,[
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials))
        {
            return redirect()->intended(route('admins.index'));
        } else {
            return back()->with('danger','很抱歉，此用户和密码不匹配');
        }
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        redirect('admin.login')->with('success','退出成功');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function check()
    {
        $blocks = Block::where('status','0')->paginate(20);
        return view('admin.check',compact('blocks'));
    }
}
