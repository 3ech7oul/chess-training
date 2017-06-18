<?php


namespace app\events;


use app\Models\Figure;

class PrintMessageEvent implements EventsInterface
{
    public function notify($objSource, $objArguments)
    {
       echo $objSource->name.PHP_EOL;
    }

}