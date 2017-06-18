<?php


namespace app\Figures;


class FigureMemento
{
    /**
     * @var FigureState
     */
    private $state;

    /**
     * @param FigureState $stateToSave
     */
    public function __construct(FigureState $stateToSave)
    {
        $this->state = $stateToSave;
    }

    /**
     * @return FigureState
     */
    public function getState()
    {
        return $this->state;
    }

}