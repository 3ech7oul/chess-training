<?php


namespace app\events;


use app\Figures\Figure;

class PrintMessageEvent implements EventsInterface
{
    /**
     * @param $objSource
     * @param $objArguments
     */
    public function notify($objSource, $objArguments)
    {
       echo $objSource->name.PHP_EOL;
    }

}