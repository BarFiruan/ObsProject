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

// סגירת הסשן
curl_close($ch);
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);


// if ($httpCode === 200 && $contentType === 'application/xml;charset=UTF-8') {
//     // המרת התשובה מפורמט XML לפורמט של SimpleXMLElement
//     $xml = simplexml_load_string($response);

//     // כאן תוכל להשתמש במשתנה $xml ולפרק את המידע מתוך ה-XML כפי שאתה רוצה
//     // לדוגמה:
//     foreach ($xml->message->StructureSpecificData->message as $data) {
//         echo "ID: " . $data->ID . "\n";
//         echo "Test: " . $data->Test . "\n";
//         echo "Prepared: " . $data->Prepared . "\n";
//         // וכן הלאה...
//     }
// } else {
//     echo "There was an error fetching data from the API.";
// }
// המרת התוצאה לתחביר XML מחרוזתי לאובייקט של SimpleXML
$xml = simplexml_load_string($response);

// קריאה לפונקציית simplexml_load_string כדי להמיר את התוצאה לאובייקט של SimpleXML
$result = htmlspecialchars($response);

$xml = simplexml_load_string($xmlString);
var_dump($xml) ;
// בדיקה אם הנתונים נטענו תקינה או שיש שגיאה
if ($xml === false) {
    echo "שגיאה בטעינת הנתונים מה-XML";
    exit; // ניתן להפסיק את הפרוגרמ כאן אם זהו טיפול ספציפי בבעיה שאתה רוצה
}

// אתה יכול להשתמש כעת ב-$xml כדי לקרוא את הנתונים ולפרק אותם באופן רגיל
// לדוגמה:
foreach ($xml->DataSet->Series->Obs as $obs) {
    $timePeriod = (string)$obs->attributes()->TIME_PERIOD;
    $obsValue = (float)$obs->attributes()->OBS_VALUE;
    $releaseStatus = (string)$obs->attributes()->RELEASE_STATUS;
    echo "TIME_PERIOD: " . $timePeriod . "\n";
    echo "OBS_VALUE: " . $obsValue . "\n";
    echo "RELEASE_STATUS: " . $releaseStatus . "\n";
    echo "------------------------\n";
}

?>