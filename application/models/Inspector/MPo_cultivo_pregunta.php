<?php
class mPo_cultivo_pregunta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getPo_cultivo_pregunta(){
		$query_po_cultivo_pregunta = "SELECT * FROM po_cultivo_pregunta ORDER BY idpo_cultivo_pregunta ASC";
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('po_cultivo_pregunta');
		$this->emetro_local->ORDER_BY('idpo_cultivo_pregunta','ASC');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
}