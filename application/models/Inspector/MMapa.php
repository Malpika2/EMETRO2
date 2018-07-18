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
		$data = array(			
			'titulo' => $param['titulo'],
			'descripcion' => $param['descripcion'],
			'cx' => $param['cx'],
			'cy' => $param['cy'],
			'idsolicitud' => $param['idsolicitud'],
			'referencias' => $param['referencias'],		
		);
		$this->db->set('fecharegistro', 'NOW()', FALSE);						
		$this->db->insert('mapa',$data);


		return $this->db->insert_id();
<<<<<<< HEAD
	}

	public function guardar_imagen($param)
	{
		 $arrayCampos = array(
		 	'idpunto' => $param['idpunto'],
		 	'file_name' => $param['file_name'],
		 	'idsolicitud' => $param['idsolicitud'],
		);
		$this->db->set('fecharegistro', 'NOW()', FALSE);
		$this->db->insert('fotos',$arrayCampos); 
	}

	

	public function ver_punto($param)
	{
		$this->db->select('*');
		$this->db->from('mapa');
=======
	}

	public function guardar_imagen($param)
	{
		 $arrayCampos = array(
		 	'idpunto' => $param['idpunto'],
		 	'file_name' => $param['file_name'],
		 	'idsolicitud' => $param['idsolicitud'],
		);
		$this->db->set('fecharegistro', 'NOW()', FALSE);
		$this->db->insert('fotos',$arrayCampos); 
	}

	

	public function ver_punto($param)
	{
		$this->db->select("*");
		$this->db->from("mapa ");
	
>>>>>>> 9408912359bf324098f068ea279f41fe6d763797
		$this->db->where("idsolicitud", $param['solicitud']);			

		$r = $this->db->get();

		return $r->result();
	}

	public function ver_fotos($param)
	{
		$this->db->select('*');
	    $this->db->from('fotos');
	    $this->db->where( 'idpunto', $param['punto']);

	    $query = $this->db->get();
	    $result = $query->result();
	    return $result;
    }

	 public function insert($data = array())
	 {
        $insert = $this->db->insert_batch('fotos',$data);
        return $insert?true:false;
    }

	
}