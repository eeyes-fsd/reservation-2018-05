<?php

namespace App\Http\Controllers\Api;

use App\Model\Day;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function index()
    {
        $from = Carbon::today()->toDateTimeString();
        $to = Carbon::today()->addDays(30)->toDateTimeString();
        $days = Day::whereBetween('date',[$from,$to])->select('id','date')->get();

        $temp = [];

        if (Auth::check())
        {
            $blocks = Auth::guard('api')->user()->blocks;
            foreach ($blocks as $block) {
                if (in_array($block->day_id,$temp))
                {
                    continue;
                }
                $temp[] = $block->day_id;
            }
        }

        $data = [];
        foreach ($days as $day)
        {
            $status = 2;
            switch ($day->blocks->where('status',0)->count())
            {
                // 完全可用
                case 0:
                    $status = 1;
                    break;
                //不可用
                case 10:
                    $status = 3;
                    break;
            }
            /** 判断这天是否包含用户预约的时间段 */
            if (in_array($day->id,$temp))
            {
                $status = 0;
            }
            $tmp = [
                'id' => $day->id,
                'status' => $status,
                'date' => $day->date,
            ];
            $data[] = $tmp;
        }

        return response()->json([
            'code' => 200,
            'data' => $data,
            'msg' => 'OK',
        ]);
    }

    public function getDay($id)
    {
        $day = Day::find($id);
        $blocks = $day->blocks;

        $data = [];
        foreach ($blocks as $block)
        {
            $tmp = [
                'id' => $block->id,
                'begin_at' => Carbon::createFromTimeString($block->begin_at)->toTimeString(),
            ];

            if ($block->status == 0)
            {
                $tmp['status'] = 2;
                if (Auth::guard('api')->check()  && $block->user == Auth::guard('api')->user())
                {
                    $tmp['status'] = 0;
                }
            } else {
                $tmp['status'] = 1;
            }
            $data[] = $tmp;
        }

        return response()->json([
            'code' => 200,
            'data' => $data,
            'msg' => 'OK',
        ]);
    }
}
