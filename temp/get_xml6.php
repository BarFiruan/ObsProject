<?php
$url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01';

// יצירת סשן חדש של CURL
$ch = curl_init();

// הגדרת הכתובת של ה-URL
curl_setopt($ch, CURLOPT_URL, $url);

// אפשור קבלת התוכן כתוב ב-HTTP response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// בקשת GET
curl_setopt($ch, CURLOPT_HTTPGET, 1);

// בקשה בפורמט של XML
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/xml'));

// ביצוע בקשה ושמירת התוצאה במשתנה
$response = curl_exec($ch);
 $response = htmlspecialchars($response);
 echo $response;
// $response = html_entity_decode($response);
// סגירת הסשן
curl_close($ch);

// קריאת הנתונים מה-XML
$xml = simplexml_load_string($response);

if ($xml !== false) {
    // עכשיו תוכל להשתמש בנתונים שמקורם במשתנה $xml
    // לדוגמה:
    foreach ($xml->DataSet->Series->Obs as $obs) {
        $timePeriod = (string) $obs['TIME_PERIOD'];
        $obsValue = (float) $obs['OBS_VALUE'];
        $releaseStatus = (string) $obs['RELEASE_STATUS'];
        
        echo "Time Period: $timePeriod, Obs Value: $obsValue, Release Status: $releaseStatus<br>";
    }
} else {
    // אם קרתה בעיה בטעינת ה-XML
    echo "Failed to parse XML";
}

?>