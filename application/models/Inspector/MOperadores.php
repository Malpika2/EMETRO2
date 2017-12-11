<?php 

class mOperadores extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
		$this->emetro_online = $this->load->database('emetro_online',TRUE);
	}
	public function getOperador($idoperador){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('operador');
		$this->emetro_local->where('idoperador',$idoperador);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
	public function getOperador_online($idoperador){
		$this->emetro_online->SELECT('*');
		$this->emetro_online->FROM('operador');
		$this->emetro_online->where('idoperador',$idoperador);
		$r = $this->emetro_online->get();
		$result = $r->row();
		return $result;	
		}
}