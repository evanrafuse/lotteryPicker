<!-- User inputs a string and it gets converted to 7 numbers between 01 and 50 -->
<?php
    if(isset($_POST['lotterystring'])){

        $lotteryString = $_POST['lotterystring'];
        $stringArray = str_split($lotteryString);
        $picks = [];
        foreach ($stringArray as $number) {
            $value = ord($number);
            while ($value > 50) {
                $value = $value - 50;
            }
            if (in_array($value, $picks)) {
                $value++;
            }
            array_push($picks, $value);
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lottery Picker</title>
    <link rel="stylesheet" href="lotterypicker.css">
	</head>
	<body>
		<h1>Lottery Picker</h1>
        <div class="inputForm">
            <form method="post" action="lottery.php">
                <input type="text" name="lotterystring" maxlength=7>
                <button type="submit">Pick em!</button>
            </form>
        </div>
        <div class="results">
            <?php 
                if (isset($picks)) {
                    echo '<div class="headers">Your Numbers:</div>';
                    echo '<div class="picksDiv">';
                    foreach($picks as $numb) {
                        echo '<div class="picks">' . $numb . '</div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
	</body>
</html>