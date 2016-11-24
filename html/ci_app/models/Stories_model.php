<?php
class Stories_model extends CI_Model {
    private $table_name = "stories";

    public $id;
    public $title;
    public $summary;
    public $description;
    public $cover_image;

    public function __construct()
    {
        parent::__construct();

        // make database available using $this->db in all methods
        $this->load->database();

        // use method get_stories to obtain an array of stories to process
    }

    public function get_stories($limit = 0) {
        $this->db->order_by('id', 'DESC');
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

        return $result;
    }
}
