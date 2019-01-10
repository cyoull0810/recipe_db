<?php
class Recipes_model extends CI_Model {

        public function get_recipes($category)
        {
            $res['recipes']=$this->mongo_db->get_where('recipes', array('CATEGORY' => $category));
    
            return $res; 

        }
}