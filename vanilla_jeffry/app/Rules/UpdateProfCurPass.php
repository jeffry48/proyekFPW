<?php

namespace App\Rules;

use App\users;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Validation\Rule;

class UpdateProfCurPass implements Rule
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
        $loggedin = session('loggedin');
        $users = users::where([
            ['id_user',$loggedin],
            ['password_user', $value],
            ])->get();
        if(count($users) > 0){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password need to be current password.';
    }
}
