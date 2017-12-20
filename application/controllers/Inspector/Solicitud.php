<?php

class solicitud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mSolicitud');
		$this->load->model('Inspector/mOperadores');
		$this->load->model('Inspector/mEstados');
		$this->load->model('Inspector/mUnidad_produccion');
		$this->load->model('Inspector/mSolicitud_producto');
		$this->load->model('Inspector/mSolicitud_proceso');
		$this->load->model('Inspector/mProceso');
		// $this->load->model('Inspector/mExcepcion');
		$this->load->model('Inspector/mUsuario');
	}
	public function index(){

		$solicitud_categoria_certificacion = $this->mSolicitud->getSolicitud_categoria_certificacion();
		foreach ($solicitud_categoria_certificacion as $s_c_certificacion) {
			$data['row_nombre_categoria'][$s_c_certificacion->idcategoria_certificacion] =  $this->mSolicitud->getnombre_categoria($s_c_certificacion->idcategoria_certificacion);
		}

		

		$data['row_solicitud_categoria_certificacion'] = $solicitud_categoria_certificacion;
		$idsolicitud = $this->input->post('idsolicitud');
		$data['row_solicitud'] = $this->mSolicitud->getSolicitud_Local_porId($idsolicitud);
		$row_solicitud =  $this->mSolicitud->getSolicitud_Local_porId($idsolicitud);
		$data['row_operador'] = $this->mOperadores->getOperador($row_solicitud->idoperador);
		$data['row_estado'] = $this->mEstados->getEstados();
		$data['row_usuario'] = $this->mUsuario->getUsuario();
		$row_producto = $this->mSolicitud_producto->getSolicitud_producto($idsolicitud);
		$row_unidades = $this->mUnidad_produccion->getUnidad_produccion($row_solicitud->idoperador);
		$row_procesos = $this->mSolicitud_proceso->getSolicitud_proceso($idsolicitud);
		$row_proceso = $this->mProceso->getProcesos();
		// $row_exception = $this->mExcepcion->getExceptions();
		// $data['row_exception']=$row_exception;


		$data['row_proceso']=$row_proceso;
		$data['row_procesos']=$row_procesos;
		$data['row_unidades']=$row_unidades;
		$data['row_producto']=$row_producto;
		$this->load->view('Inspector/vHeader');
		$this->load->view('Inspector/vMenu');
		$this->load->view('Inspector/Inspeccion/vSolicitud',$data);
		$this->load->view('Inspector/vFooter');
	}
	public function firmar_solicitud(){
		$idsolicitud = $this->input->post('idsolicitud');
		$firma_nombre = $this->input->post('firma_nombre');
		$this->mSolicitud->updateSolicitud($idsolicitud,$firma_nombre);
	}
	public function revision_solicitud(){
		$idsolicitud = $this->input->post('idsolicitud');
		$this->mSolicitud->revision_solicitud($idsolicitud);

	}


}