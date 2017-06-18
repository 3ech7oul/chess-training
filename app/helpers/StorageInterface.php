<?php
namespace app\helpers;

use app\Board\Board;

interface StorageInterface
{

    /**
     * @param Board $boardData
     * @return mixed
     */
    public function save(Board $boardData);

    /**
     * @return mixed
     */
    public function restore();

}