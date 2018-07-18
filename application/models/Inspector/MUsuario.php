<?php 
class mUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getUsuario(){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('usuario');
		$this->emetro_local->where('usuario',$this->session->userdata('MM_Username'));
		$r=$this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getUsuarioSelf(){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('usuario');
		$this->emetro_local->where('usuario',$this->session->userdata('MM_Username'));
		$r=$this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
}