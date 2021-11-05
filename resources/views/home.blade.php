@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <nav class="navi">
        <ul style="list-style-type:none">
            <li>
                <span class="pl-5 pt-2 text-white">Balance : {{ $balance }} $</span>
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
                <a class="text-white" href="/transfer/create">&laquo;&laquo;&laquo;Transfer&raquo;&raquo;&raquo;</a>
            </li>
            <br/>
            <li>
                <a class="text-white" href="/history">&laquo;&laquo;&laquo;History&raquo;&raquo;&raquo;</a>
            </li>
        </ul>
    </nav>
        <div class="col-md-8">
            <div class="card">
                <div class="bg-primary text-white card-header text-center">Welcome {{ $username }}!</div>

                <div class="text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="ale
                        rt">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img class="img" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.UX635Si_dhwurSkG_rPz8gHaCT%26pid%3DApi&f=1" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
<img class="imgb" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fstatic.guim.co.uk%2Fsys-images%2FMoney%2FPix%2Fpictures%2F2014%2F9%2F25%2F1411647154273%2Fbarclays-bank-014.jpg&f=1&nofb=1" alt="img">
        </div>
    </div>
</div>
@endsection
