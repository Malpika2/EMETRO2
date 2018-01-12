<?php

	class r_ins extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('Inspector/mInspeccion_reporte_pregunta');
			$this->load->model('Inspector/mInspeccion_reporte_respuesta');
			$this->load->model('Inspector/mInspeccion_accion_correctiva_previa');
			$this->load->model('Inspector/mFirmas_Inspector');

		}
		public function index(){
			$row_inspeccion_reporte_pregunta = $this->mInspeccion_reporte_pregunta->getinspeccion_reporte_pregunta();
			$idSolicitud = $this->input->post('id');

			foreach ($row_inspeccion_reporte_pregunta as $Ins_preg) {
				$data['row_inspeccion_reporte_respuesta'][$Ins_preg->idinspeccion_reporte_pregunta] = $this->mInspeccion_reporte_respuesta->getinspeccion_reporte_repuesta($idSolicitud,$Ins_preg->idinspeccion_reporte_pregunta);
			}
			$data['row_inspeccion_accion_correctiva_previa'] = $this->mInspeccion_accion_correctiva_previa->getAcc_Cor_Prev($idSolicitud);
			$data['idSolicitud']=$idSolicitud;
			$data['row_inspeccion_reporte_pregunta'] = $row_inspeccion_reporte_pregunta;
			$data['row_firma'] = $this->mFirmas_Inspector->getFirmasR_ins($idSolicitud);

			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/vMenu');
			$this->load->view('Inspector/Inspeccion/vReporte_ins',$data);
			$this->load->view('Inspector/vFooter');
		}
		public function guardar_pregunta2Observacion(){
			$data['idsolicitud'] = $this->input->post('idsolicitud');
			$data['idinspeccion_reporte_pregunta'] = $this->input->post('idinspeccion_reporte_pregunta');
			$data['observacion'] = $this->input->post('observacion');
			$this->mInspeccion_reporte_respuesta->updateObservacion($data);
		}
		public function guardar_pregunta2(){
			if (null!==$this->input->post('idinspeccion_reporte_pregunta')) {

				$data['idsolicitud'] = $this->input->post('idsolicitud');
				$data['idinspeccion_reporte_pregunta'] = $this->input->post('idinspeccion_reporte_pregunta');
				$totalR = $this->mInspeccion_reporte_respuesta->numTotal($data);
				if ($totalR==0) {

				echo "<script>console.log( 'totalR: " . $totalR . "' );</script>";

					$data['idinspeccion_reporte_pregunta'] = $this->input->post('idinspeccion_reporte_pregunta');
					$data['idsolicitud'] = $this->input->post('idsolicitud');
					$data['respuesta'] = $this->input->post('respuesta');
					$data['observacion'] = $this->input->post('observacion');
					$this->mInspeccion_reporte_respuesta->insert_local($data);
				}else{
					echo "<script>console.log( 'totalR: " . $totalR . "' );</script>";
					$data['idinspeccion_reporte_pregunta'] = $this->input->post('idinspeccion_reporte_pregunta');
					$data['idsolicitud'] = $this->input->post('idsolicitud');
					$data['respuesta'] = $this->input->post('respuesta');
					$data['observacion'] = $this->input->post('observacion');

					$this->mInspeccion_reporte_respuesta->update_local($data);
				}
			}
			if (null!==$this->input->post('update_accion_correctiva')) {
				$data['situacion_encontrada'] = $this->input->post('situacion_encontrada');
				$data['idinspeccion_accion_correctiva_previa'] = $this->input->post('idinspeccion_accion_correctiva_previa');
				$this->mInspeccion_accion_correctiva_previa->update_local($data);
				 
			}
		}
	}
?>