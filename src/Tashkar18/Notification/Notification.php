<?php namespace Tashkar18\Notification;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Notification extends Eloquent
{
    protected $table = 'notifications';

    protected $fillable = array('noteable_id', 'noteable_type', 'recepient_id', 'created_at', 'updated_at', 'read_at', 'is_read');
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
        if( ! count($this->notable)) return '';

        $className = $this->getClassName($this->notable);
        $viewName = app('config')->get('notification::view') . "." . $className;


        if (app('view')->exists($viewName))
        {
            $view = app('view')->make($viewName)->with($className, $this->notable);

            return $view->render();
        }
    }


    protected function getClassName($class)
    {
        return strtolower((new \ReflectionClass($class))->getShortName());
    }

    public function notable()
    {
        return $this->morphTo();
    }

}
