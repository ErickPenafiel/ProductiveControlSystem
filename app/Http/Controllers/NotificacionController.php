<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    //
    public function index()
    {
        $stockNotifications = auth()->user()->unreadNotifications;
        return view('notificacion.index', [
            'stockNotifications' => $stockNotifications
        ]);

        // auth()->user()->unreadNotifications
        //     ->when($request->input('notification_id'), function ($query, $notification_id) {
        //         return $query->where('id', $notification_id);
        //     })
        //     ->markAsRead();
        // return view('notificacion.index');
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->unreadNotifications
            ->when($request->input('id'), function ($query) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        return response()->noContent();
    }
}
