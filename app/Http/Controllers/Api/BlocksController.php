<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Block;
use Auth;

class BlocksController extends Controller
{
    /**
     * Get the list of all blocks
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $blocks = Block::all();

        foreach ($blocks as $block)
        {
            if ($block->beginning_at < now())
            {
                $block->status = 0;
            }
        }

        return response()->json([
            'code' => 200,
            'data' => $blocks,
            'msg' => 'OK',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $user = Auth::guard('api')->user();
        $blocks = $request->reserve_time;

        foreach ($blocks as $block)
        {
            $temp = Block::find($block);
            $temp->user_id = $user->id;
            $temp->status = 0;
            $temp->name = $request->name;
            $temp->amount = $request->people;
            $temp->phone = $request->phone;
            $temp->unit = $request->company;
            $temp->save();
        }

        return response()->json([
            'code' => 200,
            'msg' => '预约成功',
        ]);
    }

    /**
     * @param $block_id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete($block_id)
    {
        $block = Block::find($block_id);
        $this->authorize('delete',$block);
        $data['user_id'] = null;
        $data['status'] = 1;
        $data['name'] = null;
        $data['amount'] = null;
        $data['phone'] = null;
        $data['unit'] = null;
        $data['checked'] = 0;
        $block->update($data);

        return response()->json([
            'code' => 200,
            'msg' => '预约取消成功',
        ]);
    }

    public function pass(Block $block, Request $request)
    {
        //$this->authorize('check',$block);
        $block->checked = 1;
        $block->save();

        return back()->with('success','审核通过');
    }

    public function refuse(Block $block, Request $request)
    {
        //$this->authorize('check',$block);
        $block->checked = -1;
        $block->save();

        return back()->with('success','审核拒绝');
    }
}
