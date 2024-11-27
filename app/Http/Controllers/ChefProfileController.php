<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ChefProfileServiceInterface;
use App\Http\Requests\UpdateChefProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefProfileController extends Controller
{
    protected $chefProfileService;

    public function __construct(ChefProfileServiceInterface $chefProfileService)
    {
        $this->chefProfileService = $chefProfileService;
    }

    public function show()
    {
        $chef = Auth::guard('chef')->user();
        if (!$chef) {
            return redirect()->route('chef.login')->withErrors(['auth' => 'You are not authenticated']);
        }

        $chef = $this->chefProfileService->showProfile($chef->id);

        return view('chef.profile', compact('chef'));
    }

    public function update(UpdateChefProfileRequest $request)
    {
        $chef = Auth::guard('chef')->user();
        if (!$chef) {
            return redirect()->route('chef.login')->withErrors(['auth' => 'You are not authenticated']);
        }

        $this->chefProfileService->updateProfile($chef, $request);

        return redirect()->route('chef.profile')->with('status', 'Profile updated successfully!');
    }
}
