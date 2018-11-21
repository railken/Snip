<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CardSold implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * FUT transaction
     */
    private $transaction;

    /**
     * Create a new event instance
     *
     * CardSold constructor.
     * @param $transaction
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        switch($this->transaction->player->card_type) {
            case "player":
                $name = $this->transaction->player->name;
                break;
            case "position":
                $name = $this->transaction->player->position_rel->position_name;
                break;
            case "chemistry":
                $name = $this->transaction->player->chemistry_rel->playStyle_name;
                break;
        }
        return [
            'player_name' => $name,
            'sold_for' => $this->transaction->sell_bin,
            'sold_at' => $this->transaction->sold_time,
            'profit' => (($this->transaction->sell_bin * 0.95) - $this->transaction->buy_bin)
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['autobuyer'];
    }
}
