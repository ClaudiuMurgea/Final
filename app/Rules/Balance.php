<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Transfer;
use App\Models\User;


class Balance implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {    
        $id = Auth()->user()->id;
        $user = User::find($id);
        
        if($value > 0) {
        return ($value <= $user->balance);
        }
    }


    public function message()
    {   
        return ":attribute cannot exceed balance!";
    }
}
