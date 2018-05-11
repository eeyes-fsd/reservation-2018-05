@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{ route('memo.index') }}">返回</a>
    @include('common.error')
    <div class="panel panel-default" style="margin-top: 30px;">
        <div class="panel-heading">
            <h5>修改备忘日程</h5>
        </div>
        <div class="panel-body">
            <form action="{{ route('memo.update',$memo->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="begin_at">开始时间：</label>
                    <input type="datetime-local" name="begin_at" id="begin_at" class="form-control" value="{{ $memo->begin_at }}" >
                </div>
                <div class="form-group">
                    <label for="info">备注：</label>
                    <input type="text" name="info" id="info" class="form-control" value="{{ $memo->info }}">
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
@endsection