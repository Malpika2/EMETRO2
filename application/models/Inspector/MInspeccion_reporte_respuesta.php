<?php

class mInspeccion_reporte_respuesta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getinspeccion_reporte_repuesta($idsolicitud,$idIns_Preg){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('inspeccion_reporte_respuesta');
		$this->emetro_local->WHERE('idsolicitud',$idsolicitud);
		$this->emetro_local->WHERE('idinspeccion_reporte_pregunta',$idIns_Preg);
		$r = $this->emetro_local->get();
		$result = $r->row_array();
		return $result;
	}
}