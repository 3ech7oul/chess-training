<?php


namespace app\Models;

class PawnFigure extends Figure
{

    /**
     * @param array $figureNewPlace
     * @return FigureState
     */
    public function makeMove(array $figureNewPlace)
    {
        return $this->currentFigurePlace = new FigureState($figureNewPlace);
    }

    /**
     * @return FigureState|array
     */
    public function currentFigurePlace()
    {
        return $this->currentFigurePlace;
    }

    /**
     * @return FigureMemento
     */
    public function saveToMemento(): FigureMemento
    {
        return new FigureMemento(clone $this->currentFigurePlace);
    }

}