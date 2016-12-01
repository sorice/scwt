<?php
class ContactUs_model extends CI_Model {
    private $table_name = "contact_us";

    public $id;
    public $name;
    public $email;
    public $comment;
    public $verification_code;
    public $verified;

    public function __construct() {
        parent::__construct();
    }

    public function get_messages($limit = 0) {
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

    public function new_message($data) {
        if(count($data)) {
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->comment = $data['message'];
            // generate verification code (len = 32)
            $this->load->helper('string');
            $this->verification_code = random_string('alnum', 32);
            $this->verified = false;

            return $this->db->insert($this->table_name, $this);
        }

        return false;
    }
}
