<?php namespace classes;

class Input
{
    private $path = INPUT_PATH;

    public function scanInput()
    {
        $list = array();
        $dir = dirname(__DIR__);
        $files = scandir($dir.$this->path);
        foreach ($files as $value) {
            if($value !== "." && $value !== "..") {
                array_push($list, $value);
            }
        }
        return $list;
    }

    public function getPath()
    {
        return dirname(__DIR__).$this->path;
    }

    public function cleanInputFolder()
    {
        $files = $this->scanInput();
        foreach ($files as $file) {
            unlink($this->getPath().$file);
        }
    }
}


?>