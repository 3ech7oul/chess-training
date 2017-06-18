<?php
namespace app\Models;

use app\events\EventsInterface;

abstract class ChessFiguresFactory
{
    /**
     * @var
     */
    protected $arEventsObserver;

    /**
     * @param array $figurePlace
     * @return Figure
     */
    abstract public function createFigure (array $figurePlace): Figure;

    /**
     * @param EventsInterface $eventObserver
     * @param $strEventType
     */
    public function addEventsObserver(EventsInterface $eventObserver, $strEventType)
    {
        $this->arEventsObserver[$strEventType][]  = $eventObserver;
    }

    /**
     * @param $strEventType
     */
    public function makeEvent($strEventType)
    {

        foreach ( $this->arEventsObserver[$strEventType] as $objObserver )
        {
            $objObserver->notify( $this, $strEventType );
        }
    }

}