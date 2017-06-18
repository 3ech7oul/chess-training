<?php
function __autoload($class)
{
    require $class . '.php';
}

use \app\Board\BoardConfiguration;
use \app\Board\Board;
use \app\Models\PawnFactory;
use \app\Models\RookFactory;
use \app\helpers\FileStorageInterface;
use \app\events\PrintMessageEvent;

/***

$pawnFactory = new PawnFactory();
$pawnFigure = $pawnFactory->createFigure(['a'=>1]);
var_dump($pawnFigure->figurePlace);
var_dump($pawnFigure->makeMove(['a'=>2]));
*/


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

$board->saveBoardToFile('board.txt');

$restoredStorage = new FileStorageInterface('board.txt');

$restoredBoard = $restoredStorage->restore();
$restoredBoard->makeMove(BoardConfiguration::FIGURE_PAWN,3, ['c'=>3]);
var_dump($restoredBoard->getFigure(BoardConfiguration::FIGURE_PAWN,2));

//var_dump($board->getFigure(BoardConfiguration::FIGURE_PAWN,2));
//var_dump($board->getFigure(BoardConfiguration::FIGURE_PAWN,1));