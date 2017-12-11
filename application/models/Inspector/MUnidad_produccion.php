<?php
class mUnidad_produccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getUnidad_produccion($id_operador){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('unidad_produccion');
		$this->emetro_local->where('idoperador',$id_operador);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getUnidadesPorProduccion($idoperador,$idUnidadProduccion){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('unidad_produccion');
		$this->emetro_local->where('idoperador',$idoperador);
		$this->emetro_local->where('idunidad_produccion',$idUnidadProduccion);
		$r = $this->emetro_local->get();
		$result= $r->result();
		return $result;
	}
}