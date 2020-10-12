<?php

require('Config.php');
require('services/Send.php');

use services\Send;

$app = new Send;
echo "===============GENERATING FROM LOGS============\n";
$app->generateInput();
echo "===============SENDING THE REQUEST TO CLIENT============\n";
$app->send();
echo "===============FINISHED============";
$app->cleanTemp();

?>