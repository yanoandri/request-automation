<?php namespace classes;

require(dirname(__DIR__).'/helper/RemoveDotsInArray.php');

class Reader
{
    private $notepadPath = NOTEPAD_PATH;
    private $inputPath = INPUT_PATH;

    public function scanInput()
    {
        $dir = dirname(__DIR__);
        $path = $dir.$this->notepadPath;
        $scan = scandir($path);
        $file = removeDotsInArray($scan);
        $list = array_keys($file);
        foreach ($list as $value) {
            $contents = file_get_contents($path.$file[$value]);
            $payload = preg_match_all('/(?<=X-Investree-Key: PXmSII-yBimvx4-PGb6oFv, Payload: )(.*)(?=, Expected-Signature:)/m', $contents, $matches, PREG_SET_ORDER, 0);
            foreach ($matches as $item) {
                $this->writeToInput($item[0]);
                sleep(1);
            }
        }
    }

    private function writeToInput($payload)
    {
        $dir = dirname(__DIR__);
        $writePath = $dir.$this->inputPath;
        $filename = date('Ymd').'T'.date('His').'.json';
        file_put_contents($writePath.'\\'.$filename, $payload);
    }
}


?>