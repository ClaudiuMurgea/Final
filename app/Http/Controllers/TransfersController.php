<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transfer;
use App\Rules\Balance;

class TransfersController extends Controller
{
    public function index ()
    {   
        $id = Auth()->user()->id;
        $userTransfers = Transfer::where('sender_id', $id)->get();

        $allUsers = User::all();

        return view('history', compact('userTransfers', 'allUsers'));

        
    }

    public function edit ()
    {   
        $allUsers = User::all();
        $senderID = Auth()->user()->id;
        return view('transfer', compact('senderID', 'allUsers'));
    }
    
    public function update (Request $request, $id) 
    {

    #Validation

            $request->validate([
                'id' => ['required', 'exists:users,id'],
                'ammount' => ['required', new Balance],
                'description' => ['required']
            ]);               

    #Sender Update

            $transferAmmount = $request->input('ammount');

            $senderNewBalance = Auth()->user()->balance - $transferAmmount;
    
            $userSender = User::where('id', $id);
            $userSender->update(['balance' => $senderNewBalance]);
    
    #Reciever Update

            $recieverID = $request->input('id');
            $recieverOldBalance =  User::find($recieverID);
    
            $recieverNewBalance = $recieverOldBalance->balance + $transferAmmount;
    
            $userReciever = User::where('id', $recieverID);
            $userReciever->update(['balance' => $recieverNewBalance]);
            
    #Transfer Create

            $transfer = Transfer::create([
                'description' => $request->input('description'),
                'ammount' => $request->input('ammount'),
                'sender_id' => Auth()->user()->id,
                'reciever_id' => $recieverID
            ]);

            return redirect('/home');
    }

}
