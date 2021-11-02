@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <nav class="navi">
        <ul style="list-style-type:none">
            <li>
                <span class="pl-5 pt-2 text-white">Balance : {{ $balance }}</span>
            </li>
            <br/>
            <li>
                <span class="pl-5 pt-2 text-white">User ID : {{ $id }}</span>
            </li>
        </ul>
    </nav>
    <nav class="navi2">
        <ul style="list-style-type:none">
            <li>
                <a class="text-danger" href="/transfer/create">&laquo;&laquo;&laquo;Transfer&raquo;&raquo;&raquo;</a>
            </li>
            <br/>
            <li>
                <a class="text-danger" href="/history">&laquo;&laquo;&laquo;History&raquo;&raquo;&raquo;</a>
            </li>
        </ul>
    </nav>
        <div class="col-md-8">
            <div class="card">
                <div class="bg-success text-white card-header text-center">Welcome {{ $username }}!</div>

                <div class="bg-danger text-white card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="ale
                        rt">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Have fun & best of luck !') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
<img class="img" src="https://www.gambleonline.co/app/uploads/2020/04/live-dealer-roulette.jpg" alt="img">
        </div>
    </div>
</div>
@endsection
