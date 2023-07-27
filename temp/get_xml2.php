<?php

// URL of the XML file
$xml_url = "https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01";

// Load the XML data from the URL
$xml_data = file_get_contents($xml_url);
echo $xml_data;

// Create a new SimpleXMLElement object
$xml = new SimpleXMLElement($xml_data);
var_dump($xml);

// Extract data from <Obs... /> elements
$observations = [];
foreach ($xml->message->DataSet->Series->Obs as $obs) {
    $time_period = (string) $obs['TIME_PERIOD'];
    $obs_value = (string) $obs['OBS_VALUE'];
    $release_status = (string) $obs['RELEASE_STATUS'];

    // Store the extracted data in an array
    $observations[] = array(
        'TIME_PERIOD' => $time_period,
        'OBS_VALUE' => $obs_value,
        'RELEASE_STATUS' => $release_status
    );
}

// Print the extracted data (you can modify this part to do something else with the data)
foreach ($observations as $observation) {
    echo "Time Period: " . $observation['TIME_PERIOD'] . "\n";
    echo "Observed Value: " . $observation['OBS_VALUE'] . "\n";
    echo "Release Status: " . $observation['RELEASE_STATUS'] . "\n";
    echo "------------------------------------\n";
}

?>