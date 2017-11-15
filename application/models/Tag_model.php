<?php 

class Tag_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->table = 'tag';
        }

        public function get(){
                $query = "select t.*,count(*) as num from {$this->table} t
                        left JOIN post p on p.tag_id = t.id
                        group by t.id";
                $result = $this->db->query($query)->result_array();
                return $result;
        }

        function getByTagId($id){
                $query="select p.id,p.title,p.createDate from post p
                        INNER JOIN tag on p.tag_id =  tag.id
                        where p.tag_id = '{$id}'";
                $result = $this->db->query($query)->result_array();
                return $result;
        }

}