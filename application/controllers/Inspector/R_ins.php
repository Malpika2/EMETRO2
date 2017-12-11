<?php

	class r_ins extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('Inspector/mInspeccion_reporte_pregunta');
			$this->load->model('Inspector/mInspeccion_reporte_respuesta');
			$this->load->model('Inspector/mInspeccion_accion_correctiva_previa');
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
			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/Inspeccion/vReporte_ins',$data);
			$this->load->view('Inspector/vFooter');
		}
	}
?>