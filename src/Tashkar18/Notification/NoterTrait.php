<?php namespace Tashkar18\Notification;

trait NoterTrait {

    public function notifications()
    {
        return $this->hasMany('Tashkar18\Notification\Notification', 'recipient_id');
    }

}