<?php
class Friends_model extends CI_Model {
    private $table_name = "friends";

    public $id;
    public $image;
    public $opinion;
    public $author;

    public function __construct() {
        parent::__construct();
    }

    public function get_random_opinion() {
        // set random order
        $this->db->order_by('id', 'RANDOM');
        // select last 10 entries
        $query = $this->db->get($this->table_name, '10');
        // randomize even more
        $this->load->helper('array');

        return random_element($query->result_array());
    }

    public function get_friends($limit = 0) {
        $query = 0;
        if ($limit) {
            $query = $this->db->get($this->table_name, $limit);
        }
        else {
            $query = $this->db->get($this->table_name);
        }

        // $result = array();
        // foreach ($query->result_array() as $row) {
        //     $result[] = $row;
        // }

        return $query->result_array();
    }
}
