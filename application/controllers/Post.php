<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

class Post extends REST_Controller {

    public function index_get(){
        $data_array = array("測試"=>"可以用");

        // $this->response($data_array);
        $this->response_prepare($data_array);
    }
    
    public function index_post(){
        $data_array = array("測試"=>"POST可以用");
        $this->response_prepare($data_array);
    }

    private function response_prepare($data){
        $res = array(
            "http_code" => 200,
            "data" => $data
        );
     
        $this->response($res);
    }
}