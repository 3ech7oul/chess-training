<?php


namespace app\Models;

class PawnFigure extends Figure
{

    public function makeMove(array $figureNewPlace)
    {
        return $this->currentFigurePlace = new FigureState($figureNewPlace);
    }

    public function currentFigurePlace()
    {
        return $this->currentFigurePlace;
    }

    public function saveToMemento(): FigureMemento
    {
        return new FigureMemento(clone $this->currentFigurePlace);
    }

}