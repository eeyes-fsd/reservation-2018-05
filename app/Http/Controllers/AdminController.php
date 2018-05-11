<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\Block;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Admin::all();
        return view('admin.list',compact('admin'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function show(Block $block)
    {
        return view('admin.show',compact('block'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success','创建管理员账户成功');
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit',compact('admin'));
    }

    public function update(Admin $admin, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $data['name'] = $request->name;
        if ($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        $admin->update($data);
        return back()->with('success','更新账户成功');
    }

    public function destroy(Admin $admin)
    {
        if (Auth::guard('admin')->user()->super = true)
        {
            $admin->delete();
            return back()->with('success','删除账户成功');
        } else {
            abort(401);
        }
    }
}
