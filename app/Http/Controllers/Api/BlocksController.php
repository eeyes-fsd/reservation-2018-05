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
            $temp->amount = $request->people;
            $temp->phone = $request->phone;
            $temp->unit = $request->company;
        }

        return response()->json([
            'code' => 200,
            'msg' => '预约成功',
        ]);
    }
}
