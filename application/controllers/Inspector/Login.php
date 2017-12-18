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
		$this->load->model('Inspector/mInspeccion');

	}
	public function index()
	{
		if (isset($_SESSION['s_session'])){
			$row_solicitud = $this->mSolicitud->getSolicitudesPagado();
			foreach ($row_solicitud as $solicitud) {
				$data['row_orden_inspeccion'][$solicitud->idsolicitud] = $this->mOrden_Inspeccion->getOrden_Inspeccion($solicitud->idsolicitud);
				$data['row_inspeccion'][$solicitud->idsolicitud] = $this->mInspeccion->getInspeccion($solicitud->idsolicitud);
			}
			$data['row_solicitud'] = $row_solicitud;

			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/vMenu');
			$this->load->view('Inspector/vIndex',$data);
			$this->load->view('Inspector/vFooter');
			}
			else{
			if ($this->login()=='1') {
				$row_solicitud = $this->mSolicitud->getSolicitudesPagado();
				foreach ($row_solicitud as $solicitud) {
					$data['row_orden_inspeccion'][$solicitud->idsolicitud] = $this->mOrden_Inspeccion->getOrden_Inspeccion($solicitud->idsolicitud);
					$data['row_inspeccion'][$solicitud->idsolicitud] = $this->mInspeccion->getInspeccion($solicitud->idsolicitud);
				}
				$data['row_solicitud'] = $row_solicitud;
				$this->load->view('Inspector/vHeader');
				$this->load->view('Inspector/vMenu');
				$this->load->view('Inspector/vIndex',$data);
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