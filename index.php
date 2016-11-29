<?php
session_start();
?>

<html>
    <head>
        <title>A00992565 Mathgame</title>
        <link rel="stylesheet" href="bootstrap.min.css" media="screen" />
    </head>
    <body>
        <div class="container">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="col-sm-11 col-sm-offset-1">
                    <?php
                    if (!isset($_SESSION["valid"]) || $_SESSION["valid"] != "true"){
                        header("Location: login.php");
                        die();
                    }
                    $operator = rand(0,1);
                    $sign;
                    $left = rand(0,20);
                    $right = rand(0,20);
                    $total =  $_SESSION["total"];
                    $correct =  $_SESSION["correct"];
                    if ($operator == 0){
                        $_SESSION["answer"] = $left + $right;
                        $sign = "+";
                    }else {
                        $_SESSION["answer"] = $left - $right;
                        $sign = "-";
                    }
                    echo "<h1>Math Game</h1>";
                    echo '<div class="col-sm-2 col-sm-offset-10">';
                    echo '<form method="post" action="logout.php">';
                    echo '<input type="submit" name="logout" value="Logout" class="btn btn-primary"/>';
                    echo '</div>';
                    echo '<br/>';
                    echo "<br />$left $sign $right";
                    echo '<form method="post" action="validate.php">';
                    echo '<br/><input type="text" name="input" />';
                    if (isset($_SESSION["msg"])){
                        echo $_SESSION["msg"];
                    }
                    echo '<br/><br/><input type="submit" value="Check Answer" class="btn btn-primary"/>';
                    echo '</form>';
                    echo '<hr />';
                    echo "0$correct / 0$total";
                    echo '<br /><br /><br />';

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>