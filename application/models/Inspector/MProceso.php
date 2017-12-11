<?php 
class mProceso extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);

	}
	public function getProcesos(){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('proceso');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getProceso($idProceso){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('proceso');
		$this->emetro_local->where('idproceso',$idProceso);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}


}