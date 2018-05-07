@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>登录</h5>
        </div>
        <div class="panel-body">
            <form action="{{ route('login.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">用户名：</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="passwd">密码：</label>
                    <input type="password" name="password" class="form-control" id="passwd">
                </div>
                <button type="submit" class="btn btn-primary">登录</button>
            </form>
        </div>
    </div>
@endsection