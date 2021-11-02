<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function update (Request $request, $id)
    {   
        #Sender Update

        $transfer = $request->input('ammt');

        $senderNewBalance = Auth()->user()->balance - $transfer;

        $sender = User::where('id', $id);
        $sender->update(['balance' => $senderNewBalance]);

        //------------------------------------------------------

        #Reciever Update
        
        $recieverID = $request->input('id');
        $Reciever =  User::find($recieverID);

        $recieverNewBalance = $Reciever->balance + $transfer;

        $reciever = User::where('id', $recieverID);
        $reciever->update(['balance' => $recieverNewBalance]);
        
        return redirect('/transfer/create');
    }
}
