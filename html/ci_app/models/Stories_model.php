<?php
class Stories_model extends CI_Model {
    private $table_name = "stories";

    public $id;
    public $title;
    public $summary;
    public $description;
    public $cover_image;

    public function __construct() {
        parent::__construct();
    }

    public function get_stories($limit = 0) {
        $this->db->order_by('id', 'DESC');
        $query = 0;
        if ($limit) {
            $query = $this->db->get($this->table_name, $limit);
        }
        else {
            $query = $this->db->get($this->table_name);
        }

        return $query->result_array();
    }
}
