<?php

namespace App\Rules;

use App\users;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Validation\Rule;

class UpdateProfEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //
        $loggedin = json_decode(Cookie::get('loggedin'),true);
        $users = users::where([
            ['id_user','!=',$loggedin],
            ['email_user', $value],
            ])->get();
        if(count($users) > 0){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email is already taken.';
    }
}
