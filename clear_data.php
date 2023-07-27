<?php 
    include_once 'includes/dbh.inc.php';
    if($conn){
        $sql = "TRUNCATE `usd`";
        $result = mysqli_query($conn, $sql);
        if($result){
             echo "USD Obs Table seccsefully Deleted";

            }
        else{
            echo "DB Connection Failed";
        }

        $sql = "TRUNCATE `euro`";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "EURO Obs Table seccsefully Deleted";

        }
        else{
            echo "DB Connection Failed";
        }        
        $sql = "TRUNCATE `gbp`";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "GBP Obs Table seccsefully Deleted";

        }
        else{
            echo "DB Connection Failed";
        }        
    }
    ?>

<form action="index.php">

    <button>Return</button>
</form>