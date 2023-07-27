<?php 
include_once 'includes/dbh.inc.php';
include_once 'includes/xml_reader.inc.php';
?>

<?php 
$conn;
try{
    if($conn){
        foreach ($usdObs as $obs) {
        $sql = "insert into usd(TIME_PERIOD, OBS_VALUE, RELEASE_STATUS) values ('$obs->TIME_PERIOD', '$obs->OBS_VALUE', '$obs->RELEASE_STATUS')";
        $result = mysqli_query($conn, $sql);
        if($result){

        }
        else{
            echo "DB Connection Failed";
        }
    }
        foreach ($euroObs as $obs) {
        $sql = "insert into euro(TIME_PERIOD, OBS_VALUE, RELEASE_STATUS) values ('$obs->TIME_PERIOD', '$obs->OBS_VALUE', '$obs->RELEASE_STATUS')";
        $result = mysqli_query($conn, $sql);
        if($result){
            
        }
        else{
            echo "DB Connection Failed";
        }
    }

        foreach ($gbpObs as $obs) {
        $sql = "insert into gbp(TIME_PERIOD, OBS_VALUE, RELEASE_STATUS) values ('$obs->TIME_PERIOD', '$obs->OBS_VALUE', '$obs->RELEASE_STATUS')";
        $result = mysqli_query($conn, $sql);
        if($result){
            
        }
        else{
            echo "DB Connection Failed";
        }
    }
    echo "Obs Data Uploade Seccesfully";
}  

}catch(Exception $e)
{
    echo $e->getMessage();
}
   
?>

<form action="index.php">

    <button>Return</button>
</form>