<?php


namespace app\Models;

abstract class Figure
{
    /**
     * @var array
     */
    protected $currentFigurePlace = null;


    /**
     * Figure constructor.
     * @param array $figurePlace
     */
    public function __construct(array $figurePlace)
    {

        if ($this->currentFigurePlace  == null) {
            $this->currentFigurePlace  = new FigureState($figurePlace);
        }

    }

    /**
     * @param array $figureNewPlace
     * @return mixed
     */
    abstract function makeMove(array $figureNewPlace);

    /**
     * @return mixed
     */
    abstract function currentFigurePlace();

    /**
     * @return FigureMemento
     */
    abstract public function saveToMemento(): FigureMemento;


}