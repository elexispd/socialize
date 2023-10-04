<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendships;

class FriendController extends Controller
{
    public function index() {
        return view("");
    }


    public function explore() {
        $loggedInUser = auth()->user();

        $usersNotFriendsWithLoggedInUser = $this->notFriends($loggedInUser);
        $friendsOfFriends = $this->friendsYouMayKnow($loggedInUser);
        $receivedRequests = auth()->user()->receivedFriendRequest;

        $mySentRequests = $this->sentRequest();
        return view('explore.find-friends', compact('usersNotFriendsWithLoggedInUser', 'friendsOfFriends', 'receivedRequests', 'mySentRequests'));
    }

    public function sentRequest() {
        $friendshipsInstance = new Friendships();
        $mySentRequests = $friendshipsInstance->pendingRequests(auth()->user()->id)->get();
        return $mySentRequests;
    }

    function notFriends($loggedInUser) {
        $usersNotFriendsWithLoggedInUser = User::where('id', '!=', $loggedInUser->id)
            ->whereNotIn('id', $loggedInUser->allFriends()->pluck('id')) // Exclude friends
            ->whereNotIn('id', $loggedInUser->receivedFriendRequest()->pluck('user_id')) // Exclude users with pending friend requests
            ->whereNotIn('id', $loggedInUser->receivedFriendRequest()->pluck('friend_id')) // Exclude users with pending friend requests
            ->inRandomOrder()
            ->take(15)->get();

        return $usersNotFriendsWithLoggedInUser;
    }


    function friendsYouMayKnow($loggedInUser) {
        // Get the IDs of the logged-in user's friends from both scenarios
        $loggedInUserFriendIds = array_merge(
            $loggedInUser->allFriends()->pluck('id')->toArray(),
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

    public function store(Request $request) {
        $user_id = auth()->user()->id;
        $friend_id = $request->input('friend_id');

        // Create a new friendship using Eloquent
        $friendship = Friendships::create([
            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'status' => false,
        ]);

        if($friendship) {
            return redirect()->back()->with('success', 'Friend request sent');
        } else {
            return redirect()->back()->with('info', 'Something went wrong');;
        }

    }

    public function deleteFriend(Request $request)
    {
        $user_id = auth()->user()->id;
        $friend_id = $request->input('friend_id');
        // Find the friend by ID
        $user = Friendships::where("user_id", $user_id)->where("friend_id", $friend_id)->firstOrFail();

        if ($user) {
            $user->delete();
            return true;
        } else {
            return false;
        }
    }

    public function destroy($id) {
        $resource = Friendships::where('user_id', $id)->orWhere("friend_id", $id)->firstOrFail();
        $resource->delete();
        $message = request()->input('message');
        return redirect()->back()->with('info', $message );
    }

    public function update($id) {
        $resource = Friendships::where('user_id', $id)->firstOrFail();
        $resource->update(['status' => true]);
        return redirect()->back()->with('success', 'Friend request accepted');
    }





}
