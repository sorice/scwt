<?php
class Tours_model extends CI_Model {
    private $table_name = "tours";

    public $id;
    public $cover_image;
    public $name;
    public $description;
    public $brochure;

    public function __construct() {
        parent::__construct();
    }

    public function get_tours($limit = 0) {
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
