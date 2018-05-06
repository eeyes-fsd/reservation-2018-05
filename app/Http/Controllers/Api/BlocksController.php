<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Block;

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

    public function getDates()
    {

    }
}
