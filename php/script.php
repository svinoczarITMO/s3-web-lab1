<?php
    require "utils.php";

    $initial_time = microtime(true);
    $x = floatval($_POST["x_field"]);
    $y = floatval($_POST["y_field"]);
    $R = floatval($_POST["R_value"]);
    $executionTime = $initial_time - $_SERVER['REQUEST_TIME'];

    if(validate($x, $y, $R)){
        $Collision = checkDot($x, $y, $R);

        if($Collision){
            $res = "true";
        } else {
            $res = "false";
        }

        $data = array('collision' => $res, 'exectime' => $executionTime);

        echo json_encode($data);
        http_response_code(201);
    } else {
        echo json_encode(array('collision' => "некорректные данные", 'execute time' => NULL));
        http_response_code(400);
    }

    // test1(1,1,3)
?>