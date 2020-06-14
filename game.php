<?php

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;


#$computer = 0; // Hard code the computer to rock
// TODO: Make the computer be random
$computer = rand(0,2);


// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check($computer, $human) {


    $img = array('rock.png', 'paper.png', 'scissor.png');

    if ($human == $computer) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("Tie", $img1, $img2);
        return $return;
    } else if ($human == 0 & $computer == 1) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("Lose", $img1, $img2);
        return $return;
    } else if ($human == 0 & $computer == 2) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("You Wind", $img1, $img2);
        return $return;
    } else if ($human == 1 & $computer == 0) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("You Wind", $img1, $img2);
        return $return;
    } else if ($human == 1 & $computer == 2) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("Lose", $img1, $img2);
        return $return;
    } else if ($human == 2 & $computer == 0) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("Lose", $img1, $img2);
        return $return;
    } else if ($human == 2 & $computer == 1) {
        $img1 = $img[$computer];
        $img2 = $img[$human];
        $return = array("You Wind", $img1, $img2);
        return $return;
    }

    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);

?>
<!DOCTYPE html>
<html>
<head>
<title>Johan Manuel Mendoza Coronado d978feca  Rock, Paper, Scissors Game</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}
?>
<form method="post" id="form1">
<select name="human" id="form1">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>

<button type="submit" value="Play" id="form1">Play</button>
<!--
<input type="submit" value="Play">
-->
<input type="submit" name="logout" value="Logout" id="form1">
</form>

<pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "<br>";
            print "Human=$names[$h] Computer=$names[$c] Result=$r[0]\n";
            print "<img src=\"$r[2]\" alt=\"Human img\">";
            print "<img src=\"$r[1]\" alt=\"Computer img\">";
            print "<br>";
        }
    }
} else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result[0]\n";
    print "<img src=\"$result[2]\" alt=\"Human img\">";
    print "<img src=\"$result[1]\" alt=\"Computer img\"><br>";

}
?>
</pre>
<!--
<img src="<?php printf($result[2]);?>" alt="First img">
<img src="<?php printf($result[1]);?>" alt="Second img"> 
-->

</div>
</body>
</html>
