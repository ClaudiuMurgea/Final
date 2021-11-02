<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transfer;

class TransfersController extends Controller
{
    public function index ()
    {   
        $id = Auth()->user()->id;
        $transfers = Transfer::where('sender_id', $id)->get();

        $users = User::all();

        return view('history', compact('transfers', 'users'));

        
    }

    public function edit ()
    {   
        $senderID = Auth()->user()->id;
        return view('transfer')->with('senderID', $senderID);
    }
    
    public function update (Request $request, $id) 
    {
            #Sender Update

            $transferAMMT = $request->input('ammt');

            $senderNewBalance = Auth()->user()->balance - $transferAMMT;
    
            $sender = User::where('id', $id);
            $sender->update(['balance' => $senderNewBalance]);
    
            //------------------------------------------------------
    
            #Reciever Update
            
            $recieverID = $request->input('id');
            $Reciever =  User::find($recieverID);
    
            $recieverNewBalance = $Reciever->balance + $transferAMMT;
    
            $reciever = User::where('id', $recieverID);
            $reciever->update(['balance' => $recieverNewBalance]);
            
            #Transfer Create

            $transfer = Transfer::create([
                'description' => $request->input('description'),
                'ammount' => $request->input('ammt'),
                'sender_id' => Auth()->user()->id,
                'reciever_id' => $recieverID
            ]);

            return redirect('/home');
    }

}
