@extends('layouts.app')

@section('content')
    @include('common.error')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>添加新的备忘日程</h5>
        </div>
        <div class="panel-body">
            <form action="{{ route('memo.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="begin_at">开始时间：</label>
                    <input type="datetime-local" name="begin_at" id="begin_at" class="form-control" value="{{ old('begin_at') }}">
                </div>
                <div class="form-group">
                    <label for="info">备注：</label>
                    <input type="text" name="info" id="info" class="form-control" value="{{ old('info') }}">
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
@endsection