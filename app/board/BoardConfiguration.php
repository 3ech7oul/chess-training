<?php
namespace app\Board;

use \app\Models\PawnFactory;
use \app\Models\RookFactory;

class BoardConfiguration
{

    const FIGURE_PAWN = 'pawn';

    const FIGURE_ROCK = 'rock';

    /**
     * @var PawnFactory
     */
    private $pawn;

    /**
     * @var RookFactory
     */
    private $rock;

    /**
     * @var array
     */
    public static $allowedFigure = [
        self::FIGURE_PAWN,
        self::FIGURE_ROCK,
    ];

    /**
     * BoardConfiguration constructor.
     * @param PawnFactory $pawnFigure
     * @param RookFactory $rockFigure
     */
    public function __construct(PawnFactory $pawnFigure, RookFactory $rockFigure)
    {
        $this->pawn = $pawnFigure;
        $this->rock = $rockFigure;

    }

    /**
     * @param $figure
     */
    private static function validateFigure($figure)
    {
        if (!in_array($figure, self::$allowedFigure)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    /**
     * @param $figure
     * @return mixed
     */
    public function getFigure($figure)
    {
        self::validateFigure($figure);

        return $this->$figure;
    }




}