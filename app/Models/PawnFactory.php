<?php


namespace app\Models;

use app\events\EventsInterface;

class PawnFactory extends ChessFiguresFactory
{

    const EVENT_ADD = 'addPawn';

    public $name = 'Пешка';

    public function createFigure(array $figurePlace): Figure
    {
        $this->makeEvent(self::EVENT_ADD);
        return new PawnFigure($figurePlace);

    }

}