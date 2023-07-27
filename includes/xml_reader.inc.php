<?php
class ObsElement {
    public $TIME_PERIOD;
    public $OBS_VALUE;
    public $RELEASE_STATUS;

    public function __construct($time_period, $obs_value, $release_status) {
        $this->TIME_PERIOD = $time_period;
        $this->OBS_VALUE = $obs_value;
        $this->RELEASE_STATUS = $release_status;
    }
}

function formatObservations($obs) {
    $obsArray = array();

    foreach ($obs as $entry) {
        $obs = new ObsElement(
            $entry["TIME_PERIOD"],
            $entry["OBS_VALUE"],
            $entry["RELEASE_STATUS"]
        );
        $obsArray[] = $obs; 
    }
    return $obsArray;
}
$usdUrl = 'xml_files/obs_usd.xml';
$usdXml = simplexml_load_file($usdUrl);
$usdObs = formatObservations($usdXml);

$euroUrl = 'xml_files/obs_euro.xml';
$euroXml = simplexml_load_file($euroUrl);
$euroObs = formatObservations($euroXml);

$gbpUrl = 'xml_files/obs_gbp.xml';
$gbpXml = simplexml_load_file($gbpUrl);
$gbpObs = formatObservations($gbpXml);

?>