<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use MinecraftJP;

class LoginController extends Controller
{
    public function __construct()
    {
        $_SERVER['HTTPS'] = 'on';
        $_SERVER['HTTP_X_FORWARDED_PROTO'] = 'http';
        Log::debug('$_SERVER -> '.print_r($_SERVER['HTTPS'], 1));
    }

    /**
     * Redirect the user to the GitHub authentication page.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider()
    {
        $minecraftjp = new MinecraftJP(array(
            'clientId'     => env('JMS_CLIENT_ID'),
            'clientSecret' => env('JMS_CLIENT_SECRET'),
            'redirectUri'  => env('JMS_CALLBACK_URL')
        ));

        // Get login url for redirect
        $loginUrl = $minecraftjp->getLoginUrl();

        return redirect($loginUrl);
    }

    /**
     * Obtain the user information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $minecraftjp = new MinecraftJP(array(
                'clientId'     => env('JMS_CLIENT_ID'),
                'clientSecret' => env('JMS_CLIENT_SECRET'),
                'redirectUri'  => env('JMS_CALLBACK_URL')
            ));

            // Get User
            $user = $minecraftjp->getUser();
            Log::debug(print_r($user, 1));

            // Get Access Token
//            $accessToken = $minecraftjp->getAccessToken();
//            Log::debug(print_r($accessToken, 1));

        } catch (\Exception $e) {
            return redirect('/login');
        }

        // 戻り先URLを取得
        $callback_url = session('callback_url');
        if (empty($callback_url)) {
            $callback_url = '/';
        }
        else {
            session()->forget('callback_url');
        }

        return redirect()->to($callback_url);
    }

    public function logout()
    {
        try {
            $minecraftjp = new MinecraftJP(array(
                'clientId'     => env('JMS_CLIENT_ID'),
                'clientSecret' => env('JMS_CLIENT_SECRET'),
                'redirectUri'  => env('JMS_CALLBACK')
            ));

            Log::debug('ログアウト処理');

            $minecraftjp->logout();

            return redirect()->to('/');

        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
