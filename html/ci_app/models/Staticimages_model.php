<?php
class StaticImages_model extends CI_Model {
    private $table_name = "static_images";

    public $id;
    public $overview_img_welcome;
    public $overview_img_transport;
    public $overview_img_accommodation;
    public $overview_img_tours;
    public $contact_img_yanet;
    public $contact_img_abel;
    public $contact_img_jane;

    public function __construct() {
        parent::__construct();

        // load data since this is a one row table
        $query = $this->db->get($this->table_name);
        $row = $query->row_object();

        $this->id = $row->id;
        $this->overview_img_welcome = $row->overview_img_welcome;
        $this->overview_img_transport = $row->overview_img_transport;
        $this->overview_img_accommodation = $row->overview_img_accommodation;
        $this->overview_img_tours = $row->overview_img_tours;
        $this->contact_img_yanet = $row->contact_img_yanet;
        $this->contact_img_abel = $row->contact_img_abel;
        $this->contact_img_jane = $row->contact_img_jane;
    }

    public function update($data) {
        if(count($data)) {
            $this->id = $data["id"];

            // update data
            $this->$data['selected_image'] = $data['new_image'];

            return $this->db->update($this->table_name, $this,
                array('id' => $this->id));
        }

        return false;
    }
}
