<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendController extends Controller
{
    public function index() {
        return view("");
    }


    public function explore() {
        $loggedInUser = auth()->user();

        $usersNotFriendsWithLoggedInUser = $this->notFriends($loggedInUser);
        $friendsOfFriends = $this->friendsYouMayKnow($loggedInUser);
        $requests = auth()->user()->friendRequest;

        return view('explore.find-friends', compact('usersNotFriendsWithLoggedInUser', 'friendsOfFriends', 'requests'));
    }

    function notFriends($loggedInUser) {
        $usersNotFriendsWithLoggedInUser = User::where('id', '!=', $loggedInUser->id)
            ->whereNotIn('id', $loggedInUser->friends->pluck('id')) // Exclude friends of the logged-in user
            ->whereNotIn('id', $loggedInUser->friendsWith->pluck('id'))
            ->get();
        return $usersNotFriendsWithLoggedInUser;
    }


    function friendsYouMayKnow($loggedInUser) {
        // Get the IDs of the logged-in user's friends from both scenarios
        $loggedInUserFriendIds = array_merge(
            $loggedInUser->friends->pluck('id')->toArray(),
            $loggedInUser->friendsWith->pluck('id')->toArray()
        );

        $friendsOfFriends = User::where(function ($query) use ($loggedInUserFriendIds) {
            $query->whereHas('friends', function ($subQuery) use ($loggedInUserFriendIds) {
                $subQuery->whereIn('friend_id', $loggedInUserFriendIds);
            })
            ->orWhereHas('friendsWith', function ($subQuery) use ($loggedInUserFriendIds) {
                $subQuery->whereIn('user_id', $loggedInUserFriendIds);
            });
        })
        ->whereNotIn('id', $loggedInUserFriendIds) // Exclude logged-in user's friends
        ->where('id', '!=', $loggedInUser->id) // Exclude the logged-in user
        ->get();

        return $friendsOfFriends;
    }








}
