<?php 
class expediente extends CI_Controller
{
	private $mensajeUpload="";
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mExpediente');
		$this->load->model('Inspector/mSolicitud');
	}
	public function index(){
		if ($this->input->post('eliminar_expediente_detalle')) {
			$data = $_POST;
			$this->mExpediente->EliminarExpDetalle($data);
			$this->cargarIndex();
		}
		elseif ($this->input->post('section_post')=='subir_archivo') {
			$data = $_POST;
			
			$this->mensajeUpload= $this->mExpediente->upload_file($data);
			$this->cargarIndex();
		}
		else{
			$row_solicitud = $this->mSolicitud->getSolicitud_Local_porId($this->input->post('idsolicitud'));
			$row_expedienteM = $this->mExpediente->getExpedienteM($row_solicitud->idoperador);
			$row_expedienteD = $this->mExpediente->getExpedienteD($row_solicitud->idsolicitud);
			$totalRows_expediente=0;
			echo "<script>console.log(".$row_solicitud->idoperador.");</script></br>";
			echo "<script>console.log(".$totalRows_expediente.");</script></br>";
			foreach ($row_expedienteD as $exp) {
				$totalRows_expediente++;
			}
			$this->cargarIndex();		
		}
	}
	public function cargarIndex(){
			$row_solicitud = $this->mSolicitud->getSolicitud_Local_porId($this->input->post('idsolicitud'));
			$row_expedienteM = $this->mExpediente->getExpedienteM($row_solicitud->idoperador);
			$row_expedienteD = $this->mExpediente->getExpedienteD($row_solicitud->idsolicitud);
			$totalRows_expediente=0;
			echo "<script>console.log(".$row_solicitud->idoperador.");</script></br>";
			echo "<script>console.log(".$totalRows_expediente.");</script></br>";
			foreach ($row_expedienteD as $exp) {
				$totalRows_expediente++;
			}
			$data['mensajeUpload'] = $this->mensajeUpload;
			$data['totalRows_expediente'] = $totalRows_expediente;
			$data['row_solicitud'] = $row_solicitud;
			$data['row_expedienteM'] = $row_expedienteM;
			$data['row_expedienteD'] = $row_expedienteD;
			$this->load->view('Inspector/vHeader');
			$this->load->view('Inspector/vMenu');
			$this->load->view('Inspector/Inspeccion/vExpediente',$data);
			$this->load->view('Inspector/vFooter');	
	}
}
