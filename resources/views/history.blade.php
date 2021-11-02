@extends('layouts.app')

@section('content')
    <table class="table table-bordered" style="border-color:white;">
        <thead>
            <tr>
                <td class="text-white text-center col-1">Ammount</td>
                <td class="text-white text-center col-2">Sent To</td>
                <td class="text-white text-center col-9">Description</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($userTransfers as $transfer)
                <tr>
                    <td class="text-white text-center">{{ $transfer->ammount }}</td>
                    
                    @foreach($allUsers as $user)
                        @if($transfer->reciever_id == $user->id)
                            <td class="text-white text-center">{{ $user->name }}</td>
                        @endif
                    @endforeach
                    
                    <td class="text-white text-center">{{ $transfer->description }}</td>
                </tr>
            @endforeach        
        </tbody>
    </table>
@endsection