<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Notification extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    //public $reloadTimeout = 60;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.notification', [
            'config' => $this->config,
        ]);
    }
}
