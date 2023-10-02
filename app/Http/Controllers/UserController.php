<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use App\Models\Friendships; // Import the User model
use Illuminate\Support\Facades\Validator;


class UserController extends Controller

{
    public function timeline($username=null)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
            $userID = User::where("username", $username)->pluck("id");
        } else {
            $user = auth()->user();
            $userID = User::where("id", $user->id)->pluck('id');
        }

        $friends = $user->allFriendsWithCount();

        return view('timeline.index', compact('user', 'friends'));
    }

    protected function validator($userID, $requestData)
    {
        $rules =  [
            'firstname' => ['string', 'max:255','regex:/^[a-zA-Z ]+$/' ],
            'lastname' => ['string', 'max:255','regex:/^[a-zA-Z ]+$/'],
            'about' => ['string', 'max:1000'],
            'education' => ['string', 'max:1000'],
            'location' => ['string', 'max:500'],
            'workplace' => ['string', 'max:1000'],
            'birthday' => ['string', 'date', 'max:1000'],
            'phone_number' => ['regex:/^\+?[0-9]+$/'],
            'relationship' => ['string', 'max:250','regex:/^[a-zA-Z ]+$/' ],
        ];

        // Remove rules for empty fields
        foreach ($requestData as $field => $value) {
            if (empty($value)) {
                unset($rules[$field]);
            }
        }

         // Check if email has changed, and update validation rule accordingly
        if (isset($requestData['email']) && $requestData['email'] !== auth()->user()->email) {
            $rules['email'] = ['email', 'max:255', 'unique:users'];
        }

        return $rules;
    }

    public function update(Request $request) {

        // Retrieve the current user
        $user = auth()->user();

        // Validate only the fields that are present in the request and have validation rules
        $validator = Validator::make($request->all(), $this->validator($user->id, $request->all()));
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('edit_profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Check if any data has changed
        if ($this->userDataChanged($request, $user)) {
            // Update only the changed fields
            $user->update($request->only([
                'firstname',
                'lastname',
                'email',
                'about',
                'education',
                'workplace',
                'location',
                'relationship',
                'phone_number',
                'birthday',
            ]));

            return redirect()->route('edit_profile')->with('success', 'Your profile was successfully updated');
        } else {
            return redirect()->route('edit_profile')->with('info', 'No changes were made to your profile');
        }
    }

    // Function to check if any data has changed
    private function userDataChanged(Request $request, User $user) {
        $newData = $request->only([
            'firstname',
            'lastname',
            'email',
            'about',
            'education',
            'workplace',
            'location',
            'relationship',
            'phone_number',
            'birthday',
        ]);

        $oldData = $user->only([
            'firstname',
            'lastname',
            'email',
            'about',
            'education',
            'workplace',
            'location',
            'relationship',
            'phone_number',
            'birthday',
        ]);

        return $newData != $oldData;
    }



    public function edit() {
        return view('profile.edit');
    }
}
