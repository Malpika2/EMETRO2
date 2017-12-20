<?php

class mInspeccion_reporte_respuesta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getinspeccion_reporte_repuesta($idsolicitud,$idIns_Preg){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('inspeccion_reporte_respuesta');
		$this->emetro_local->WHERE('idsolicitud',$idsolicitud);
		$this->emetro_local->WHERE('idinspeccion_reporte_pregunta',$idIns_Preg);
		$r = $this->emetro_local->get();
		$result = $r->row_array();
		return $result;
	}
	
	public function getLocal_idSol($idsolicitud){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->from('inspeccion_reporte_respuesta');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function EliminarResp_online($idsolicitud){
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$this->emetro_online->delete('inspeccion_reporte_respuesta');
		return true;
	}
	public function insert_online($row_resp_ins){
		$datos = array(
			'idinspeccion_reporte_pregunta' => $row_resp_ins->idinspeccion_reporte_pregunta,
			'idsolicitud' => $row_resp_ins->idsolicitud,
			'respuesta' => $row_resp_ins->respuesta,
			'observacion' => $row_resp_ins->observacion);
		$this->emetro_online->INSERT('inspeccion_reporte_respuesta',$datos);
		return true;
	}

	public function numTotal($data){
		$this->emetro_local->select('*');
		$this->emetro_local->from('inspeccion_reporte_respuesta');
		$this->emetro_local->where('idsolicitud',$data['idsolicitud']);
		$this->emetro_local->where('idinspeccion_reporte_pregunta',$data['idinspeccion_reporte_pregunta']);
		$r = $this->emetro_local->get();
		$result = $r->num_rows();
		 return $result;
	}
	public function insert_local($data){						
		if (null==$data['observacion']) {
			$data['observacion']='';
		}
		$datos = array(
						'idinspeccion_reporte_pregunta' => $data['idinspeccion_reporte_pregunta'],
						'idsolicitud' => $data['idsolicitud'],
						'respuesta' => $data['respuesta'],
						'observacion' => $data['observacion']
					);
		$this->emetro_local->INSERT('inspeccion_reporte_respuesta',$datos);
	}
	public function update_local($data){
		$datos = array(
			'respuesta' => $data['respuesta'],
			'observacion' => $data['observacion']
		);
		$this->emetro_local->where('idinspeccion_reporte_pregunta',$data['idinspeccion_reporte_pregunta']);
		$this->emetro_local->where('idsolicitud',$data['idsolicitud']);
		$this->emetro_local->update('inspeccion_reporte_respuesta',$datos);

	}
	public function updateObservacion($data){
		$datos = array(
			'observacion' => $data['observacion']);
			$this->emetro_local->where('idinspeccion_reporte_pregunta',$data['idinspeccion_reporte_pregunta']);
			$this->emetro_local->where('idsolicitud',$data['idsolicitud']);

			$this->emetro_local->update('inspeccion_reporte_respuesta',$datos);
	}
}