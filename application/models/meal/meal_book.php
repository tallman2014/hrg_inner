<?php
	class meal_book extends CI_Model
	{
		function __construct()
 		{
 			parent::__construct();
 			$this->load->database();
 		} 

 		function menulist()
 		{
 			$menu_list = array();
 			$menu_all = array();
 			$restaurantid = $this->input->post('project');
 			$sql = "SELECT * FROM restaurant_type WHERE restaurant_id = $restaurantid";
 			$query = $this->db->query($sql);
 			foreach ($query->result() as $row) {
 				$menu_content = array();
 				$sql = "SELECT * FROM restaurant_menu WHERE type_id = $row->type_id";
 				$query = $this->db->query($sql);
 				foreach ($query->result() as $row2) {
 					$menu_content[$row2->id] = $row2->meal_name . "," . $row2->meal_price;
 				} 
 				$menu_list[$row->type_name] = $menu_content;

 				unset($menu_content);
 				array_push($menu_all,$menu_list);
 				unset($menu_list);
 			}
 			//print_r($menu_all);
 			return $menu_all;

 		}

	}

?>