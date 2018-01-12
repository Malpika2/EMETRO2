<?php
/**
* 
*/
class mMapa extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function grabar_punto($param)
	{
		$campos = array(
			'titulo' => $param['titulo'],
			'descripcion' => $param['descripcion'],
			'cx' => $param['cx'],
			'cy' => $param['cy'],
		
		);
		
		$this->db->insert('mapa',$campos);		
		return 1;
	}

	public function ver_punto()
	{
		$this->db->select("*");
		$this->db->from("mapa");

		$r = $this->db->get();

		return $r->result();
	}

	public function ver_marcador()
	{
		$this->db->select("*");
		$this->db->from("mapa");

		$r = $this->db->get();

		return $r->result();
	}
}