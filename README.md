
### Setup any model for notification

Add the NotificationTrait to any model you want to add Notifications to and implement the Notification Interface

    use Tashkar18\Notification\NotificationInterface;
    use Tashkar18\Notification\NotificationTrait;

    class Comment extends Eloquent implements NotificationInterface
    {
        use NotificationTrait;


You will then need to add these methods to your model

    /**
     * This determines the recipient id of the event.
     * For example, if a user comments on a post, the recipient of the
     * notification would be the post's author.
     * @return {int}
     */
    public function getNotificationRecipient()
    {
        return $this->post->user_id;
    }

    /**
     * This determines the sender id of the event.
     * For example, if a user comments on a post, the sender of the
     * notification would be the comment's author. (This will typically
     * be user_id, unless you use a different attribute for the user_id like author_id);
     * @return {int}
     */
    public function getNotificationSender()
    {
        return $this->user_id;
    }

    public function presentNotification()
    {
        return $this->user->username . ' commented on your post';
    }


### Notification Controllers and Noter Trait
If you would like to use the controller, you will need to add the noter trait to your User model

    use Tashkar18\Notification\NoterTrait;

    class User extends Eloquent implements UserInterface, RemindableInterface {

        use UserTrait, RemindableTrait, NoterTrait;


### Testing
Add phpspec to your composer.json
    {
      "require-dev": {
        "phpspec/phpspec": "~2.0"
      },
    }

Install with composer and run

$ composer update phpspec/phpspec
$ phpspec run