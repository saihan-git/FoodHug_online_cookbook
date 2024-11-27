<?php

namespace App\Services;

use App\Contracts\Dao\ChefProfileDaoInterface;
use App\Contracts\Services\ChefProfileServiceInterface;
use Illuminate\Http\Request;

class ChefProfileService implements ChefProfileServiceInterface
{
    protected $chefProfileDao;

    public function __construct(ChefProfileDaoInterface $chefProfileDao)
    {
        $this->chefProfileDao = $chefProfileDao;
    }

    public function showProfile($chefId)
    {
        return $this->chefProfileDao->getProfile($chefId);
    }

    public function updateProfile($chef, Request $request)
    {
        return $this->chefProfileDao->updateProfile($chef, $request);
    }
}
