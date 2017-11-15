<?php 

class Post_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->table = 'post';
        }

        public function get($id =''){
                $query = "select * from {$this->table} p
                        INNER JOIN tag on p.tag_id =  tag.id";
                if($id){
                        $query .=" where p.id='{$id}'";
                        $result = $this->db->query($query)->row_array();
                }else{
                        $result = $this->db->query($query)->result_array();
                }
                return $result;
        }

}