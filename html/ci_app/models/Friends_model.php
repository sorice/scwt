<?php
class Friends_model extends CI_Model {
    private $table_name = "friends";

    public $id;
    public $image;
    public $opinion;
    public $author;

    public function __construct()
    {
        parent::__construct();

        // make database available using $this->db in all methods
        $this->load->database();

        // use method get_friends to obtain an array of stories to process
    }

    public function get_friends($limit = 0) {
        $query = 0;
        if ($limit) {
            $query = $this->db->get($this->table_name, $limit);
        }
        else {
            // load all data for admin
            $query = $this->db->get($this->table_name);
        }

        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }

        // return random item
        $this->load->helper('array');
        return random_element($result);
    }
}
