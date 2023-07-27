<?php 
include_once 'dbh.inc.php';

// include_once 'dbh.inc.php';
$current_timezone = date_default_timezone_set('Israel');
$current_date = date('Y-m-d');
if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $start = $_POST['TIME_PERIOD_START'];
    $end = $_POST['TIME_PERIOD_END'];
    $currency = $_POST['CURRENCY'];

    if(empty($start) || empty($end) || empty($currency)){
        echo "Please fill all the filed";
    }
    else{
        if($start > $end ){
            echo "Start Date can not be after End Date";

        }
        else{
        if($start > $current_date ||$end > $current_date ){
            echo "Please Provide a period of Time Until Today";

        }
        else{
    // $con = mysqli_connect("localhost", "root", "", "obs");
    $response = array();
    if($conn){
        $sql = "select * from $currency where TIME_PERIOD > '$start' AND TIME_PERIOD < '$end' ORDER BY TIME_PERIOD";
        $result = mysqli_query($conn, $sql);
        if($result){
            $index = 0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$index]['TIME_PERIOD'] = $row['TIME_PERIOD'];
                $response[$index]['OBS_VALUE'] = $row['OBS_VALUE'];
                $index++;

            }
            echo "$currency from $start to $end \n.\n.\n";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "DB Connection Failed";
        }
    }
        }

        }

    }
}
else{
            echo "Please Fill the Field and Press Submit";

}

    ?>

<form action="../get_obs.php">

    <button>Return</button>
</form>