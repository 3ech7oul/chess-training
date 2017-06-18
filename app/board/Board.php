<?php


namespace app\Board;

use app\helpers\FileStorage;

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
     * Добавляет фигуру на доску.
     *
     * @param $figure
     * @param int $figureId Ид фигуры
     * @param array $position Расположение фигуры на доске, массив, где ключ это горизотналь, значение вертикаль.
     */
    public function addFigure($figure, int $figureId, array $position)
    {
        $figureFactory = $this->configuration->getFigure($figure);
        $this->existFigures[$figure][$figureId] = $figureFactory->createFigure($position);
    }

    /**
     * Возвращает фигуру по её ИД
     *
     * @param $figure
     * @param int $figureId
     * @return bool
     */
    public function getFigure($figure, int $figureId)
    {
        if (isset($this->existFigures[$figure]) && isset($this->existFigures[$figure][$figureId])) {
            $figure = $this->existFigures[$figure][$figureId];
            return $figure;
        }

        return false;
    }

    /**
     * Делает ход фигуры.
     *
     * @param $figure Объект фигуры
     * @param int $figureId Ид фигуры
     * @param array $position Расположение фигуры на доске, массив, где ключ это горизотналь, значение вертикаль.
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
     * Удаляет фигуру
     *
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
     * Сохраняет доску. FileStorage имплементирует StorageInterface.
     * Для добавление нового способа, нужно будет добавить класс.
     *
     * @param $fileName
     * @return bool|int
     */
    public function saveBoard()
    {
        $fileName = 'board.txt';
        $storage = new FileStorage($fileName);
        return $storage->save($this);
    }

}