<?php namespace Tashkar18\Notification;

interface NotificationInterface {

    /**
     * @return int
     */
    public function getNotificationRecipient();

    /**
     * @return int
     */
    public function getNotificationSender();

}