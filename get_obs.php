<head>
    <title> "Get Obs"</title>
</head>

<body>
    <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h4>Please Choose Time Period and Currency</h4>
        <form action="includes/obs_form.inc.php" method="POST">
            <input type="date" name="TIME_PERIOD_START" placeholder="START DATE">
            <br>
            <input type="date" name="TIME_PERIOD_END" placeholder="END DATE">
            <br>
            <!-- <form id="currency" method="post"> -->


            <select name="CURRENCY">
                <option value="usd">USD</option>
                <option value="euro">EURO</option>
                <option value="gbp">GBP</option>
            </select>


            <!-- </form> -->
            <input type="submit" name="submit" value="Submit">
        </form>


        <form action="index.php">

            <button>Return</button>
        </form>
    </center>




</body>