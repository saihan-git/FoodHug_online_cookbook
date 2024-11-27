<?php

namespace App\Dao;

use App\Contracts\Dao\ChefProfileDaoInterface;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChefProfileDao implements ChefProfileDaoInterface
{
    public function getProfile($chefId)
    {
        return Chef::find($chefId);
    }

    public function updateProfile($chef, Request $request)
    {
        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->specialty = $request->specialty;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $chef->image = $imageName;
        }

        $chef->save();

        return $chef;
    }
}
