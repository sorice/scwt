<?php
class Accommodation_model extends CI_Model {
    private $table_name = "accommodation";

    public $id;
    public $cover_image;
    public $name;
    public $price;
    public $description;

    public function __construct() {
        parent::__construct();
    }

    public function get_accommodations($limit = 0) {
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
