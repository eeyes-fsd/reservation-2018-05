@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{ route('memo.index') }}">返回</a>
    <div class="panel panel-default" style="margin-top: 30px;">
        <div class="panel-heading">
            第{{ $memo->id }}号备忘日程
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">开始时间</div>
                <div class="col-md-9">{{ $memo->begin_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-3">备注</div>
                <div class="col-md-9">{{ $memo->info }}</div>
            </div>
        </div>
    </div>
@endsection