@extends('layouts.app')

@section('content')
    <div>当前登录的用户为：{{ Auth::guard('admin')->user()->name }}</div>
@endsection