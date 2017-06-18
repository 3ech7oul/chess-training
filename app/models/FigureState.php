<?php


namespace app\Models;


class FigureState
{
    /**
     * @var string
     */
    private $state = [];

    /**
     * @param array $state
     */
    public function __construct(array $state)
    {
        $this->state = $state;
    }

}