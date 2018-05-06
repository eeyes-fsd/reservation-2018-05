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
        $days = Day::whereBetween('date',[$from,$to])->get();

        $blocks = Auth::guard('api')->user()->blocks;
        $temp = [];
        foreach ($blocks as $block) {
            if (in_array($block->day_id,$temp))
            {
                continue;
            }
            $temp[] = $block->day_id;
        }

        $data = [];
        foreach ($days as $day)
        {
            $status = 2;
            switch ($day->blocks->where('status','0')->count())
            {
                // 完全可用
                case 0:
                    $status = 1;
                //不可用
                case 4:
                    $status = 3;
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
            'data' => $day,
            'msg' => 'OK',
        ]);
    }
}
