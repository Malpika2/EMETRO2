<?php

class mOrdenInspeccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getOrdenInspeccion($idSolicitud){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('orden_inspeccion');
		$this->emetro_local->WHERE('idSolicitud',$idSolicitud);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
}