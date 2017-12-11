<?php 

class mOrden_Inspeccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
		$this->emetro_online = $this->load->database('emetro_online',TRUE);
	}
	public function getOrden_Inspeccion($idSolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('orden_inspeccion');
		$this->emetro_local->WHERE('idSolicitud',$idSolicitud);
		$r = $this->emetro_local->get();
		$resultado = $r->row_array();
		return $resultado;
	}
		public function getOrden_Inspeccion_Online($idSolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->FROM('orden_inspeccion');
		$this->emetro_online->WHERE('idSolicitud',$idSolicitud);
		$r = $this->emetro_online->get();
		$resultado = $r->row();
		return $resultado;
	}
}