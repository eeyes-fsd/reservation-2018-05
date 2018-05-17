@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>审核</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2  col-xs-4 s-div">时间</div>
                <div class="col-md-2  col-xs-4 s-div">姓名</div>
                <div class="col-md-1  col-xs-2 s-div">人数</div>
                <div class="col-md-3 col-xs-3 s-div">电话</div>
                <div class="col-md-2 col-xs-3 s-div">状态</div>
                <div class="col-md-4 s-hidden">操作</div>
            </div>
        @foreach($blocks as $block)
            @include('admin._block')
        @endforeach
        </div>
        {!! $blocks->render() !!}
    </div>
@endsection