<?php namespace Tashkar18\Notification;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\View\View;

class Notification extends Eloquent
{
    protected $table = 'notifications';

    protected $fillable = array('noteable_id', 'noteable_type', 'recepient_id', 'created_at', 'updated_at', 'read_at');
    protected $guarded = array('id');
    protected $appends = array('present');

    public function getDates()
    {
        return array('created_at', 'updated_at', 'read_at');
    }

    public function getPresentAttribute()
    {
        return $this->present();
    }

    public function present()
    {
        return $this->notable->presentNotification();
    }

    /**
     * To Do:
     */
    // public function present()
    // {
    //     if (View::exists('notifications.'))
    //     {
    //         $view = View::make('notifications.');
    //         return $view->render();
    //     }
    // }

    public function notable()
    {
        return $this->morphTo();
    }

}