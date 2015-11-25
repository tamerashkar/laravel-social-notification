<?php namespace Tashkar18\Notification;

interface NotificationInterface {

    /**
     * Listen for model events
     * @return void
     */
    public static function bootNotificationTrait();

    /**
     * Notification relation
     * @return Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function notification();

    /**
     * Create a new notification
     * @return void
     */
    public function pushNotification();

    /**
     * Remove exisiting notification
     * @return void
     */
    public function removeNotification();

    /**
     * Return notification recipient id
     * @return int
     */
    public function getNotificationRecipient();

    /**
     * Return notification sender id
     * @return int
     */
    public function getNotificationSender();

}
