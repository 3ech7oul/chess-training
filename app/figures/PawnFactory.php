<?php


namespace app\Figures;

use app\events\EventsInterface;

class PawnFactory extends ChessFiguresFactory
{

    const EVENT_ADD = 'addPawn';

    public $name = 'Пешка';

    /**
     * @param array $figurePlace
     * @return Figure
     */
    public function createFigure(array $figurePlace): Figure
    {
        $this->makeEvent(self::EVENT_ADD);
        return new PawnFigure($figurePlace);

    }

}