<?php

class mExpediente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getExpedienteM($idoperador){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('expediente_maestro');
		$this->emetro_local->where('idoperador',$idoperador);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function getExpedienteD($idsolicitud){
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('expediente_detalle');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}
	public function EliminarExpDetalle($data){
		$this->emetro_local->where('idexpediente_detalle',$data['idexpediente_detalle']);
		$this->emetro_local->delete('expediente_detalle');
		if ($this->emetro_local->affected_rows()>0) {
			try {
			unlink($data['archivo']);	
			} catch (Exception $e) {
			}
		}else{
			echo "Archivo No B";	
		}
		
	}
	public function upload_file($data) {
        //upload file
        $config['upload_path'] = 'Uploads/operador_expediente_detalle';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = false;
        $config['max_size'] = '4096'; //4 MB
 
        if (isset($_FILES['DOC']['name'])) {
            if (0 < $_FILES['DOC']['error']) {
                $mensaje = '<small style="color:red">Error during file upload' . $_FILES['DOC']['error'].'</small>';
            } else {
                if (file_exists('uploads/operador_expediente_detalle' . $_FILES['DOC']['name'])) {
                    $mensaje= "<small style='color:green'>Archivo Subido Exitosamente :". $_FILES['DOC']['name']."</small>";
                    return $mensaje;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('DOC')) {
                        $mensaje = "<small style='color:red'>".$this->upload->display_errors()."";
                    } else {
						$rty= time();
						$datos = array(
							'idsolicitud' => $data['idsolicitud'],
							'url' => str_replace(" ","_",$_FILES['DOC']['name']),
							'fecha_carga' => time(),
							'nombre_carga' => $_SESSION['MM_Username'],
							'nota' => $data['nota']);
						$this->emetro_local->insert('expediente_detalle',$datos);
                        $mensaje = "<small style='color:green'>Archivo subido Exitosamente: ". $_FILES['DOC']['name']."</small>";
                        return $mensaje;
                    }
                }
            }
        } else {
            $mensaje= '<small style="color:red">Error: Recarga la pagina o seleccona otro archivo';
            return $mensaje;
        }
        return $mensaje;
    }
}