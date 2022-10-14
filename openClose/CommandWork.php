<?php
include_once ('AddCommand.php');
include_once('SortAscCommand.php');
include_once ('RepoDescCommand.php');

interface CommandWork {
    public function executeCommand();
}