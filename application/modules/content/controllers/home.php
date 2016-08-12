<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends Public_Controller {

    CONST DOCTOR_ID = 2;
    CONST THERAPIST_ID = 3;
    CONST GYM_ID = 4;
    CONST MIND_BODY_ID = 5;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->load->model("gallery/gallery_model");
        $data['gallery'] = $this->gallery_model->getHomepagevideos();

        $specialties = $this->load->model('master/specialities');
        $data['dr_specialties'] = $specialties->getSpecialityBytype(self::DOCTOR_ID);

        $data['DOCTOR_ID'] = self::DOCTOR_ID;
        $data['THERAPIST_ID'] = self::THERAPIST_ID;
        $data['GYM_ID'] = self::GYM_ID;
        $data['MIND_BODY_ID'] = self::MIND_BODY_ID;

        $amenities = $this->load->model('master/amenitiess');
        $data['therapist_amenities'] = $amenities->getAmenitiesBytype(self::THERAPIST_ID);
        $data['gym_amenities'] = $amenities->getAmenitiesBytype(self::GYM_ID);
        $data['mind_body_amenities'] = $amenities->getAmenitiesBytype(self::MIND_BODY_ID);

        $type = $this->load->model('master/typies');
        $data['therapist_type'] = $type->getTypesBytype(self::THERAPIST_ID);
        $data['gym_type'] = $type->getTypesBytype(self::GYM_ID);
        $data['mind_body_type'] = $type->getTypesBytype(self::MIND_BODY_ID);
//            $data['gym_amenities']=$amenities->getAMenitiesBytype(self::GYM_ID);
//            $data['mind_body_amenities']=$amenities->getAMenitiesBytype(self::MIND_BODY_ID);

        $conditions = $this->load->model('master/conditiontreated');
        $data['conditions'] = $conditions->getAllConditions();

        $procedures = $this->load->model('master/procedureperformed');
        $data['procedures'] = $procedures->getAllProcedure();

        $city = $this->load->model('master/cities');
        $data['city'] = $city->getAllCity();

        $state = $this->load->model('master/state');
        $data['state'] = $state->getAllStates();




        //load Template
        $this->template->view("home", $data);
    }

    public function contactus() {
        $data = array();
        $this->form_validation->set_rules('name', 'Name', "trim|required|max_length[100]");
        $this->form_validation->set_rules('email', 'Email', "trim|required|max_length[100]");
        $this->form_validation->set_rules('subject', 'Subject', 'trim|max_length[50]');
        $this->form_validation->set_rules('message', 'Massage', 'required|max_length[500]');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            extract($this->input->post());

//                 $this->load->library('email');
//                 $this->email->from($email, $name);
//                 $this->email->to('someone@example.com'); 
//                 $this->email->subject($subject);
//                 $this->email->message($message);	
//                 $this->email->send();

            redirect('/content/home/contactus', 'refresh');
        } else {
            $this->template->view("contactus", $data);
        }
    }

    public function aboutus() {
        $data = array();
        //load Template
        $this->template->view("aboutus", $data);
    }

    public function search() {
        $data = array();
        $form_selected_data = array();
        $form_data = $this->input->post();
        if ($form_data) {
            foreach ($form_data as $key => $value) {
                if (isset($value) && $value) {
                    $form_selected_data[$key] = $value;
                }
            }
        }
        $data['form_data'] = $form_selected_data;
        $content = $this->input->post();
        $this->load->model("search_model");

        $data['contents'] = $this->search_model->getSearchData($content);

        $this->template->view("search", $data);
    }
    
    public function searchResult()
    {
        $data=array();
        $id=$this->uri->segment(4);
        $userModel=$this->load->model('users/users_model');
        $data['user_detail']=$userModel->getUserById($id);
        
        $this->template->view('search_details',$data);
    }

}
