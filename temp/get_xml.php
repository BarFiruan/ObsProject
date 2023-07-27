<?php
    $url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_GBP_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
    // $url = 'https://www.w3schools.com/xml/note.xml';
    // $array = [];
    // $handle = curl_init();
    // curl_setopt($handle,CURLOPT_URL,$url);
    //  curl_setopt($handle,CURLOPT_RETURNTRANSFER,TRUE);
    // curl_setopt($handle,CURLOPT_FOLLOWLOCATION,TRUE);
    // // curl_setopt_array($handle,$array);

    // $response = curl_exec($handle);

    // curl_close($handle);

    // // var_dump($response);
    // $feed = new SimpleXMLElement($response);
    // var_dump($feed);
    $xmlString = file_get_contents("https://www.w3schools.com/xml/note.xml");
    $xmlObject = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);

    $json = json_encode($xmlObject);
    $phpArray = json_decode($json, true);

    echo "<pre>";
    print_r($phpArray);

?>