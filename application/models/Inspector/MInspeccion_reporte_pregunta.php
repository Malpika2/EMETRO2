<?php 

class mInspeccion_reporte_pregunta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getinspeccion_reporte_pregunta(){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('inspeccion_reporte_pregunta');
		$this->emetro_local->ORDER_BY('idinspeccion_reporte_pregunta');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}

}