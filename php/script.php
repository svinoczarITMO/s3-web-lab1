<?php
session_start();

require "utils.php";

$initial_time = microtime(true);
$_SESSION['x'] = floatval($_POST['x_field']);
$_SESSION['y'] = floatval($_POST['y_field']);
$_SESSION['R'] = floatval($_POST['R_value']);

if (validate($_SESSION['x'], $_SESSION['y'], $_SESSION['R'])) {
    $collision = checkDot($_SESSION['x'], $_SESSION['y'], $_SESSION['R']);
    $executionTime = $initial_time - $_SERVER['REQUEST_TIME'];

    $result = array(
        'x' => $_SESSION['x'],
        'y' => $_SESSION['y'],
        'R' => $_SESSION['R'],
        'collision' => $collision ? "true" : "false",
        'exectime' => $executionTime
    );

    $_SESSION['results'][] = $result;

    echo json_encode($result);
    http_response_code(201);
} else {
    echo json_encode(array('collision' => "Некорректные данные", 'execute time' => NULL));
    http_response_code(400);
}
