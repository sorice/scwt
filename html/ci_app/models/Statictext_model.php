<?php
class StaticText_model extends CI_Model {
    private $table_name = "static_text";

    public $id;
    public $overview;
    public $overview_welcome;
    public $overview_transport;
    public $overview_accommodation;
    public $overview_tours;
    public $stories;
    public $friends;
    public $address;
    public $phone;
    public $contact_info_yanet;
    public $contact_info_abel;
    public $contact_info_jane;
    public $transport;
    public $accommodation;
    public $tours;

    public function __construct()
    {
        parent::__construct();

        // make database available using $this->db in all methods
        $this->load->database();

        // load data since this is a one row table
        $query = $this->db->get($this->table_name);
        $row = $query->row_object();

        $this->id = $row->id;
        $this->overview = $row->overview;
        $this->overview_welcome = $row->overview_welcome;
        $this->overview_transport = $row->overview_transport;
        $this->overview_accommodation = $row->overview_accommodation;
        $this->overview_tours = $row->overview_tours;
        $this->stories = $row->stories;
        $this->friends = $row->friends;
        $this->address = $row->address;
        $this->phone = $row->phone;
        $this->contact_info_yanet = $row->contact_info_yanet;
        $this->contact_info_abel = $row->contact_info_abel;
        $this->contact_info_jane = $row->contact_info_jane;
        $this->transport = $row->transport;
        $this->accommodation = $row->accommodation;
        $this->tours = $row->tours;
    }

    public function update($data)
    {
        if(count($data)) {
            $this->overview = $data['overview'];
            $this->overview_welcome = $data['overview_welcome'];
            $this->overview_transport = $data['overview_transport'];
            $this->overview_accommodation = $data['overview_accommodation'];
            $this->overview_tours = $data['overview_tours'];
            $this->stories = $data['stories'];
            $this->friends = $data['friends'];
            $this->address = $data['address'];
            $this->phone = $data['phone'];
            $this->contact_info_yanet = $data['contact_info_yanet'];
            $this->contact_info_abel = $data['contact_info_abel'];
            $this->contact_info_jane = $data['contact_info_jane'];
            $this->transport = $data['transport'];
            $this->accommodation = $data['accommodation'];
            $this->tours = $data['tours'];

            return $this->db->update($this->table_name, $this,
                array('id' => $data['id']));
        }

        return false;
    }
}
