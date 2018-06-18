<?php
   
    $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);    // get the data from the form
    $message = '';  
    $tax = 0; 
    $income = "$".$netIncome;
    global $tax_formatted;
    global $tax_formatted_married;
    global $tax_formatted_separately;
    global $tax_formatted_head;
    // calculate the Tax

function incomeTaxSingle($netIncome) {
        if ($netIncome >= 0 && $netIncome <= 9275) {
            return $netIncome * 0.1;
        } else if ($netIncome >= 9276 && $netIncome <= 37650) {
            return 927.50 + (($netIncome - 9275) * 0.15);
        } else if ($netIncome >= 37651 && $netIncome <= 91150) {
            return 5183.75 + (($netIncome - 37650) * 0.25);
        } else if ($netIncome >= 91151 && $netIncome <= 190150) {
            return 18558.75 + (($netIncome - 91150) * 0.28);
        } else if ($netIncome >= 190151 && $netIncome <= 413350) {
            return 46278.75 + (($netIncome - 190150) * 0.33);
        } else if ($netIncome >= 413351 && $netIncome <= 415050) {
            return 119934.75 + (($netIncome - 413350) * 0.35);
        } else {
            return 120529.75 + (($netIncome - 415050) * 0.396);
        }                 
    }
     
    $tax = incomeTaxSingle($netIncome);
    $tax_formatted = "$".number_format($tax, 2); 

function incomeTaxMarriedJointly($netIncome) {
        if ($netIncome >= 0 && $netIncome <= 18550) {
            return $netIncome * 0.1;
        } else if ($netIncome >= 18551 && $netIncome <= 75300) {
            return 1855 + (($netIncome - 18550) * 0.15);
        } else if ($netIncome >= 75301 && $netIncome <= 151900) { 
            return 10367.50 + (($netIncome - 75300) * 0.25);
        } else if ($netIncome >= 151901 && $netIncome <= 231450) {
            return 29517.50 + (($netIncome - 151900) * 0.28);
        } else if ($netIncome >= 231451 && $netIncome <= 413350) {
            return 51791.50 + (($netIncome - 231450) * 0.33);
        } else if ($netIncome >= 413351 && $netIncome <= 466950) {
            return 111818.50 + (($netIncome - 413350) * 0.35);
        } else{
            return 130578.50 + (($netIncome - 466950) * 0.396);
   }
}
    $tax2 = incomeTaxMarriedJointly($netIncome);
    $tax_formatted_married = "$".number_format($tax2, 2); 

    function incomeTaxMarriedSeparately($netIncome) {
    if ($netIncome >= 0 && $netIncome <= 9275) {
        return $netIncome * 0.1;
    } else if ($netIncome >= 9276 && $netIncome <= 37650) {
        return 927.50 + (($netIncome - 9275) * 0.15);
    } else if ($netIncome >= 37651 && $netIncome <= 75950) {
        return 5183.75 + (($netIncome - 37650) * 0.25);
    } else if ($netIncome >= 75951 && $netIncome <= 115725) {
        return 14758.75 + (($netIncome - 75950) * 0.28);
    } else if ($netIncome >= 115726 && $netIncome <= 206675) {
        return 25895.75 + (($netIncome - 115725) * 0.33);
    } else if ($netIncome >= 206676 && $netIncome <= 233475) {
        return 55909.25 + (($netIncome - 206675) * 0.35);
    } else{
        return 65289.25 + (($netIncome - 233475) * 0.396);
    }
}
    $tax3 = incomeTaxMarriedSeparately($netIncome);
    $tax_formatted_separately = "$".number_format($tax3, 2); 

function incomeTaxHeadOfHousehold($netIncome) {
    if ($netIncome >= 0 && $netIncome <= 13250) {
        return $netIncome * 0.1;
    } else if ($netIncome >= 13251 && $netIncome <= 50400) {
        return 1325 + (($netIncome - 13250) * 0.15);
    } else if ($netIncome >= 50401 && $netIncome <= 130150) {
        return 6897.50 + (($netIncome - 50400) * 0.25);
    } else if ($netIncome >= 130151 && $netIncome <= 210800) {
        return 26835 + (($netIncome - 130150) * 0.28);
    } else if ($netIncome >= 210801 && $netIncome <= 413350) {
        return 49417 + (($netIncome - 210800) * 0.33);
    } else if ($netIncome >= 413351 && $netIncome <= 441000) {
        return 116258.50 + (($netIncome - 413350) * 0.35);
    } else{
        return 125936 + (($netIncome - 441000) * 0.396);
    }
}
    $tax4 = incomeTaxHeadOfHousehold($netIncome);
    $tax_formatted_head = "$".number_format($tax4, 2); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Income Tax Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <main>
        <h1>Income Tax Calculator</h1>
        <p class='error'><?php echo $message; ?></p>

        <form action="" method="post">

            <div id="data">
                <label>Your Net Income:</label>
                <input type="text" name="netIncome" placeholder="Taxable Income"><br>
            </div>

            <div id="button">
                <label>&nbsp;</label>
                <input type="submit" value="Submit"><br>
            </div>
        </form> <br>

            <p><?php echo "With a net taxable income of $income."; ?></p>
<?php if (!empty($netIncome)) {
    echo      
        "<table id='mytable'>
            <tr>
                <th>Status</th>
                <th>Tax</th>
            </tr>
            <tr>
                <td><label>Single</label></td>
                <td><span> $tax_formatted</span> <br></td> 
            </tr>
            <tr>
                <td><label>Married Filling Jointly</label></td>
                <td><span>$tax_formatted_married</span> <br></td>
            </tr>
            <tr>
                <td><label>Married Filling Separately</label></td>
                <td><span>$tax_formatted_separately</span> <br></td>
            </tr>
            <tr>
                <td><label>Head of Household</label></td>
                <td><span>$tax_formatted_head</span> <br></td>
            </tr>
        </table>";
    }
?>
</main>
</body>
</html>