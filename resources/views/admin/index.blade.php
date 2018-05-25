@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>欢迎进入审核系统！</h1>
            <p>西迁博物馆预约审核。</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('/admins/check') }}" role="button" onclick="event.preventDefault();document.getElementById('check').submit()">
                   进入系统 </a>
            </p>
            <form id="check" action="{{ route('admins.check') }}" method="post" style="display: none;">
                {{ csrf_field() }}
                <input type="text" name="status" value="0">
            </form>
        </div>
        <div class="jumbotron">
            <h1>欢迎进入备忘录系统！</h1>
            <p>来往参观备忘录。</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('/memo') }}" ole="button">
                  进入系统  </a>
            </p>
        </div>
    </div>
@endsection