<?php namespace Tashkar18\Notification;

use BaseController;
use DateTime;

class NotificationsController extends BaseController {

    /**
     * Return all user notifications.
     * @return
     */
    public function index()
    {
    	return app('auth')->user()->notifications;
    }

    /**
     * Mark notification as a read.
     * @param  Notification $notification
     * @return $notification
     */
    public function read(Notification $notification)
    {
    	$notification->read_at = new DateTime;
    	$notification->save();

    	return $notification;
    }

}
