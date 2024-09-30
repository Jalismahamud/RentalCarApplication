<?php

namespace App\Helpers;

class Helper
{

    public static function notification($type, $message)
    {
        // Validate the notification type
        $validTypes = ['info', 'success', 'warning', 'error'];

        if (!in_array($type, $validTypes)) {
            throw new \InvalidArgumentException('Invalid notification type provided.');
        }

        // Create the notification array
        $notification = [
            'message' => $message,
            'alert-type' => $type
        ];

        // Flash the notification to the session
        session()->flash('message', $notification['message']);
        session()->flash('alert-type', $notification['alert-type']);
    }
}
