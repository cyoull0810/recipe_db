<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
    private $database = 'recipe';
	private $collection = 'recipes';
    private $conn;
    
    public function __construct(){
        $this->load->model('Admin_model');
        $this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
        }
        

        public function get_recipes($category)
        {
            $res['recipes']=$this->mongo_db->get_where('recipes', array('CATEGORY' => $category));
    
            return $res; 

        }

        function get_recipe($_id) {
            try {
                $res['recipes']=$this->mongo_db->get_where('recipes', array('_id' => new MongoDB\BSON\ObjectID($_id)));

                 $recipe_update = array();
                 foreach ($res['recipes'] as $recipe) {
                  $recipe_update[] = array('title' => $recipe['RECIPE'], 
                                        'category' => $recipe['CATEGORY'], 
                                        'location' => $recipe['LOCATION'],
                                        '_id' => $_id);
                 }

                 return $recipe_update;
                }
               catch(MongoDB\Driver\Exception\RuntimeException $ex) {
                show_error('Error while fetching user: ' . $ex->getMessage(), 500);
                  return NULL;
            }
        }


        function update_recipe($_id, $title, $category, $location) {    
            try {
                $query = new MongoDB\Driver\BulkWrite();
                $query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('RECIPE' => $title, 'CATEGORY' => $category)]);
                $result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);   
                  
                  //  var_dump($result);

                    return TRUE;

                } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
                 //  var_dump($ex->getMessage());
                    show_error('Error while updating users: ' . $ex->getMessage(), 500);
                 }
            }   

            function create_recipe($title, $category) {

                try {
                    

// Upload the recipe to the category directory identified in the form
                    $uploadpath = $_SERVER['DOCUMENT_ROOT']. '/recipe/assets/Recipes/' . $category;

                    $config['upload_path']          = $uploadpath;
                    $config['allowed_types']        = 'gif|jpg|png|html|txt|pdf|csv';
                    $config['max_size']             = 100;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('recipe'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/Recipe_update', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $location_path = 'Recipes' . '/' . $category . '/' . $this->upload->data('file_name'); ; 
                        $recipe = array(
                        'RECIPE' => $title,
                        'CATEGORY' => $category,
                        'LOCATION' => $location_path
                    );

                        $query = new MongoDB\Driver\BulkWrite();
                        $query->insert($recipe);
                        
                        $result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

                      
                       // $this->load->view('upload_success', $data);
                      
                }
                     // var_dump($result->getInsertedCount());
                    
                    if($result->getInsertedCount() == 1) {
                        return TRUE;
                    }
                    
                    return FALSE;

                } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
                    show_error('Error while saving users: ' . $ex->getMessage(), 500);
                }
            }

       }

