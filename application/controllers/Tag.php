<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

class Tag extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Tag_model');
    }

    public function index_get(){
        $data = $this->get();
        $search_id = (isset($data['id'])) ? $data['id'] : null ;
        if($search_id){
            $data_array  = $this->Tag_model->getByTagId($search_id);
        }else{
            $data_array  = $this->Tag_model->get();
        }
        
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