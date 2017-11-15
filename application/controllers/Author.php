<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

class Author extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Author_model');
    }

    public function index_get(){
        $data = $this->get();
        $search_id = (isset($data['id'])) ? $data['id'] : null ;
        $data_array  = $this->Author_model->get($search_id);
        
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