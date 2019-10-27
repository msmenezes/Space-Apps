<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    
    public function template($nome, $data = array()){
        $this->view("header.php");
        $this->view($nome, $data);
        $this->view("footer.php");
    }
    
    
}