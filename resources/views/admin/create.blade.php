@extends('layouts.app')

@section('content')
    @include('common.error')
    <div class="panel panel-default">
        <div class="panel-heading"><h5>增加管理员</h5></div>
        <div class="panel-body">
            <form action="{{ route('admin.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">用户名：</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="passwd">密码：</label>
                    <input type="password" class="form-control" id="passwd" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">密码确认：</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
@endsection