<?php 

class mSolicitud_producto extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getSolicitud_producto($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('solicitud_producto');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
}