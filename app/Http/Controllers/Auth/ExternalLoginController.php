<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class ExternalLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('laravelpassport')->redirect();
    }

    /**
     * Obtain the user information from Nextcloud.
     * Create new User, if necessary
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $getInfo = Socialite::with('laravelpassport')->user();

        $reguser = User::where('email', $getInfo->email)->first();
        if (!$reguser) {
            $first_name = ''; $last_name = '';

            $name_parts = preg_split("/[\s,]+/",$getInfo->name,2);
            if ($name_parts && count($name_parts)==2){
                $first_name = $name_parts[0];
                $last_name  = $name_parts[1];
            } else $first_name = $getInfo->name;

            $reguser = User::create([
                'name'          => $getInfo->name,
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'email'         => $getInfo->email,
                'password'      => $this->random_str(26)
            ]);
        }
        auth()->login($reguser);
        return redirect()->to('/home');


    }

    function random_str(
        $length,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ) {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

}
