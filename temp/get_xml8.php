<?php 
$url = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01';

// קריאה ל-API וקבלת התשובה בפורמט של טקסט
$response = file_get_contents($url);

// המרת התשובה מפורמט טקסט לפורמט XML באמצעות htmlspecialchars_decode
$xml = htmlspecialchars_decode($response);

// המרת התשובה לטיפוס של SimpleXMLElement
$xmlObject = simplexml_load_string($xml);

// בדיקה אם ההמרה הצליחה
if ($xmlObject !== false) {
    // המשך לעבוד עם ה-$xmlObject כמו שאתה רגיל לעבוד עם SimpleXML
    foreach ($xmlObject->message as $message) {
        // המשך לעבוד עם הנתונים מה-$xmlObject כרגיל
        // ...
        echo $message;
    }
} else {
    // אם ההמרה נכשלה, טופל התראת שגיאה
    echo "Failed to parse XML response.";
}

?>