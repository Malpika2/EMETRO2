<?php 
class mFirmas_Inspector extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
		$this->emetro_online = $this->load->database('emetro_online',TRUE);
	}
	public function firmar_Inspeccion($data){
		$datos = array(
			'id_operador'=> $_SESSION['idinspector'],
			'nombre_firma' => $_SESSION['MM_Username'],
			'fecha_firma' => time(),
			'id_orden' => $data['idsolicitud'],
			'url_firma' => $data['filename']
		);
		$this->emetro_local->insert('firmas_inspector',$datos);
	}
	public function getFirmasOrdenInspeccion($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->from('firmas_inspector');
		$this->emetro_local->where('id_orden',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;

	}
	public function getFirmasPmo($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->from('firmas_inspector');
		$this->emetro_local->where('id_pmo',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
	public function firmar_Pmo($data){
		$datos = array(
			'id_operador' => $_SESSION['idinspector'],
			'nombre_firma' => $_SESSION['MM_Username'],
			'fecha_firma' => time(),
			'id_pmo' => $data['idsolicitud'],
			'url_firma' => $data['filename']
		);
		$this->emetro_local->insert('firmas_inspector',$datos);
	}
	public function getFirmasR_ins($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->from('firmas_inspector');
		$this->emetro_local->where('id_ins',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
	public function firmar_Rins($data){
		$datos = array(
			'id_operador' => $_SESSION['idinspector'],
			'nombre_firma' => $_SESSION['MM_Username'],
			'fecha_firma' => time(),
			'id_ins' => $data['idsolicitud'],
			'url_firma' => $data['filename']
		);
		$this->emetro_local->insert('firmas_inspector',$datos);
	}
	public function getFirmasLocal(){
		$this->emetro_local->select('*');
		$this->emetro_local->from('firmas_inspector');
		$r = $this->emetro_local->get();
		$res = $r->result();
		return $res;
	}
	public function dropTable(){
		$this->emetro_online->truncate('firmas_inspector');	
	}
	public function insert_online($firma){
		$datos = array(
			'id_firmas' => $firma['id_firmas'],
			'id_operador' => $firma['id_operador'],
			'nombre_firma' => $firma['nombre_firma'],
			'fecha_firma' => $firma['fecha_firma'],
			'id_orden' => $firma['id_orden'],
			'id_pmo' => $firma['id_pmo'],
			'id_ins' => $firma['id_ins'],
			'url_firma' => $firma['url_firma']
		);
		$this->emetro_online->insert('firmas_inspector',$datos);
	}
}