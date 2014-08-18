<?php
	class meal_book extends CI_Controller {
	function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('url');
 		//$this->load->model('Message');
 		$this->load->library('form_validation');
 		$this->load->helper('form');
 		//$this->load->model('mauth');
 		//$this->load->dbutil();
 		$this->load->helper('file');
 		$this->load->library('pagination'); 
 		$this->load->library('table');
 		$this->load->model('common');
 	}

 	function meal_book2()
 	{
 		print_r("xx");
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md);
 		$arrProject = $this->common->generatePj(array('鲜粥道'),"project");
 		$data['project'] = $arrProject;
 		$data['border'] = 0;
 		//$data['menuid'] = $menuid;
 		$this->load->view('/meal/meal_book',$data);
 	}

 	function meal_book_ok()
 	{
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md); 	
 		$this->load->model('/meal/meal_book');
 		$arrProject = $this->common->generateSelPjByid(array('鲜粥道'),"project",$this->input->post('project'));
 		$data['project'] = $arrProject;
 		$data['menudata'] = $this->meal_book->menulist();
 		//$data['menuid'] = $menuid;
 		$data['border'] = 1;
 		$this->load->view('/meal/meal_book',$data);
 	}

 	function meal_check()
 	{
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md);
 	}

 	function meal_rank()
 	{
 		print_r("暂无，敬请期待…………");
 	}
}

?>