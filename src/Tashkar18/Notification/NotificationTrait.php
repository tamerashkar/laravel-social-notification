<?php namespace Tashkar18\Notification;

trait NotificationTrait {

    public static function bootNotificationTrait() {
        static::saved(function(NotificationInterface $notable) {
            $notable->pushNotification();
        });
    }

    public function pushNotification()
    {
        $recipient_id = $this->getNotificationRecipient();
        $sender_id = $this->getNotificationSender();

        if ($recipient_id === $sender_id) {
            return false;
        }

        $notification = new Notification;
        $notification->notable_id = $this->id;
        $notification->notable_type = get_class($this);
        $notification->recipient_id = $recipient_id;
        $notification->save();
    }
}