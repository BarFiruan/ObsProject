<?php
    $url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_GBP_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
    $array = [];
    $handle = curl_init();
    curl_setopt($handle,CURLOPT_URL,$url);
     curl_setopt($handle,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($handle,CURLOPT_FOLLOWLOCATION,TRUE);
    // curl_setopt_array($handle,$array);

    $response = curl_exec($handle);
    $escaped_response = htmlspecialchars($response);
// echo $escaped_response;
    curl_close($handle);

    // var_dump($response);
    $feed = new SimpleXMLElement($escaped_response);
    var_dump($feed);


?>