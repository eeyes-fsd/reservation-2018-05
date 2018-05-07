@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>审核</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">时间</div>
                <div class="col-md-1">人数</div>
                <div class="col-md-3">联系方式</div>
                <div class="col-md-2">状态</div>
                <div class="col-md-4">操作</div>
            </div>
        @foreach($blocks as $block)
                @include('admin._block')
            @endforeach
        </div>
    </div>
@endsection