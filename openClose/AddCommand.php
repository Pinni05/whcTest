<?php
class AddCommand implements CommandWork
{
    public $args = [];

    function __construct($postArg) {
        $this->args = $postArg;
    }
    /*
         * this will return flota/int type
         * */
    public function executeCommand() {
        return array_sum($this->args);
    }
}