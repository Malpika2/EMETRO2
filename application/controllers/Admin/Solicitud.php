<?php 
		
class solicitud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mSolicitud');
		$this->load->model('Inspector/mOperadores');
		$this->load->model('Inspector/mUsuario');
	}
	public function index(){
		$row_solicitudes = $this->mSolicitud->getSolicitudes();
		foreach ($row_solicitudes as $solicitud) {
			$data['row_operador'][$solicitud->idsolicitud]=$this->mOperadores->getOperador($solicitud->idoperador);
		}
		$data['row_solicitudes'] = $row_solicitudes;
		$data['row_usuario'] = $this->mUsuario->getUsuarioSelf();

		$this->load->view('Administrador/vHeader');
		$this->load->view('Administrador/vMenu');
		$this->load->view('Administrador/vSolicitud',$data);
		$this->load->view('Administrador/vFooter');

	}
}