<?php

namespace App\Services;

use App\Contracts\Dao\ChefAuthDaoInterface;
use App\Contracts\Services\ChefAuthServiceInterface;
use App\Mail\ChefResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ChefAuthService implements ChefAuthServiceInterface
{
    protected $chefAuthDao;

    public function __construct(ChefAuthDaoInterface $chefAuthDao)
    {
        $this->chefAuthDao = $chefAuthDao;
    }

    public function login(array $credentials)
    {
        $chef = $this->chefAuthDao->findChefByEmail($credentials['email']);

        if ($chef && Hash::check($credentials['password'], $chef->password)) {
            Auth::login($chef);
            return true;
        }

        return false;
    }

    public function sendResetLinkEmail(string $email)
    {
        $chef = $this->chefAuthDao->findChefByEmail($email);

        if ($chef) {
            $token = Str::random(60);
            $this->chefAuthDao->createChefPasswordReset($email, $token);

            $resetLink = route('chef.password.reset', ['token' => $token, 'email' => $email]);
            Mail::to($email)->send(new ChefResetPasswordMail($resetLink));

            return true;
        }

        return false;
    }

    public function resetPassword(Request $request)
    {
        $passwordReset = $this->chefAuthDao->getChefPasswordResetByEmailAndToken($request->email, $request->token);

        if (!$passwordReset) {
            return false;
        }

        $chef = $this->chefAuthDao->findChefByEmail($request->email);

        if ($chef) {
            $chef->password = Hash::make($request->password);
            $chef->save();
            $this->chefAuthDao->deleteChefPasswordReset($request->email);
            return true;
        }

        return false;
    }
}
