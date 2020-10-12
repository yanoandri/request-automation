<?php 

function parseIndoDate($date) {
    if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)){
        return $date;
    }

    $monthInIdPair = [
        'Januari' => '01',
        'Februari' => '02',
        'Maret' => '03',
        'April' => '04',
        'Mei' => '05',
        'Juni' => '06',
        'Juli' => '07',
        'Agustus' => '08',
        'September' => '09',
        'Oktober' => '10',
        'November' => '11',
        'Desember' => '12'
    ];

    $monthInId = array_keys($monthInIdPair);

    $arrayDate = explode("-", $date);
    $day = $arrayDate[0];
    $month = in_array($arrayDate[1], $monthInId) ? $monthInIdPair[$arrayDate[1]] : '00';
    $year = $arrayDate[2];
    return sprintf("%s-%s-%s", $year, $month, $day);
}

?>