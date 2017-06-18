<?php
namespace app\events;

use app\Models\Figure;

interface EventsInterface
{
    public function notify( $objSource, $objArguments );
}