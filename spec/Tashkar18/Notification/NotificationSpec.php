<?php

namespace spec\Tashkar18\Notification;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tashkar18\Notification\Notification');
    }
}
