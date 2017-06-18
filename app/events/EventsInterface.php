<?php
namespace app\events;

use app\Models\Figure;

interface EventsInterface
{
    /**
     * @param $objSource
     * @param $objArguments
     * @return mixed
     */
    public function notify( $objSource, $objArguments );
}