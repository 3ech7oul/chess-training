<?php


namespace app\Models;

use app\events\EventsInterface;

class RookFactory extends ChessFiguresFactory
{
    const EVENT_ADD = 'addRock';

    public $name = 'Ладья';


    public function createFigure(array $figurePlace): Figure
    {

        $this->makeEvent(self::EVENT_ADD);
        return new RookFigure($figurePlace);
    }




}