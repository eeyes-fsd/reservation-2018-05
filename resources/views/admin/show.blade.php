@extends('layouts.app')

@section('content')
    <a href="{{  url('admins/check') }}" class="btn-lg btn-primary">返回</a>
    <div class="panel panel-default" style="margin-top: 50px;">
        <div class="panel-heading">
            <h3>申请时间：{{ $block->begin_at }}</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <div class="col-md-4 list-group-item show-item">
                    <h5 class="list-group-item-info">身份证或学生证</h5>
                    <img class="pic" src="{{ $block->user->id_card }}">
                </div>
                <div class="col-md-2 list-group-item show-small-item">
                    <h5 class="list-group-item-info">人数</h5>
                    <h5 class="list-group-item-text">{{ $block->amount }}</h5>
                </div>
                <div class="col-md-2 list-group-item show-small-item">
                    <h5 class="list-group-item-info">姓名</h5>
                    <h5 class="list-group-item-text">{{ $block->name }}</h5>
                </div>
                <div class="col-md-2 list-group-item show-small-item">
                    <h5 class="list-group-item-info">联系电话</h5>
                    <h5 class="list-group-item-text">{{ $block->phone }}</h5>
                </div>
                <div class="col-md-2 list-group-item show-small-item">
                    <h5 class="list-group-item-info">单位</h5>
                    <h5 class="list-group-item-text">{{ $block->unit }}</h5>
                </div>
                <div class="col-md-2 list-group-item show-small-item">
                    <h5 class="list-group-item-info">状态</h5>
                    @if($block->checked == null)
                        <h5 class="list-group-item-text">未审核</h5>
                    @elseif($block->checked == 1)
                        <h5 class="list-group-item-text">已通过</h5>
                    @else
                        <h5 class="list-group-item-text">已拒绝</h5>
                    @endif
                </div>
                <div class="">
                    <div class="btn-show-caozuo"><button class="btn-lg btn-success btn-show-left" onclick="event.preventDefault();
                                document.getElementById('form-pass{{ $block->id }}').submit();
                                ">通过</button> </div>
                    <div class=""><button class="btn-lg btn-danger btn-show-right" onclick="event.preventDefault();
                                document.getElementById('form-refuse{{ $block->id }}').submit();
                                ">拒绝</button> </div>
                </div>
                <form action="{{ route('check.pass',$block->id) }}" method="post" id="form-pass{{ $block->id }}" style="display: none">
                    {{ csrf_field() }}
                </form>
                <form action="{{ route('check.refuse',$block->id) }}" method="post" id="form-refuse{{ $block->id }}" style="display: none">
                    {{ csrf_field() }}
                </form>
            </div>

        </div>

    </div>
@endsection