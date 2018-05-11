@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>{{ $block->begin_at }}</h5>
        </div>
        <div class="list-group">
            <div class="row">申请人证件照片</div>
            <img src="{{ $block->user->id_card }}">
            <div class="list-group-item">
                <h5 class="list-group-item-info">人数</h5>
                <h5 class="list-group-item-text">{{ $block->amount }}</h5>
            </div>
            <div class="list-group-item">
                <h5 class="list-group-item-info">联系电话</h5>
                <h5 class="list-group-item-text">{{ $block->phone }}</h5>
            </div>
            <div class="list-group-item">
                <h5 class="list-group-item-info">单位</h5>
                <h5 class="list-group-item-text">{{ $block->unit }}</h5>
            </div>
            <div class="list-group-item">
                <h5 class="list-group-item-info">状态</h5>
                @if($block->checked == null)
                    <h5 class="list-group-item-text">未审核</h5>
                @elseif($block->checked == 1)
                    <h5 class="list-group-item-text">已通过</h5>
                @else
                    <h5 class="list-group-item-text">已拒绝</h5>
                @endif
            </div>
        </div>
    </div>
@endsection