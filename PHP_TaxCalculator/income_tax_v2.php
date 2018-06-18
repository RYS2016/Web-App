<?php
$netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);
 $message = '';  
 $tax = 0; 
 $income = "$".$netIncome;
 global $r; 
 global $r2;
 global $r3;
 global $r4;

 global $rr;
 global $single;
 global $names;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>incomeTax</title>
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
        
<?php

define('TAX_RATES', array 
        ('Single' => array(
            'Rates' => array(10, 15, 25, 28, 33, 35, 39.6),
            'Ranges' => array(0, 9275, 37650, 91150, 190150, 413350, 415050),
            'MinTax' => array(0, 927.50, 5183.75, 18558.75, 46278.75, 119934.75, 120529.75)
        ),
        'Married_Jointly' => array(
            'Rates' => array(10, 15, 25, 28, 33, 35, 39.6),
            'Ranges' => array(0, 18550, 75300, 151900, 231450, 413350, 466950),
            'MinTax' => array(0, 1855.00, 10367.50, 29517.50, 51791.50, 111818.50, 130578.50)
        ),
        'Married_Separately' => array (
            'Rates' => array(10, 15, 25, 28, 33, 35, 39.6),
            'Ranges' => array(0, 9275, 37650, 75950, 115725, 206675, 233475),
            'MinTax' => array(0, 927.50, 5183.75, 14758.75, 25895.75, 55909.25, 65289.25)
        ),
        'Head_Household' => array(
            'Rates' => array(10, 15, 25, 28, 33, 35, 39.6),
            'Ranges' => array(0, 13250, 50400, 130150, 210800, 413350, 441000),
            'MinTax' => array(0, 1325.00, 6897.50, 26835.00, 49417, 116258.50, 125936)
        )
    )
);

 function incomeTax ($netIncome, $filingStatus) {
    $single = TAX_RATES['Single'];
    $mJointly = TAX_RATES['Married_Jointly'];
    $mSeparatly = TAX_RATES['Married_Separately'];
    $head = TAX_RATES['Head_Household'];

    $filingStatus = '';
    
$singleTax = function ($filingStatus) {
    $single = TAX_RATES['Single'];
    $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);
    while (list ($key, $value) = each($single['Ranges'])) {
        if ($netIncome <= $value && $filingStatus = 'Single' ) {
           if($key <= 1) {
                $result = number_format(($netIncome * 0.1), 2);
            return $result;
            break;
                
            }else if($key <= 5) {
                $result =  number_format($single['MinTax'][$key - 1] + 
                (($netIncome - $single['Ranges'][$key - 1]) * $single['Rates'][$key - 1] / 100), 2);
            return $result;
            break;
               
             };
        }elseif ($key >= 6){
            $result = number_format(120529.75 + (($netIncome - 415050) * 0.396), 2);
            return $result;
            break;
        
        } 
    }   
};
$jointlyTax = function ($filingStatus) {
    $mJointly = TAX_RATES['Married_Jointly'];
    $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);
    
    while (list ($key, $value) = each($mJointly['Ranges'])) {
        if ($netIncome <= $value && $filingStatus = 'Jointly') {
           if($key <= 1) {
                $result2 = number_format(($netIncome * 0.1), 2);
                return $result2.'<br>';
                break;
            }else if($key <= 5) {
                $result2 =  number_format($mJointly['MinTax'][$key - 1] + 
                (($netIncome - $mJointly['Ranges'][$key - 1]) * $mJointly['Rates'][$key - 1] / 100), 2);
                return $result2.'<br>';
                break;
             };
        }elseif ($key >= 6){
            $result2 = number_format(120529.75 + (($netIncome - 415050) * 0.396), 2);
            return $result2.'<br>';
            break;
        }        
    }
 };


$separatelyTax = function ($filingStatus) {
    $mSeparatly = TAX_RATES['Married_Separately'];
    $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);
    while (list ($key, $value) = each($mSeparatly['Ranges'])) {
        if ($netIncome <= $value) {
           if($key <= 1) {
                $result3 = number_format(($netIncome * 0.1), 2);
                return $result3.'<br>';
                break;
            }else if($key <= 5) {
                $result3 =  number_format($mSeparatly['MinTax'][$key - 1] + 
                (($netIncome - $mSeparatly['Ranges'][$key - 1]) * $mSeparatly['Rates'][$key - 1] / 100), 2);
                return $result3.'<br>';
                break;
             };
        }elseif ($key >= 6){
            $result3 = number_format(120529.75 + (($netIncome - 415050) * 0.396), 2);
            return $result3.'<br>';
            break;
        }        
    }
};

$headTax = function ($filingStatus) {
    $head = TAX_RATES['Head_Household'];
    $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);

    while (list ($key, $value) = each($head['Ranges'])) {
        if ($netIncome <= $value) {
           if($key <= 1) {
                $result4 = number_format(($netIncome * 0.1), 2);
                return $result4.'<br>';
                break;
            }else if($key <= 5) {
                $result4 =  number_format($head['MinTax'][$key - 1] + 
                (($netIncome - $head['Ranges'][$key - 1]) * $head['Rates'][$key - 1] / 100), 2);
                return $result4.'<br>';
                break;
             };
        }elseif ($key >= 6){
            $result4 = number_format(120529.75 + (($netIncome - 415050) * 0.396), 2);
            return $result4.'<br>';
            break;
        }        
    }
};
$r =  $singleTax('Single');
$r2 = $jointlyTax('Jointly');
$r3 = $separatelyTax('Separately');
$r4 = $headTax('head');

$arr = [$r, $r2, $r3, $r4];
return $arr;
}
$rr = incomeTax($netIncome, '');

 if (!empty($netIncome)) {
    echo  "<?php <p> With a net taxable income of $income. </p> 

        <table id='mytable'>;
            <tr>
                <th>Status</th>
                <th>Tax</th>
            </tr>
            <tr>
                <td><label>Single</label></td>
               <td>$rr[0]</td>
            </tr>
            <tr>
                <td><label>Married Filling Jointly</label></td>
                <td><span>$rr[1]</span><br></td>
            </tr>
            <tr>
                <td><label>Married Filling Separately</label></td>
                <td><span>$rr[2]</span> <br></td>
            </tr>
            <tr>
                <td><label>Head of Household</label></td>
                <td><span>$rr[3]</span> <br></td>
            </tr>
        </table>";
    }


?>
<!--<section> 
    <p>2016 Tax Tables</p>
<table>
    <thead>
        <tr>
            <th>Taxable Income</th>
            <th>Tax Rate</th>
        </tr>
    </thead>
    <tbody>
        <?php  $single = TAX_RATES['Single'];
            foreach ($single as $index => $status) { 
                foreach ($status as $key => $value) {   ?>
                <tr>
                    <td><?php print_r ($single['Ranges'][$key]); ?></td>
                    <td><?php  print_r($single['Rates'][$key]); ?></td>   
                </tr>       
    <?php }}   ?>
    </tbody>
  </table>`
</section>-->


</body>
</html>