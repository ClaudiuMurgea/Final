@extends('layouts.app')

@section('content')
    <table class="table table-bordered justify-content-center" style="border-color:white;">
        <thead>
            <tr>
                <td class="text-white text-center col-1">Ammount</td>
                <td class="text-white text-center col-2">Sent To</td>
                <td class="text-white text-center col-3">Description</td>
            </tr>
        </thead>
        <tbody>
                <td class="text-white text-center">{{ $userSender->transfer->ammount }}</td>
                <td class="text-white text-center">{{ $userReciever->name }}</td>
                <td class="text-white text-center">{{ $userSender->transfer->description }}</td>        
        </tbody>
    </table>
@endsection