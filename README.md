# Notification (Laravel 4)

## Quick Start

### Required Setup

Require `tashkar18\notification` with the composer command

```bash
$ composer require tashkar18/notification ~0.2
```

In your `config/app.php` file,

add `Tashkar18\Notification\NotificationServiceProvider` to the end of the `providers` array

```php
  'providers' => array(
    'Illuminate\Foundation\Providers\ArtisanServiceProvider',
    'Illuminate\Auth\AuthServiceProvider',
    ...
    'Tashkar18\Notification\NotificationServiceProvider',
  ),
```

Now generate the configuration file

```bash
$ php artisan config:publish tashkar18/notification
```

Then migrate the `notifications` table

```bash
$ php artisan migrate --package="tashkar18/notification"
```

### Setup

In any of your `Eloquent` models, implement the `NotificationInterface` and use the `NotificationTrait`.

```php
use Tashkar18\Notification\NotificationInterface;
use Tashkar18\Notification\NotificationTrait;

class Comment extends Eloquent implements NotificationInterface
{
    use NotificationTrait;
```

Then implement these methods in your model.

```php
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
 * be user_id, but you might also use a different attribute for the user_id like author_id);
 * @return {int}
 */
public function getNotificationSender()
{
    return $this->user_id;
}
```

You can add the `NoterTrait` to the your `User` model to setup the user `hasMany` relationship

```php
use Tashkar18\Notification\NoterTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, NoterTrait;
```

You will then be able to access user notifications

```php
return $user->notifications;
```

### Configuration

Create your `Notification`-specific views folder, and adjust the `packages/tashkar18/notification/config.php` to match
```php
  return array(
      'view' => 'notifications'
  );
```

### Create your `ViewPresenter` for your `Eloquent` model.

Your view presenter file is simply a `view` file that will present your notification in human readable text.

For example, a Comment model would have a view file in `views\notifications\comment.blade.php`
The `comment` object will automatically be passed into that view and can be access with the variable `$comment`.

```php
// views/notifications/comment.blade.php
{{{ ucfirst($comment->user->username) }}} commented on your post.
```


### Testing (coming soon)
