<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scwt extends CI_Controller {
    public function index()
    {
        $view_context = array();

        // load index.php page data
        // static text
        $query = $this->db->select('overview, overview_welcome, overview_transport, overview_accommodation,
            overview_tours, stories, friends')->from('static_text')->get();

        $row = $query->row_object();
        $view_context['overview_summary'] = $row->overview;
        $view_context['overview_welcome'] = $row->overview_welcome;
        $view_context['overview_transport'] = $row->overview_transport;
        $view_context['overview_accommodation'] = $row->overview_accommodation;
        $view_context['overview_tours'] = $row->overview_tours;
        $view_context['stories_summary'] = $row->stories;
        $view_context['friends_summary'] = $row->friends;

        // static images
        $query = $this->db->select('overview_img_welcome, overview_img_transport, overview_img_accommodation,
            overview_img_tours')->from('static_images')->get();

        $row = $query->row_object();
        $view_context['overview_img_welcome'] = $row->overview_img_welcome;
        $view_context['overview_img_transport'] = $row->overview_img_transport;
        $view_context['overview_img_accommodation'] = $row->overview_img_accommodation;
        $view_context['overview_img_tours'] = $row->overview_img_tours;

        // stories
        $stories = array();
        $query = $this->db->select('id, title, summary, cover_image')->from('stories')->limit(3)->get();

        foreach($query->result() as $row) {
            $stories[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'summary' => $row->summary,
                'cover_image' => $row->cover_image
            );
        }
        $view_context['stories'] = $stories;

        // friends
        $friends = array();
        $query = $this->db->select('image, opinion, author')->from('friends')->limit(3)->get();

        foreach($query->result() as $row) {
            $friends[] = array(
                'image' => $row->image,
                'opinion' => $row->opinion,
                'author' => $row->author
            );
        }
        $view_context['friends'] = $friends;


        // general view's contexts
        // page title
        $header_context['title'] = 'Welcome';
        // show the correct menu
        $nav_context['nav_index'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function transport()
    {
        $view_context = array();

        // static text
        $query = $this->db->select('transport')->from('static_text')->get();

        $row = $query->row_object();
        $view_context['transport_summary'] = $row->transport;

        // transports
        $transports = array();
        $query = $this->db->select('id, cover_image, name, description')->from('transport')->get();

        foreach($query->result() as $row) {
            $transports[] = array(
                'id' => $row->id,
                'cover_image' => $row->cover_image,
                'name' => $row->name,
                'description' => $row->description
            );
        }
        $view_context['transports'] = $transports;

        // general view's contexts
        // page title
        $header_context['title'] = 'Transport';
        // show the correct menu
        $nav_context['nav_transport'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('transport', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function accommodation()
    {
        $view_context = array();

        // static text
        $query = $this->db->select('accommodation')->from('static_text')->get();

        $row = $query->row_object();
        $view_context['accommodation_summary'] = $row->accommodation;

        // accommodations
        $accommodations = array();
        $query = $this->db->select('id, cover_image, name, english_name, price, description')->from('accommodation')->get();

        foreach($query->result() as $row) {
            $accommodations[] = array(
                'id' => $row->id,
                'cover_image' => $row->cover_image,
                'name' => $row->name,
                'english_name' => $row->english_name,
                'price' => $row->price,
                'description' => $row->description
            );
        }
        $view_context['accommodations'] = $accommodations;

        // general view's contexts
        // page title
        $header_context['title'] = 'Accommodation';
        // show the correct menu
        $nav_context['nav_accommodation'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('accommodation', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function tours()
    {
        $view_context = array();

        // static text
        $query = $this->db->select('tours')->from('static_text')->get();

        $row = $query->row_object();
        $view_context['tours_summary'] = $row->tours;

        // tours
        $tours = array();
        $query = $this->db->select('id, cover_image, name, description, brochure')->from('tours')->get();

        foreach($query->result() as $row) {
            $tours[] = array(
                'id' => $row->id,
                'cover_image' => $row->cover_image,
                'name' => $row->name,
                'description' => $row->description,
                'brochure' => $row->brochure
            );
        }
        $view_context['tours'] = $tours;

        // general view's contexts
        // page title
        $header_context['title'] = 'Tours';
        // show the correct menu
        $nav_context['nav_tours'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('tours', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    // helpers
    private function get_contact_info_helper() {
        // contact info
        $result = array();
        // text
        $query = $this->db->select('address, phone, contact_info_yanet, contact_info_abel, contact_info_jane')->from('static_text')->get();

        $row = $query->row_object();
        $result['contact_info_yanet'] = $row->contact_info_yanet;
        $result['contact_info_abel'] = $row->contact_info_abel;
        $result['contact_info_jane'] = $row->contact_info_jane;
        $result['address'] = $row->address;
        $result['phone'] = $row->phone;

        // images
        $query = $this->db->select('contact_img_yanet, contact_img_abel, contact_img_jane')->from('static_images')->get();

        $row = $query->row_object();
        $result['contact_img_yanet'] = $row->contact_img_yanet;
        $result['contact_img_abel'] = $row->contact_img_abel;
        $result['contact_img_jane'] = $row->contact_img_jane;

        return $result;
    }
}

// generate unique verification code for comments... var_dump(bin2hex(openssl_random_pseudo_bytes(16, $cstrong)));
