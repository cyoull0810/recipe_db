<?php
class Admin extends CI_Controller {
  
  public function __construct()
  {
          parent::__construct();
          $this->load->view('templates/admin_header');
          $this->load->helper('url_helper');
          $this->load->model('Admin_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->load->library('ion_auth');
          if (!$this->ion_auth->logged_in()) {
            var_dump($this->ion_auth->logged_in());
            redirect('Auth/login', 'refresh');
         } 
            
  }

  //public function recipe_summary()
public function index()
  {  
      $this->load->view('recipes/index');
      $this->load->view('templates/footer');

  }

  public function recipe_menu($category) {
    $this->load->model('Admin_model');
    $data['category'] = $this->Admin_model->get_recipes($category);
    $this->load->view('admin/Recipe_crud', $data);
    $this->load->view('templates/footer');
  
  }
 
  public function create_recipe() {
    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('title', 'Recipe Title', 'trim');
      $this->form_validation->set_rules('category', 'Recipe Category', 'trim');
      $this->form_validation->set_rules('location', 'Directory', 'trim');

        if ($this->form_validation->run() !== FALSE) {
            $result = $this->Admin_model->create_recipe($this->input->post('title'), $this->input->post('category'));
    if($result === TRUE) {
   
      // redirect('/');
    } else {
      $data['error'] = 'Error occurred during saving data';
      $this->load->view('admin/Recipe_create', $data);
    }
        } else {
    $data['error'] = 'Error occurred during saving data: all fields are required';
            $this->load->view('admin/Recipe_create', $data);
        }
    } else {
        $this->load->view('admin/Recipe_create');
    }
}



    function update_recipe($_id) {

		if ($this->input->post('submit')) {
            $this->form_validation->set_rules('title', 'Recipe Title', 'trim');
            $this->form_validation->set_rules('category', 'Recipe Category', 'trim');
            $this->form_validation->set_rules('location', 'Directory', 'trim');
         var_dump ($this->form_validation->run());

            if ($this->form_validation->run() !== FALSE) {
              $this->load->model('Admin_model');
                $result = $this->Admin_model->update_recipe($_id,$_POST['title'],$_POST['category'],$_POST['location']);
                                                           
                if($result === TRUE) {
				            	redirect('/');
				} else {
          $data['error'] = 'Error occurred during updating data';
         
					$this->load->view('admnin/Recipe_update', $data);
				}
            } else {
              
             $data['error'] = 'error occurred during saving data: all fields are mandatory';
             $this->load->view('admin/Recipe_update', $data);
            }
        } else {
           
            $data['recipe_update'] = $this->Admin_model->get_recipe($_id);
            $this->load->view('admin/Recipe_update', $data);
        }
	}
	
	function delete($_id) {
		if ($_id) {
            $this->usermodel->delete_user($_id);
        }
		redirect('/');
	}
	
}

