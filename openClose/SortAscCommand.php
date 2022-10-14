<?php
class SortAscCommand implements CommandWork
{
    public $args = [];

    function __construct($postArg) {
        $this->args = $postArg;
    }
    /*
     * this will return an array
     * */
    public function executeCommand() {
        sort($this->args);
        return $this->args;
    }
}