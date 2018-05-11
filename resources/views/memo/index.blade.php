@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="col-md-10 col-xs-6">今日后的备忘录日程</h5>
            <a class="btn btn-primary" href="{{ route('memo.create') }}">添加新备忘</a>
        </div>
        <div class="panel-body">
            @foreach($memos as $memo)
                <div class="row" style="overflow: hidden;text-overflow: ellipsis;">@include('memo._memo')</div>
            @endforeach
        </div>
    </div>
@endsection