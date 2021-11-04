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
        $senderID = Auth()->user()->id;

        $transfers = Transfer::where('user_id', $senderID)->orderBy('created_at', 'DESC')->get();

        return view('history', compact('transfers'));
    }

    public function edit ()
    {   
        return view('transfer');
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

                $userSender = User::where('id', $id)->update(['balance' => $senderNewBalance]);
    
#Reciever Update
                $recieverID = $request->input('id');
                $recieverOldBalance =  User::find($recieverID);
        
                $recieverNewBalance = $recieverOldBalance->balance + $transferAmmount;
        
                $userReciever = User::where('id', $recieverID)->update(['balance' => $recieverNewBalance]);
            
#Transfer Create
                $transfer = Transfer::create([
                    'description' => $request->input('description'),
                    'ammount' => $request->input('ammount'),
                    'user_id' => Auth()->user()->id,
                    'reciever_id' => $recieverID
                ]);

                return redirect('/');
    }
}
