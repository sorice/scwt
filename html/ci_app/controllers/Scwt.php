<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scwt extends CI_Controller {
    public function index()
    {
        $view_context = array();

        // load index.php page data
        $this->load->database();

        // static text
        $query = $this->db->select('overview, overview_welcome, overview_transport, overview_accommodation,
            overview_tours, address, phone, contact_info_yanet, contact_info_abel, contact_info_jane')->from('static_text')->get();

        foreach($query->result() as $row) {
            $view_context['overview'] = $row->overview;
            $view_context['overview_welcome'] = $row->overview_welcome;
            $view_context['overview_transport'] = $row->overview_transport;
            $view_context['overview_accommodation'] = $row->overview_accommodation;
            $view_context['overview_tours'] = $row->overview_tours;
            $view_context['contact_info_yanet'] = $row->contact_info_yanet;
            $view_context['contact_info_abel'] = $row->contact_info_abel;
            $view_context['contact_info_jane'] = $row->contact_info_jane;
            $view_context['address'] = $row->address;
            $view_context['phone'] = $row->phone;
        }

        // static images
        $query = $this->db->select('overview_img_welcome, overview_img_transport, overview_img_accommodation,
            overview_img_tours, contact_img_yanet, contact_img_abel, contact_img_jane')->from('static_images')->get();

        foreach($query->result() as $row) {
            $view_context['overview_img_welcome'] = $row->overview_img_welcome;
            $view_context['overview_img_transport'] = $row->overview_img_transport;
            $view_context['overview_img_accommodation'] = $row->overview_img_accommodation;
            $view_context['overview_img_tours'] = $row->overview_img_tours;
            $view_context['contact_img_yanet'] = $row->contact_img_yanet;
            $view_context['contact_img_abel'] = $row->contact_img_abel;
            $view_context['contact_img_jane'] = $row->contact_img_jane;
        }

        // stories
        $stories = array();
        $query = $this->db->select('title, summary, cover_image')->from('stories')->limit(3)->get();

        foreach($query->result() as $row) {
            $stories[] = array(
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


        // view's contexts
        // page title
        $header_context['title'] = 'Welcome';
        // show the correct menu
        $nav_context['nav_index'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('footer');
    }

    public function transport()
    {
        $view_context = array();

        // view's contexts
        // page title
        $header_context['title'] = 'Transport';
        // show the correct menu
        $nav_context['nav_transport'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('footer');
    }

    public function accommodation()
    {
        $view_context = array();

        // view's contexts
        // page title
        $header_context['title'] = 'Accommodation';
        // show the correct menu
        $nav_context['nav_accommodation'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('footer');
    }

    public function tours()
    {
        $view_context = array();

        // view's contexts
        // page title
        $header_context['title'] = 'Tours';
        // show the correct menu
        $nav_context['nav_tours'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('footer');
    }
}

// generate unique verification code for comments... var_dump(bin2hex(openssl_random_pseudo_bytes(16, $cstrong)));
