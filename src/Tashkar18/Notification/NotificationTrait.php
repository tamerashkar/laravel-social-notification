<?php namespace Tashkar18\Notification;

trait NotificationTrait {

    /**
     * Listen for model events
     * @return void
     */
    public static function bootNotificationTrait()
    {
        static::saved(function(NotificationInterface $notable) {
            $notable->pushNotification();
        });

        static::deleted(function(NotificationInterface $notable) {
            $notable->removeNotification();
        });
    }

    /**
     * Notification relation
     * @return Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function notification()
    {
        return $this->morphOne('Tashkar18\Notification\Notification', 'notable');
    }

    /**
     * Create a new notification
     * @return void
     */
    public function pushNotification()
    {
        $recipient_id = $this->getNotificationRecipient();
        $sender_id = $this->getNotificationSender();

        if ($recipient_id == $sender_id) {
            return false;
        }

        $notification = new Notification;
        $notification->notable_id = $this->id;
        $notification->notable_type = get_class($this);
        $notification->recipient_id = $recipient_id;
        $notification->save();
    }

    /**
     * Remove exisiting notification
     * @return void
     */
    public function removeNotification()
    {
        if ($this->notification()->count())
        {
            $this->notification()->delete();
        }
    }
}
