<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\NotificationEvent;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function index()
    {
        try {
            $user = User::find(Auth::user()->id);
            $notifications = Notification::where('user_id', $user->id)->orderByRaw('read_at IS NULL DESC')
            ->orderBy('created_at', 'desc')
            ->get();;
            // $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            return response()->json([
                'success' => true,
                'notifications' => $notifications
            ],200);
        } catch (\Throwable $th) {
            Log::error("Notification Index Failed:" . $th->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage()
            ],500);
        }
    }

    public function markAsRead($id)
    {
        try {
            $user = User::find(Auth::user()->id);
            $notification = Notification::findOrFail($id);
            $notification->read_at = now();
            $notification->save();
            return response()->json([
                'success' => true,
                'status' => 'success'
            ],200);
        } catch (\Throwable $th) {
            Log::error("Notification Mark as Read Failed:" . $th->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage()
            ],500);
        }
    }

    public function markAllAsRead()
    {
        try {
            $user = User::where('id', Auth::user()->id);
            $notifications = Notification::where('user_id', Auth::user()->id)->whereNull('read_at')->get();
            foreach ($notifications as $notification) {
                $notification->read_at = now();
                $notification->save();
            }
            return response()->json([
                'success' => true,
                'status' => 'success'
            ],200);
        } catch (\Throwable $th) {
            Log::error("Notification Mark All as Read Failed:" . $th->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage()
            ],500);
        }
    }

    public function testNotification($id)
    {
        try {
            $user = User::find($id);
            app('notificationService')->notifyUsers([$user], 'Test Notification by ' . Helper::getCompanyName());
            return response()->json([
                'success' => true,
                'status' => 'success'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage()
            ],500);
        }
    }

    public function deleteNotification($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->delete();
            // event(new NotificationEvent($notification));
            return response()->json([
                'success' => true,
                'status' => 'success'
            ],200);
        } catch (\Throwable $th) {
            Log::error("Notification Deletion Failed:" . $th->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage()
            ],500);
        }
    }
}
