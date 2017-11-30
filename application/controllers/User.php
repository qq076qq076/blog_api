<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

class User extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    // function index_get(){
    //     echo "OK";
    // }

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
    
    public function login_post(){
        // $data_array = array("測試"=>"POST可以用");
        $data_array = array();
        $data = $this->post();
        if($this->validlogin($data)){
            $check = $this->User_model->login($data) > 0;
            if($check){
                $data_array['token'] = '12312312';
            }else{
                $data_array['message'] = '帳號或密碼錯誤';
            }
        }else{
            $data_array['http_code'] = 400;
            $data_array['message'] = $this->form_validation->error_array();
        }
        $this->response_prepare($data_array);
    }

    private function validlogin($data){
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('account', '帳號', 'required');
        $this->form_validation->set_rules('password', '密碼', 'required');

        return $this->form_validation->run();
    }

    private function response_prepare($data){
        $http_code = isset($data['http_code']) ? $data['http_code'] : 200 ;
        $res = array(
            "http_code" => $http_code,
            "data" => $data
        );
     
        $this->response($res);
    }
}