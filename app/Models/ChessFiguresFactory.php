<?php
namespace app\Models;

use app\events\EventsInterface;

abstract class ChessFiguresFactory
{
    protected $arEventsObserver;

    abstract public function createFigure (array $figurePlace): Figure;

    public function addEventsObserver(EventsInterface $eventObserver, $strEventType)
    {
        $this->arEventsObserver[$strEventType][]  = $eventObserver;
    }

    public function makeEvent($strEventType)
    {

        foreach ( $this->arEventsObserver[$strEventType] as $objObserver )
        {
            $objObserver->notify( $this, $strEventType );
        }
    }

}