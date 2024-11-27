<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMemberProfileRequest;
use Illuminate\Support\Facades\Auth;


class MemberProfileController extends Controller
{
    /**
     * Show the member profile.
     *
     * Retrieves the currently authenticated member and displays the profile view.
     * If no member is authenticated, redirects to the member login page with an error message.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $member = Auth::guard('member')->user();
        if (!$member) {
            return redirect()->route('member.login')->withErrors(['auth' => 'Please log in first.']);
        }
        return view('member.profile', compact('member'));
    }

    /**
     * Update the member profile.
     *
     * Handles the request to update the member's profile information including name, email, 
     * and profile image. Validates the request data using the UpdateMemberProfileRequest form request.
     * Saves the changes and redirects back to the profile page with a success message.
     *
     * @param  \App\Http\Requests\UpdateMemberProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberProfileRequest $request)
    {
        $member = Auth::guard('member')->user();

        // Update admin details
        $member->name = $request->input('name');
        $member->email = $request->input('email');

        // Handle profile image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $member->image = $imageName;
        }

        // Save changes
        $member->save();

        return redirect()->route('member.profile')->with('status', 'Profile updated successfully!');
    }
}
