<?php
function __autoload($class)
{
    require $class . '.php';
}

use \app\Board\BoardConfiguration;
use \app\Board\Board;
use \app\Figures\PawnFactory;
use \app\Figures\RookFactory;
use \app\helpers\FileStorage;
use \app\events\PrintMessageEvent;


$rockFactory = new RookFactory();
$rockFactory->addEventsObserver(new PrintMessageEvent(), RookFactory::EVENT_ADD);

$pawnFactory = new PawnFactory();
$pawnFactory->addEventsObserver(new PrintMessageEvent(), PawnFactory::EVENT_ADD);

$configBoard = new BoardConfiguration($pawnFactory, $rockFactory);
$board = new Board($configBoard);

$board->addFigure(BoardConfiguration::FIGURE_PAWN,1, ['a'=>2]);
$board->addFigure(BoardConfiguration::FIGURE_PAWN,2, ['b'=>2]);
$board->addFigure(BoardConfiguration::FIGURE_PAWN,3, ['c'=>2]);
$board->makeMove(BoardConfiguration::FIGURE_PAWN,9, ['b'=>4]);
$board->deleteFigure(BoardConfiguration::FIGURE_PAWN,2);

$board->addFigure(BoardConfiguration::FIGURE_ROCK,4, ['a'=>1]);

$board->saveBoard();

$restoredStorage = new FileStorage('board.txt');

$restoredBoard = $restoredStorage->restore();
$restoredBoard->makeMove(BoardConfiguration::FIGURE_PAWN,3, ['c'=>3]);

var_dump($restoredBoard->getFigure(BoardConfiguration::FIGURE_PAWN,3)->currentFigurePlace());
var_dump($restoredBoard->getFigure(BoardConfiguration::FIGURE_PAWN,3)->currentFigurePlace());
var_dump($restoredBoard->getFigure(BoardConfiguration::FIGURE_ROCK,4));
