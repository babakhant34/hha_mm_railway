<?php

require_once 'lib/Pest/Pest.php';
require_once 'lib/Pest/PestJSON.php';

$address = "http://www.telize.com/geoip";
$pest = new PestJSON($address);
$result = $pest->get("/");
print_r($result);

?>