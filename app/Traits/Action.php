<?php

namespace App\Traits;

use Symfony\Component\Console\Output\OutputInterface;
use Backpack\Settings\app\Models\Setting;

trait Action
{

    /**
     * @var array
     */
    protected $actions = [];

    /**
     * Store an action to be performed.
     *
     * @param callable $action
     * @param int      $times
     */
    public function storeAction(callable $action, $times = 1)
    {
        foreach(range(1, $times) as $i) {
            $this->actions[] = $action;
        }
    }

    /**
     * @param bool|integer $interval
     * @param bool         $shuffle
     * @param bool         $clear
     */
    public function performActions($interval = false, $shuffle = true, $clear = true)
    {
        if( !$interval ) {
            $interval = $this->getRPMInterval();
        }

        if( $shuffle ) {
            shuffle($this->actions);
        }

        foreach($this->actions as $action) {
            $this->info('Performing Action', OutputInterface::VERBOSITY_DEBUG);
            call_user_func($action);
            $this->info('Action Complete', OutputInterface::VERBOSITY_DEBUG);
            sleep($interval);
        }

        if($clear) {
            $this->clearActions();
        }
    }

    public function clearActions()
    {
        $this->actions = [];
    }

    /**
     * Return how many requests per minute we should do.
     *
     * @return float|int
     */
    protected function getRPMInterval()
    {
        return (60 / Setting::get('rpm_limit'));
    }

}