<?php 

class Author_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->table = "author";
        }

        public function get($id =''){
                $query = "select * from {$this->table}";
                if($id){
                        $query .=" where id='{$id}'";
                }
                return $this->db->query($query)->result_array();
        }

}