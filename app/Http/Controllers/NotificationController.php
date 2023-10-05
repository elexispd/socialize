<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = auth()->user()->unreadNotifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->route($notification->data['link']);
    }
}
