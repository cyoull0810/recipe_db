<?php
class Recipe extends CI_Controller {
  
  public function __construct()
  {
          parent::__construct();
          $this->load->view('templates/header');
          $this->load->helper('url_helper');
  }

  //public function recipe_summary()
public function index()
  {  
     // $this->load->view('templates/header');
      $this->load->view('recipes/index');
     //  $this->load->view('templates/footer');

  }

  public function recipe_menu($category) {
    $this->load->model('Recipes_model');
    $data['category'] = $this->Recipes_model->get_recipes($category);
    // $this->load->view('templates/header');
   
    $this->load->view('recipes/Recipes_view', $data);
    $this->load->view('templates/footer');
  
  // For testing to dump the array values returned
  // echo '<pre>';
  //print_r($data);
  }
}
