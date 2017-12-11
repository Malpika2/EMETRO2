<?php

class inicio extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mActualizar');
	}
	public function index(){
		$this->load->view('vInicioG');
	}
	public function actualizar(){
		return $this->mActualizar->actualizar();
	}
}