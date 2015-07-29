<?php

namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;
use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckoutEvent extends Event
{
    use SerializesModels;

    private $user;
    private $order;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Order $order
     * @return \CodeCommerce\Events\CheckoutEvent
     */
    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function getUser()
    {
        return $this->user;
    }
}
