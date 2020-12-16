<?php

namespace App\Rules;

use App\users;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Validation\Rule;

class UpdateProfUsername implements Rule
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
        // $loggedin = json_decode(Cookie::get('loggedin'),true);
        $loggedin = session('loggedin');
        $users = users::where([
            ['id_user','!=',$loggedin],
            ['username_user', $value],
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
        return 'Username is already taken.';
    }
}
