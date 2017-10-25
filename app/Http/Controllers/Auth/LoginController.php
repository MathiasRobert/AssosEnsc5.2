<?php

namespace App\Http\Controllers\Auth;

use App\Association;
use App\Http\Controllers\Controller;
use Request;
use Auth;
use App\User;
use Socialite;
use Google_Client;
use Session;


class LoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        Session::flash('url',Request::server('HTTP_REFERER'));
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])->with(['hd' => 'ensc.fr'])->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Set token for the Google API PHP Client
        $google_client_token = [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];

        $client = new Google_Client();
        $client->setApplicationName("Laravel");
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setAccessToken(json_encode($google_client_token));

        $authUser = $this->findOrCreateUser($user);
        dd($client);

        Auth::login($authUser, 1);
        dd($authUser);

        return redirect(Session::get('url'));
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @return  User
     */
    public function findOrCreateUser($user)
    {
        $authUser = User::where('google_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'avatar'   => $user->avatar,
            'google_id' => $user->id
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}