<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index()
    {
        $userdata = $this->session->userdata;

        if($this->is_valid_user()) {
            redirect("admin/manage");
        }

        // view data
        $view_context = array();

        // check for post data
        if(count($this->input->post())) {
            $u = md5(html_escape($this->input->post('username')));
            $p = md5(html_escape($this->input->post('password')));
            $c = html_escape($this->input->post('captcha'));

            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
      //       $this->form_validation->set_rules('resumem', 'Resumen', 'required',
            //         array('required' => 'Debe escribir el %s de la historia.')
            // );

            if($this->form_validation->run()) {
                $this->load->database();

                // verify login
                $query = $this->db->select('name')->from('admin')->where('username', $u)->where('password', $p)->get();

                $row = $query->row_object();
                if(count($row)) {
                    $view_context['name'] = $row->name;

                    $user_data = array(
                        'authenticated' => true,
                        'username' => $u,
                        'name' => $row->name
                    );
                    $this->session->userdata = $user_data;

                    redirect("admin/manage");
                }
                else {
                    $view_context['login_failed'] = 'login_failed';
                }
            }
        }

        // captcha
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url('captcha/'),
            'expiration' => 120,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);

        // TODO
        // $data = array(
        //         'captcha_time'  => $cap['time'],
        //         'ip_address'    => $this->input->ip_address(),
        //         'word'          => $cap['word']
        // );

        // $query = $this->db->insert_string('captcha', $data);
        // $this->db->query($query);

        if($cap) {
            $view_context['captcha'] = $cap['image'];
        }

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/login', $view_context);
    }

    public function manage() {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $view_context = array();
        $userdata = $this->session->userdata;



        $view_context['title'] = "Main menu";
        $view_context['name'] = $userdata['name'];
        // load manager view
        $this->load->view('admin/manage', $view_context);
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect("admin");
        // set flash_data like in sessions to show temp data in login page
    }

    public function listing($type) {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $view_context = array();

        switch($type) {
            case "text":
                $this->load->model('statictext_model');

                if(count($this->input->post())) {
                    $u = md5(html_escape($this->input->post('username')));

                    // load validations
                    $this->load->library('form_validation');
                    // set rules
                    $this->form_validation->set_rules('overview', 'Overview heading', 'trim|required');
                    $this->form_validation->set_rules('overview_welcome', 'Overview welcome', 'trim|required');
                    $this->form_validation->set_rules('overview_transport', 'Overview transport', 'trim|required');
                    $this->form_validation->set_rules('overview_accommodation', 'Overview accommodation', 'trim|required');
                    $this->form_validation->set_rules('overview_tours', 'Overview tours', 'trim|required');
                    $this->form_validation->set_rules('stories', 'Stories heading', 'trim|required');
                    $this->form_validation->set_rules('friends', 'Friends heading', 'trim|required');
                    $this->form_validation->set_rules('address', 'Address', 'trim|required');
                    $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
                    $this->form_validation->set_rules('contact_info_yanet', 'Contact info: Yanet', 'trim|required');
                    $this->form_validation->set_rules('contact_info_abel', 'Contact info: Abel', 'trim|required');
                    $this->form_validation->set_rules('contact_info_jane', 'Contact info: Jane', 'trim|required');
                    $this->form_validation->set_rules('transport', 'Transport heading', 'trim|required');
                    $this->form_validation->set_rules('accommodation', 'Accommodation heading', 'trim|required');
                    $this->form_validation->set_rules('tours', 'Tours heading', 'trim|required');

                    // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
              //       $this->form_validation->set_rules('resumem', 'Resumen', 'required',
                    //         array('required' => 'Debe escribir el %s de la historia.')
                    // );

                    if($this->form_validation->run()) {
                        // load array helper
                        $this->load->helper('array');
                        // using elements from array helper to extract data from post
                        $items = array(
                            "id", "overview", "overview_welcome",
                            "overview_transport", "overview_accommodation",
                            "overview_tours", "stories", "friends",
                            "address", "phone", "contact_info_yanet",
                            "contact_info_abel", "contact_info_jane",
                            "transport", "accommodation", "tours"
                        );
                        $result = $this->statictext_model->update(elements($items, $this->input->post()));

                        if($result) {
                            $view_context['data_saved'] = "Data saved.";
                        }
                        else {
                            $view_context['errors'] = "Errors";
                        }
                    }
                }

                $view_context['section_title'] = "Static Text";
                $view_context['model'] = $this->statictext_model;

                // load helper and view
                $this->load->helper('form');
                $this->load->view('admin/statictext', $view_context);
            break;
            case "images":
                echo "Listing static images";
            break;
            case "stories":
                echo "Listing stories";
            break;
            case "friends":
                echo "Listing friends comments";
            break;
        }
    }

    private function is_valid_user() {
        $userdata = $this->session->userdata;

        if(isset($userdata['authenticated']) && $userdata['authenticated'] &&
            isset($userdata['username']) && isset($userdata['name']))
            return true;

        return false;
    }
}

// generate unique verification code for comments... var_dump(bin2hex(openssl_random_pseudo_bytes(16, $cstrong)));

// check every CRUD operation for the correct csrf using POST data and
// helpers:
// get_csrf_hash
// get_csrf_token_name

// echo "<pre>"; print_r($userdata); echo "</pre>";
