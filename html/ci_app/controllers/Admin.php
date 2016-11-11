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
        $view_context = array();

        $userdata = $this->session->userdata;

        if($this->is_valid_user()) {
            $view_context['title'] = "Main menu";
            $view_context['name'] = $userdata['name'];
            // load manager view
            $this->load->view('admin/manage', $view_context);
        }
        else {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect("admin");
    }

    public function listing($type) {
        echo "Listing: " . $type;
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
