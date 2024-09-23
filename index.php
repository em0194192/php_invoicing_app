<?php
    //Name: Eric Miller
    //Date: 9/22/24
    //Class: CIS-239 Back-End Web Dev
    //Assignment: Invoicing App
    
    //Allow functions to be used on index page
    include "functions.php";
    
    //Store Current Date as a Unix Time Stamp in a variable
    date_default_timezone_set('America/Chicago');
    $currentDate = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #f8f9fa;">
    <!-- Div to hold form and outputs -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <?php
        //Check if form has been submitted
        if ($_GET){
            //Retrieve Inputs from form and store in variables
            $invoiceDate = $_GET['invoiceDateInput'];
            $expirationDate = $_GET['expirationDateInput'];

            //Convert Inputs to Unix Time Stamp Format
            $invoiceDateUnixTimeStamp = strtotime($invoiceDate);
            $expirationDateUnixTimeStamp = strtotime($expirationDate);

            //Call expirationCheck function with UnixTimeStamp versions of inputs, store return string in variable
            $datesCompared = expirationCheck($currentDate,$expirationDateUnixTimeStamp);

            //Echo the output of the expirationCheck function inside a div with same styling as the form
            echo "<div class='border p-4 rounded shadow text-center' style='width: 300px;'>$datesCompared</div>";
        } else {
            //Show the form if not submitted yet
            include "form.php";
        }      
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>