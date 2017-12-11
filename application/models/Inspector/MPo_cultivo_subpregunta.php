<?php 
class mPo_cultivo_subpregunta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getPo_cultivo_subpregunta($idpo_cultivo_pregunta){
		$this->emetro_local->SELECT('texto1');
		$this->emetro_local->FROM('po_cultivo_subpregunta');
		$this->emetro_local->WHERE('idpo_cultivo_pregunta',$idpo_cultivo_pregunta);
		$this->emetro_local->ORDER_BY('idpo_cultivo_pregunta','ASC');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
}