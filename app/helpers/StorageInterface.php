<?php
namespace app\helpers;

use app\Board\Board;

interface StorageInterface
{

    public function save(Board $boardData);

    public function restore();

}