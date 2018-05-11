@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>欢迎进入审核系统！</h1>
            <p>西迁博物馆预约审核。</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('/admins/check') }}" role="button">
                   进入系统 </a>
            </p>
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