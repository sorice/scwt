<?php
class Carousel_model extends CI_Model {
    private $table_name = "carousel";

    public $id;
    public $image;
    public $main_text;
    public $secondary_text;

    public function __construct() {
        parent::__construct();
    }

    public function get_random_images() {
        // select all images
        // set random order
        $this->db->order_by('id', 'RANDOM');
        $query = $this->db->get($this->table_name);

        // randomize even more
        $result = $query->result_array();
        shuffle($result);

        // return 3 items
        return array_slice($query->result_array(), 0, 3);
    }

    public function get_images($limit = 0) {
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
