<?php
// $url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// $data = simplexml_load_string($response);
$url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
$response = file_get_contents($url);
$escaped_response = htmlspecialchars($response);
echo $escaped_response;
// var_dump($data);