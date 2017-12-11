<?php
class mPo_cultivo_respuesta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getRespuesta($idsolicitud,$idpo_cultivo_pregunta){
		$this->emetro_local->SELECT('respuesta, comentario ,implementacion , conformidad');
		$this->emetro_local->FROM('po_cultivo_respuesta');
		$this->emetro_local->WHERE('idsolicitud',$idsolicitud);
		$this->emetro_local->WHERE('idpo_cultivo_pregunta',$idpo_cultivo_pregunta);
		$r = $this->emetro_local->get();
		$result = $r->row_array();
		return $result;
	}
}