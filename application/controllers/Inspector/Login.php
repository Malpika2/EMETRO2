<?php

class login extends CI_Controller
{
	public  $mensaje='';

	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mLogin');
		$this->load->model('Inspector/mSolicitud');
		$this->load->model('Inspector/mOrden_Inspeccion');
		$this->load->model('Inspector/mOperadores');

	}
	public function index()
	{
		if (isset($_SESSION['s_session'])){
// $query_orden_inspeccion = sprintf("SELECT * FROM orden_inspeccion WHERE idsolicitud = %s", GetSQLValueString($row_solicitud['idsolicitud'], "int"));

			$row_solicitud = $this->mSolicitud->getSolicitudesPagado();
			// $row_orden_inspeccion = $this->mOrden_Inspeccion->

			$data['row_solicitud'] = $row_solicitud;
			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/vMenu');
			$this->load->view('Inspector/vIndex',$data);
			$this->load->view('Inspector/vFooter');
			}
			else{
			if ($this->login()=='1') {
			$row_solicitud = $this->mSolicitud->getSolicitudesPagado();
			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/vMenu');
			$this->load->view('Inspector/vIndex');
			$this->load->view('Inspector/vFooter');
			}if ($this->login()=='0') {
			$data['mensaje'] = $this->mensaje;
			$this->load->view('Inspector/vLogin',$data);
			}
		}
	}
	public function login()
	{
		$us=null;
		$pas=null;
		if (null!==$this->input->post('usuario')) {
			$us = $this->input->post('usuario');
			$this->mensaje='Usuario o contraseña incorrecto';	
		}
		if (null!==$this->input->post('password')) {
			$pas = $this->input->post('password');
		}
		return $this->mLogin->login($us,$pas);
	}
}