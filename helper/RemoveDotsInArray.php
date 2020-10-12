<?php 

function removeDotsInArray($data)
{
    $results = array();
    $dots = array(".", "..");
    if(!$data) {
        return $data;
    }

    return array_diff($data, $dots);
}

?>