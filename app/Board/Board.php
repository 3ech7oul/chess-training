<?php


namespace app\Board;

use app\helpers\FileStorageInterface;

class Board
{
    /**
     * @var BoardConfiguration
     */
    private $configuration;

    /**
     * @var
     */
    private $existFigures;

    /**
     * Board constructor.
     * @param BoardConfiguration $config
     */
    public function __construct(BoardConfiguration $config)
    {
        $this->configuration = $config;
    }

    /**
     * @param $figure
     * @param int $figureId
     * @param array $position
     */
    public function addFigure($figure, int $figureId, array $position)
    {
        $figureFactory = $this->configuration->getFigure($figure);
        $this->existFigures[$figure][$figureId] = $figureFactory->createFigure($position);
    }

    /**
     * @param $figure
     * @param int $figureId
     * @return bool
     */
    public function getFigure($figure, int $figureId)
    {
        if (isset($this->existFigures[$figure]) && isset($this->existFigures[$figure][$figureId])) {
            $figure = $this->existFigures[$figure][$figureId];
            return $figure->currentFigurePlace();
        }

        return false;
    }

    /**
     * @param $figure
     * @param int $figureId
     * @param array $newPosition
     * @return bool
     */
    public function makeMove($figure, int $figureId, array $newPosition)
    {
        if (isset($this->existFigures[$figure]) && isset($this->existFigures[$figure][$figureId])) {
            $figure = $this->existFigures[$figure][$figureId];
            return $figure->makeMove($newPosition);
        }

        return false;

    }

    /**
     * @param $figure
     * @param int $figureId
     * @return bool
     */
    public function deleteFigure($figure, int $figureId)
    {
        if (isset($this->existFigures[$figure]) && isset($this->existFigures[$figure][$figureId])) {
            unset($this->existFigures[$figure][$figureId]);
            return true;
        }

        return false;

    }

    /**
     * @param $fileName
     * @return bool|int
     */
    public function saveBoardToFile($fileName)
    {
        $storage = new FileStorageInterface($fileName);
        return $storage->save($this);
    }

}