<?php 

class pmo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mPo_cultivo_pregunta');
		$this->load->model('Inspector/mPo_cultivo_respuesta');
		$this->load->model('Inspector/mPo_cultivo_subpregunta');
	}
	public function index(){
		$idsolicitud = $this->input->post('id');
		$row_po_cultivo_pregunta = $this->mPo_cultivo_pregunta->getPo_cultivo_pregunta();
		foreach ($row_po_cultivo_pregunta as $po_cultivo_pregunta) {
			$data['row_resp'][$po_cultivo_pregunta->idpo_cultivo_pregunta]= $this->mPo_cultivo_respuesta->getRespuesta($idsolicitud,$po_cultivo_pregunta->idpo_cultivo_pregunta);
			$data['row_po_cultivo_subpregunta'][$po_cultivo_pregunta->idpo_cultivo_pregunta] = $this->mPo_cultivo_subpregunta->getPo_cultivo_subpregunta($po_cultivo_pregunta->idpo_cultivo_pregunta);
		}

		$data['row_po_cultivo_pregunta'] = $row_po_cultivo_pregunta;
		$data['idsolicitud']= $idsolicitud;



		$this->load->view('Inspector/vHeader');
		$this->load->view('Inspector/vMenu');
		$this->load->view('Inspector/Inspeccion/vPmo',$data);
		$this->load->view('Inspector/vFooter');
	}
}