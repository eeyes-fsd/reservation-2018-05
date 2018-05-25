@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="height: 6rem;">
            <span><a href="{{ route('admins.check') }}" style="text-decoration:none;font-size: 4rem;line-height: 4rem;">审核</a> </span>
            <a class="btn btn-primary btn-lg" style="float: right;" href="{{ route('admins.check') }}" onclick="event.preventDefault();document.getElementById('passed').submit() ">已审核</a>
            <a class="btn btn-primary btn-lg" style="float: right;margin-right: 15px;" href="{{ route('admins.check') }}" onclick="event.preventDefault();document.getElementById('rejected').submit()">未审核</a>
            <form id="passed" action="{{ route('admins.check') }}" method="post" style="display: none">
                {{ csrf_field() }}
                <input type="text" name="status" value="1">
            </form>
            <form id="rejected" action="{{ route('admins.check') }}" method="post" style="display: none;">
                {{ csrf_field() }}
                <input type="text" name="status" value="-1">
            </form>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2  col-xs-4 s-div">时间</div>
                <div class="col-md-3  col-xs-3 s-div">姓名</div>
                <div class="col-md-1  col-xs-2 s-div">人数</div>
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