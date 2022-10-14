<?php
include_once('../openClose/CommandWork.php');
if (isset($_POST['command']) && !empty($_POST['command'])) { // if command not empty
    $postCommand = explode(' ', trim($_POST["command"]));
    $command = $postCommand[0];
    $args = array_slice($postCommand, 1); // put args in an array

    if (!empty($command) && !empty($args)) {
        $commandToUpper =  ucwords($command, "-");
        $classname = str_replace("-", "", $commandToUpper).'Command';
        try {
            $commandClass = new $classname($args);
            if ($commandClass instanceof CommandWork) {
                $result = $commandClass->executeCommand();
                echo json_encode(array('result' => 1, 'message' => $result));
            }
        } catch (Throwable  $e) {
            echo json_encode(array('result' => 0, 'message' => "Command not implemented"));
        }
    } else {
        echo json_encode(array('result' => 0, 'message' => "Command or args can't be empty"));
    }
} else {
    echo json_encode(array('result' => 0, 'message' => "Please enter a valid command"));
}
