<?php
namespace app\helpers;

use app\Board\Board;

class FileStorageInterface implements  StorageInterface
{
    private $fileName;

    /**
     * FileStorage constructor.
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param Board $boardData
     * @return bool|int
     */
    public function save(Board $boardData)
    {
       return file_put_contents($this->fileName, serialize($boardData));
    }

    /**
     * @return mixed
     */
    public function restore()
    {
        $fileData = file_get_contents($this->fileName);
        return unserialize($fileData);
    }


}