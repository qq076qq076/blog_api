<?php 

class User_model extends CI_Model {
    
    public function __construct()
    {
            parent::__construct();
            $this->table = 'user';
    }

    function login($data){
        $query = "select * from {$this->table}
                    where account = '{$data['account']}'
                    and password = '{$data['password']}'";
        return $this->db->query($query)->num_rows();
    }

}    