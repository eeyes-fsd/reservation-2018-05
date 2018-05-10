@extends('layouts.app')

@section('content')
    <div>当前登录的用户为：{{ Auth::guard('admin')->user()->name }}</div>
    <div class="col-md-offset-2 col-md-8">
        <ul>
            @foreach($admins as $admin)
                @include('admin._admin')
            @endforeach
        </ul>
    </div>
@endsection