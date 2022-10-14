<?php
class RepoDescCommand implements CommandWork
{
    public $args = [];

    function __construct($postArg) {
        $this->args = $postArg;
    }
    public function getDescriptionFromGithub(){
        $options = array(
            CURLOPT_USERAGENT      => "Pinni05"
        );
        $url = "https://api.github.com/repos/".$this->args[0].'/'.$this->args[1];
        $curl = curl_init();
        curl_setopt_array( $curl, $options );
        curl_setopt($curl, CURLOPT_URL,  $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
        $content =json_decode(curl_exec($curl), true);
        curl_close($curl);
        if (!in_array('description', $content))
            return ("Repo not found");
        else
            return $content['description'];

    }
    public function executeCommand() {
        return $this->getDescriptionFromGithub();
    }
}