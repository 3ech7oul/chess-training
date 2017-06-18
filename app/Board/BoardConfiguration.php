<?php
namespace app\Board;

use \app\Models\PawnFactory;
use \app\Models\RookFactory;

class BoardConfiguration
{
    const FIGURE_PAWN = 'pawn';

    const FIGURE_ROCK = 'rock';

    private $pawn;

    private $rock;

    public static $allowedFigure = [
        self::FIGURE_PAWN,
        self::FIGURE_ROCK,
    ];

    public function __construct(PawnFactory $pawnFigure, RookFactory $rockFigure)
    {
        $this->pawn = $pawnFigure;
        $this->rock = $rockFigure;

    }

    private static function validateFigure($figure)
    {
        if (!in_array($figure, self::$allowedFigure)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    public function getFigure($figure)
    {
        self::validateFigure($figure);

        return $this->$figure;
    }




}