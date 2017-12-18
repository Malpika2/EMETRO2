<?php

class mSolicitud extends CI_Model
{
	
	public $idoperador ='';
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
		$this->emetro_online = $this->load->database('emetro_online',TRUE);
	}
	public function getSolicitudes(){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('solicitud');
		$this->emetro_local->order_by('fecha','DESC');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getSolicitud_Local_porId($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->from('solicitud');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
	public function getSolicitudes_online(){

		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion');
		$this->emetro_online->where('idinspector',$_SESSION['idinspector']);
		$r = $this->emetro_online->get();
		$r = $r->row();

		$this->emetro_online->select('*');
		$this->emetro_online->from('solicitud');
		$this->emetro_online->where_in('idsolicitud',$r->idsolicitud);
		$rs = $this->emetro_online->get();
		$res =  $rs->result();
		return $res;
	}
	public function Descargar($idsolicitud){
		echo '<div class="container-fluid">
    				<div class="row">
						<div class="col-sm-12  col-md-12 main">
        					<form method="post" action="'.base_url().'inspector">
          						<button type="submit" class="btn btn-success">INICIO</button>
        					</form>
          			<h1 class="page-header">Metrocert Movil</h1>';

		$this->DescargarSolicitud($idsolicitud);
		$this->DescargarInspeccion($idsolicitud);
		$this->DescargarOrdenInspeccion($idsolicitud);
		$this->DescargarOperador($idsolicitud);
		$this->DescargarCategoriaCertificacion($idsolicitud);
		$this->DescargarSolicitudCertificacion($idsolicitud);
		$this->DescargarEstados($idsolicitud);
		$this->DescargarProceso($idsolicitud);
		$this->DescargarTipoInspeccion($idsolicitud);
		$this->AccionCorrectivaPreviaDescarga($idsolicitud);
		$this->DescargarSolicitudProducto($idsolicitud);
		$this->DescargarSolicitudProceso($idsolicitud);
		$this->PoCultivoPregunta($idsolicitud);
		$this->PoCultivoSubPregunta();
		$this->PoCultivo($idsolicitud);
		$this->PoCultivoRespuesta($idsolicitud);
		$this->InspeccionReporteRespuesta($idsolicitud);
		$this->InspeccionReportePregunta($idsolicitud);
		$this->inspeccion_indicacion($idsolicitud);
	}
	public function inspeccion_indicacion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion_indicacion');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('inspeccion_indicacion');
		foreach ($result as $row_inspeccion_indicacion) {
			$datos = array(
				'idinspeccion_indicacion' => $row_inspeccion_indicacion->idinspeccion_indicacion,
				'idsolicitud' => $row_inspeccion_indicacion->idsolicitud,
				'indicacion' => $row_inspeccion_indicacion->indicacion);
			$this->emetro_local->insert('inspeccion_indicacion',$datos);
		}
	}
	public function InspeccionReportePregunta($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion_reporte_pregunta');
		$r = $this->emetro_online->get();
		$result =$r->result();

		$this->emetro_local->empty_table('inspeccion_reporte_pregunta');

		foreach ($result as $row_reporte_pregunta) {
			$datos = array(
					'idinspeccion_reporte_pregunta' => $row_reporte_pregunta->idinspeccion_reporte_pregunta,
					'tipo' => $row_reporte_pregunta->tipo,
					'texto1' => $row_reporte_pregunta->texto1,
					'direccion_formulario' => $row_reporte_pregunta->direccion_formulario);
			$this->emetro_local->insert('inspeccion_reporte_pregunta',$datos);
		}
	}
	public function InspeccionReporteRespuesta($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion_reporte_respuesta');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('inspeccion_reporte_respuesta');
		foreach ($result as $row_inspeccion_resporte_respuesta) {
			$datos = array(
				'idinspeccion_reporte_respuesta' => $row_inspeccion_resporte_respuesta->idinspeccion_reporte_respuesta,
				'idinspeccion_reporte_pregunta' => $row_inspeccion_resporte_respuesta->idinspeccion_reporte_pregunta,
				'idsolicitud' => $row_inspeccion_resporte_respuesta->idsolicitud,
				'respuesta' => $row_inspeccion_resporte_respuesta->respuesta,
				'observacion' => $row_inspeccion_resporte_respuesta->observacion);
			$this->emetro_local->insert('inspeccion_reporte_respuesta',$datos);
		}
	}
	public function PoCultivoRespuesta($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('po_cultivo_respuesta');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('po_cultivo_respuesta');

		foreach ($result as $row_cultivoRespuesta) {
			$datos = array(
				'idpo_cultivo_respuesta' => $row_cultivoRespuesta->idpo_cultivo_respuesta,
				'idpo_cultivo_pregunta' => $row_cultivoRespuesta->idpo_cultivo_pregunta,
				'idsolicitud' => $row_cultivoRespuesta->idsolicitud,
				'respuesta' => $row_cultivoRespuesta->respuesta,
				'comentario' => $row_cultivoRespuesta->comentario,
				'implementacion' => $row_cultivoRespuesta->implementacion,
				'conformidad' => $row_cultivoRespuesta->conformidad);
			$this->emetro_local->insert('po_cultivo_respuesta',$datos);
		}
		echo "<br>po_cultivo_respuesta descargada";	
	}
	public function PoCultivo($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('po_cultivo');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('po_cultivo');

		foreach ($result as $row_cultivo) {
			$datos = array(
				'idpo_cultivo' => $row_cultivo->idpo_cultivo,
				'idsolicitud' => $row_cultivo->idsolicitud,
				'representante_legal' => $row_cultivo->representante_legal,
				'operador' => $row_cultivo->operador,
				'nombre_dictamen' => $row_cultivo->nombre_dictamen,
				'fevha_dictamen' => $row_cultivo->fevha_dictamen,
				'conformidad' => $row_cultivo->conformidad);
			$this->emetro_local->insert('po_cultivo',$datos);
		}
	}
	public function PoCultivoSubPregunta(){
		$this->emetro_online->select('*');
		$this->emetro_online->from('po_cultivo_subpregunta');
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->empty_table('po_cultivo_subpregunta');

		foreach ($result as $row_subpregunta) {

			$datos = array(
				'idpo_cultivo_subpregunta' => $row_subpregunta->idpo_cultivo_subpregunta,
				'idpo_cultivo_pregunta' => $row_subpregunta->idpo_cultivo_pregunta,
				'texto1' => $row_subpregunta->texto1);
			$this->emetro_local->insert('po_cultivo_subpregunta',$datos);
		}
	}
	public function PoCultivoPregunta($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('po_cultivo_pregunta');
		$r = $this->emetro_online->get();
		$result = $r->result();
		$this->emetro_local->empty_table('po_cultivo_pregunta');

		foreach ($result as $row_po_coltivo_pregunta) {
			$datos = array(
				'idpo_cultivo_pregunta' => $row_po_coltivo_pregunta->idpo_cultivo_pregunta,
				'tipo' => $row_po_coltivo_pregunta->tipo,
				'texto1' => $row_po_coltivo_pregunta->texto1,
				'texto2' => $row_po_coltivo_pregunta->texto2,
				'texto3' => $row_po_coltivo_pregunta->texto3,
				'texto4' => $row_po_coltivo_pregunta->texto4);
			$this->emetro_local->insert('po_cultivo_pregunta',$datos);
		}
	}
	public function DescargarSolicitudProceso($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('solicitud_proceso');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('solicitud_proceso');

		foreach ($result as $row_solicitud_proceso) {
			$datos = array(
				'idsolicitud_proceso'=> $row_solicitud_proceso->idsolicitud_proceso,
				'idsolicitud'=> $row_solicitud_proceso->idsolicitud,
				'idproceso'=> $row_solicitud_proceso->idproceso,
				'operador'=> $row_solicitud_proceso->operador,
				'certificado'=> $row_solicitud_proceso->certificado,
				'ubicacion'=> $row_solicitud_proceso->ubicacion);
			$this->emetro_local->insert('solicitud_proceso',$datos);
		}
	}
	public function DescargarSolicitudProducto($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('solicitud_producto');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('solicitud_producto');

		foreach ($result as $row_solicitud_producto) {
			$datos = array(
				'idsolicitud_producto' => $row_solicitud_producto->idsolicitud_producto,
				'idsolicitud' => $row_solicitud_producto->idsolicitud,
				'idunidad_produccion' => $row_solicitud_producto->idunidad_produccion,
				'producto' => $row_solicitud_producto->producto,
				'grupo' => $row_solicitud_producto->grupo,
				'marca_comercial' => $row_solicitud_producto->marca_comercial,
				'superficie' => $row_solicitud_producto->superficie,
				'cantidad' => $row_solicitud_producto->cantidad,
				'produccion_anual' => $row_solicitud_producto->produccion_anual);
			$this->emetro_local->insert('solicitud_producto',$datos);
		}
			echo "<br>solicitud_producto descargada";
	}
	public function AccionCorrectivaPreviaDescarga($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion_accion_correctiva_previa');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('inspeccion_accion_correctiva_previa');

		foreach ($result as $row_accion_previa) {
		$datos = array(
		'idinspeccion_accion_correctiva_previa' => $row_accion_previa->idinspeccion_accion_correctiva_previa,
		'idsolicitud' => $row_accion_previa->idsolicitud,
		'no_conformidad' => $row_accion_previa->no_conformidad,
		'accion_correctiva_previa' => $row_accion_previa->accion_correctiva_previa,
		'origen' => $row_accion_previa->origen,
		'situacion_encontrada' => $row_accion_previa->situacion_encontrada);

		$this->emetro_local->insert('inspeccion_accion_correctiva_previa',$datos);
		}
			echo "<br>Inspeccion accion correctiva previa descargada";
	}
	public function DescargarTipoInspeccion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion_tipo');
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->empty_table('inspeccion_tipo');

		foreach ($result as $row_inspeccion_tipo) {

			$datos = array(
						'idinspeccion_tipo' => $row_inspeccion_tipo->idinspeccion_tipo,
						'inspeccion_tipo' => $row_inspeccion_tipo->inspeccion_tipo);
			$this->emetro_local->insert('inspeccion_tipo',$datos);
		}
		echo "<br>Inspeccion tipo descargado";
	}
	public function DescargarProceso($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('proceso');
		$r = $this->emetro_online->get();
		$result = $r->result();


		$this->emetro_local->empty_table('proceso');

		foreach ($result as $row_Proceso) {
			$datos = array(
				'idproceso' => $row_Proceso->idproceso,
				'proceso' => $row_Proceso->proceso);
			$this->emetro_local->insert('proceso',$datos);
		}
			echo "<br>proceso descargado";
	}
	public function DescargarEstados($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('estados');
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->empty_table('estados');

		foreach ($result as $row_estados) {

			$datos = array(
				'id_estado' => $row_estados->id_estado,
				'estado' => $row_estados->estado);
			$this->emetro_local->insert('estados',$datos);
		}
		echo "<br>Estados descargados";
	}
	public function DescargarSolicitudCertificacion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('solicitud_categoria_certificacion');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('solicitud_categoria_certificacion');

		foreach ($result as $row_inspeccion) {	

			$datos = array(
			'idsolicitud_categoria_certificacion' => $row_inspeccion['idsolicitud_categoria_certificacion'],
			'idsolicitud' => $row_inspeccion['idsolicitud'],
			'idcategoria_certificacion' => $row_inspeccion['idcategoria_certificacion']);

			$this->emetro_local->insert('solicitud_categoria_certificacion',$datos);
		}
		echo "<br>solicitud_categoria_certificacion descargada";
	}
	public function DescargarCategoriaCertificacion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('categoria_certificacion');
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->empty_table('categoria_certificacion');

		foreach ($result as $row_inspeccion) {
			$datos = array(
				'idcategoria_certificacion' => $row_inspeccion->idcategoria_certificacion,
				'categoria_certificacion' => $row_inspeccion->categoria_certificacion);
			$this->emetro_local->insert('categoria_certificacion',$datos);
			}
		echo "<br>Categoria certificacion descargada";
	}
	public function DescargarOperador($idsolicitud){
		$idoperador=$this->idoperador;
		$this->emetro_online->select('*');
		$this->emetro_online->from('operador');
		$this->emetro_online->where('idoperador',$idoperador);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idoperador',$idoperador);
		$this->emetro_local->delete('operador');

		foreach ($result as $row_result) {
			$datos = array(
							'idoperador' => $row_result->idoperador,
							'operador' => $row_result->operador,
							'representante_legal' => $row_result->representante_legal,
							'nombre_huerta' => $row_result->nombre_huerta,
							'codigo_operador' => $row_result->codigo_operador,
							'tipo_persona' => $row_result->tipo_persona,
							'rfc' => $row_result->rfc,
							'curp' => $row_result->curp,
							'calle' => $row_result->calle,
							'numero_interior' => $row_result->numero_interior,
							'numero_exterior' => $row_result->numero_exterior,
							'colonia' => $row_result->colonia,
							'municipio' => $row_result->municipio,
							'localidad' => $row_result->localidad,
							'entidad_federativa' => $row_result->entidad_federativa,
							'pais' => $row_result->pais,
							'codigo_postal' => $row_result->codigo_postal,
							'telefono' => $row_result->telefono,
							'fax' => $row_result->fax,
							'email' => $row_result->email,
							'usuario' => $row_result->usuario,
							'password' => $row_result->password,
							'permiso' => $row_result->permiso,
							'clase' => $row_result->clase,
							'categoria' => $row_result->categoria,
							'producto' => $row_result->producto,
							'web' => $row_result->web,
							'celular' => $row_result->celular);
				$this->emetro_local->insert('operador',$datos);

		}
		echo "<br>Operador descargado";
	}
	public function DescargarOrdenInspeccion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('orden_inspeccion');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('orden_inspeccion');

		foreach ($result as $row_inspeccion) {
			$datos = array(
				'idorden_inspeccion' => $row_inspeccion->idorden_inspeccion,
				'idsolicitud' => $row_inspeccion->idsolicitud,
				'inspeccion_inicio' => $row_inspeccion->inspeccion_inicio,
				'inspeccion_fin' => $row_inspeccion->inspeccion_fin,
				'indicacion_opcional1' => $row_inspeccion->indicacion_opcional1,
				'indicacion_opcional2' => $row_inspeccion->indicacion_opcional2,
				'indicacion_opcional3' => $row_inspeccion->indicacion_opcional3,
				'indicacion_opcional4' => $row_inspeccion->indicacion_opcional4,
				'autorizacion_nombre' => $row_inspeccion->autorizacion_nombre,
				'autorizacion_fecha' => $row_inspeccion->autorizacion_fecha);
		$this->emetro_local->insert('orden_inspeccion',$datos);
		}
		echo "<br>orden de inspeccion descargada";
	}
	public function DescargarInspeccion($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('inspeccion');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('inspeccion');

		foreach ($result as $row_inspeccion) {
			$data  = array(
				'idinspeccion' => $row_inspeccion->idinspeccion,
				'idsolicitud' => $row_inspeccion->idsolicitud,
				'idinspector' => $row_inspeccion->idinspector,
				'inspeccion_tipo' => $row_inspeccion->inspeccion_tipo,
				'firma_fecha' => $row_inspeccion->firma_fecha,
				'pagado_fecha' => $row_inspeccion->pagado_fecha);
			$this->emetro_local->insert('inspeccion',$data);
		}
			echo "<br>Inspeccion descargada";
	}
	public function DescargarSolicitud($idsolicitud){
		$this->emetro_online->select('*');
		$this->emetro_online->from('solicitud');
		$this->emetro_online->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_online->get();
		$result = $r->row();
		$this->idoperador=$result->idoperador;
		$result = $r->result();

		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$this->emetro_local->delete('solicitud');

		$result = $r->row();
		$data = array(
			'idsolicitud' => $result->idsolicitud,
			'idoperador' => $result->idoperador,
			'fecha' => $result->fecha,
			'solicitud_tipo' => $result->solicitud_tipo,
			'calle' => $result->calle,
			'numero_interior' => $result->numero_interior,
			'numero_exterior' => $result->numero_exterior,
			'colonia' => $result->colonia,
			'municipio' => $result->municipio,
			'localidad' => $result->localidad,
			'entidad_federativa' => $result->entidad_federativa,
			'codigo_postal' => $result->codigo_postal,
			'telefono' => $result->telefono,
			'fax' => $result->fax,
			'email' => $result->email,
			'rc_nombre' => $result->rc_nombre,
			'rc_telefono' => $result->rc_telefono,
			'rc_email' => $result->rc_email,
			'certificadora_anterior' => $result->certificadora_anterior,
			'vigencia_certificado' => $result->vigencia_certificado,
			'razon_cambio' => $result->razon_cambio,
			'no_conformidades' => $result->no_conformidades,
			'anexo1' => $result->anexo1,
			'anexo2' => $result->anexo2,
			'anexo3' => $result->anexo3,
			'anexo4' => $result->anexo4,
			'anexo5' => $result->anexo5,
			'anexo6' => $result->anexo6,
			'revision_fecha' => $result->revision_fecha,
			'revision_nombre' => $result->revision_nombre,
			'firma_fecha' => $result->firma_fecha,
			'firma_nombre' => $result->firma_nombre,
			'pagado_fecha' => $result->pagado_fecha,
			'pagado_nombre' => $result->pagado_nombre,
			'po_dictamen_nombre' => $result->po_dictamen_nombre,
			'po_dictamen_fecha' => $result->po_dictamen_fecha,
			'po_dictamen_conformidad' => $result->po_dictamen_conformidad,
			'po_firma_nombre' => $result->po_firma_nombre,
			'po_firma_fecha' => $result->po_firma_fecha,
			'ri_predictamen_nombre' => $result->ri_predictamen_nombre,
			'ri_predictamen_fecha' => $result->ri_predictamen_fecha,
			'ri_predictamen' => $result->ri_predictamen);

			$this->emetro_local->insert('solicitud',$data);
			echo "solicitud descargada";
	}
	public function getSolicitud_categoria_certificacion(){
		$this->emetro_local->select('*');
		$this->emetro_local->from('solicitud_categoria_certificacion');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getnombre_categoria($idcategoria_certificacion){
		$this->emetro_local->select('*');
		$this->emetro_local->from('categoria_certificacion');
		$this->emetro_local->where('idcategoria_certificacion',$idcategoria_certificacion);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
	public function getSolicitudesPagado(){
		$this->db->SELECT('*');
		$this->db->from('solicitud');
		$this->db->where('pagado_fecha!=',null);
		$this->db->join('operador', 'operador.idoperador = solicitud.idoperador');
		$this->db->order_by('fecha','DESC');
		$r = $this->db->get();
		$result = $r->result();
		return $result;
	}
}