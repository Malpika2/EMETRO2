<?php
/**
* 
*/
class cMapa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mMapa');
	}
	
	public function index()
	{
		$this->load->view('Inspector/vHeader');
		$this->load->view('Inspector/vMenu');
		$this->load->view('Inspector/Inspeccion/vMapa');
		$this->load->view('Inspector/vFooter');
	}
	public function grabar_punto()
	{
		$param['titulo'] = $this->input->post('titulo');
		$param['descripcion'] = $this->input->post('descripcion');
		$param['cx'] = $this->input->post('cx');
		$param['cy'] = $this->input->post('cy');
		
		$this->mMapa->grabar_punto($param);
	}

	public function ver_punto()
	{
		echo json_encode($this->mMapa->ver_punto());
	}

	public function ver_marcador()
	{
		echo json_encode($this->mMapa->ver_marcador());
	}
}
