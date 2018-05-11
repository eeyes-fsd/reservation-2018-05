<?php

namespace App\Http\Controllers;

use App\Model\Memo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MemosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $memos = Memo::whereDate("begin_at", '>=' ,Carbon::today()->toDateString())->paginate(10);
        return view('memo.index',compact('memos'));
    }

    public function create()
    {
        return view('memo.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'begin_at' => 'required',
            'info' => 'required',
        ]);

        $memo = Memo::create([
            'begin_at' => $request->begin_at,
            'info' => $request->info,
        ]);

        return redirect()->route('memo.show',[$memo])->with('success','创建备忘日程成功');
    }

    public function show(Memo $memo)
    {
        return view('memo.show',compact('memo'));
    }

    public function edit(Memo $memo)
    {
        return view('memo.edit',compact('memo'));
    }

    public function update(Memo $memo, Request $request)
    {
        $this->validate($request,[
            'begin_at' => 'required',
            'info' => 'required'
        ]);

        $data['begin_at'] = $request->begin_at;
        $data['info'] = $request->info;

        $memo->update($data);

        return redirect()->route('memo.show',$memo->id)->with('success','修改备忘日程成功');
    }

    public function destroy(Memo $memo)
    {
        $memo->delete();
        return redirect()->intended('/admins')->with('danger','备忘日程删除成功');
    }
}
