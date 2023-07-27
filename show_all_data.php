<?php 
    $con = mysqli_connect("localhost", "root", "", "obs");
    $response = array();
    if($con){
        $sql = "select * from usd";
        $result = mysqli_query($con, $sql);
        if($result){
            $index = 0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$index]['TIME_PERIOD'] = $row['TIME_PERIOD'];
                $response[$index]['OBS_VALUE'] = $row['OBS_VALUE'];
                $response[$index]['RELEASE_STATUS'] = $row['RELEASE_STATUS'];
                $index++;

            }
            echo ".....................................................................................................USD Obs: ";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "DB Connection Failed";
        }


        $sql = "select * from euro";
        $result = mysqli_query($con, $sql);
        if($result){
            $index = 0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$index]['TIME_PERIOD'] = $row['TIME_PERIOD'];
                $response[$index]['OBS_VALUE'] = $row['OBS_VALUE'];
                $response[$index]['RELEASE_STATUS'] = $row['RELEASE_STATUS'];
                $index++;

            }
            echo ".....................................................................................................Euro Obs: ";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "DB Connection Failed";
        }        




        $sql = "select * from gbp";
        $result = mysqli_query($con, $sql);
        if($result){
            $index = 0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$index]['TIME_PERIOD'] = $row['TIME_PERIOD'];
                $response[$index]['OBS_VALUE'] = $row['OBS_VALUE'];
                $response[$index]['RELEASE_STATUS'] = $row['RELEASE_STATUS'];
                $index++;

            }
            echo ".....................................................................................................GBP Obs: ";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "DB Connection Failed";
        }        
    }
    ?>

<form action="index.php">

    <button>Return</button>
</form>