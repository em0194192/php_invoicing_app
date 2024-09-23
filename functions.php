<?php
function expirationCheck($currentDate, $expirationDate){
    
    //Convert the Time Stamps to Years, Months, And Days
    $expirationYear = date('Y', $expirationDate);
    $expirationMonth = date('n', $expirationDate);
    $expirationDay = date('j', $expirationDate);
    $currentYear = date('Y', $currentDate);
    $currentMonth = date('n', $currentDate);
    $currentDay = date('j', $currentDate);
    
    //Determine if Current Date is after Expiration Date
    if($currentDate > $expirationDate){
        //Today is after Expiration Date
        
        //Determine difference in years, months, days and store in variables
        $yearsDifferent = $currentYear - $expirationYear;
        $monthsDifferent = $currentMonth - $expirationMonth;
        $daysDifferent = $currentDay - $expirationDay;
        
        //Deal with Negative Numbers
        if ($daysDifferent < 0){
            //Reduce Months Different by 1 Month
            $monthsDifferent--;

            //Determine Num Days in last month
            $daysToAdd = cal_days_in_month(CAL_GREGORIAN, $currentMonth - 1, $currentYear);

            //Add days from month removed back to daysDifferent
            $daysDifferent+= $daysToAdd;
        }
        if ($monthsDifferent < 0){
            //Reduce Years Different by 1 Year
            $yearsDifferent--;

            //Add Months from Year Removed back to monthsDifferent
            $monthsDifferent+= 12;
        }

        //Return a string with the result
        return "Expired! The current date exceeds the expiration date by $yearsDifferent years, $monthsDifferent months, and $daysDifferent days.";

    } else {
        
        //Today is Before the Expiration Date
        
        //Determine difference in years, months, days and store in variables
        $yearsDifferent = $expirationYear - $currentYear;
        $monthsDifferent = $expirationMonth - $currentMonth;
        $daysDifferent = $expirationDay - $currentDay;
        
        //Return a string with the result
        return "<p> Still Current! The invoice will be due in $yearsDifferent years, $monthsDifferent months, and $daysDifferent days.</p>";
    }
}

?>