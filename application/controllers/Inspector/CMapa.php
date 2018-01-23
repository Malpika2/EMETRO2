<?php
/**
* 
*/
class cMapa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mMapa');
	
	}
	
	public function index()
	{
		
		$data['solicitud'] = $this->input->post('idsolicitud');
		$data['punto'] = $this->input->post('modal-idpunto');
		$data['row_puntos'] = $this->mMapa->ver_punto($data);
		$data['row_fotos'] = $this->mMapa->ver_fotos($data);
		$this->load->view('Inspector/vHeader');
		$this->load->view('Inspector/vMenu');
		$this->load->view('Inspector/Inspeccion/vMapa', $data);
		$this->load->view('Inspector/vFooter');
	}
	public function grabar_punto()
	{	
		
                   
        $param['idsolicitud'] = $this->input->post('idsolicitud');
		$param['titulo'] = $this->input->post('titulo');
		$param['descripcion'] = $this->input->post('descripcion');
		$param['cx'] = $this->input->post('cx');
		$param['cy'] = $this->input->post('cy');
		$param['referencias'] = $this->input->post('referencias');
        $lastId = $this->mMapa->grabar_punto($param);
	
	 	
	 	if($lastId > 0)
	 	{
	 		$uploadData['idpunto'] = $lastId;
	 		$data = array();
			$filesCount = count($_FILES['file_name']['name']);
            for($i = 0; $i < $filesCount; $i++){
				$_FILES['file_name']['name'] = $_FILES['file_name']['name'][$i];
				$_FILES['file_name']['type'] = $_FILES['file_name']['type'][$i];
				$_FILES['file_name']['size'] = $_FILES['file_name']['size'][$i];

				$uploadPath = 'fotos/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'gif|jpg|png';

               $this->load->library('upload', $config);
                if($this->upload->do_upload('file_name'))
                {

                    $fileData = $this->upload->data();

                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['fecharegistro'] = date("Y-m-d");                                 
                    $uploadData[$i]['idsolicitud'] = $this->input->post('idsolicitud');
                }
            }
    
                //se inserta la informacion de los archivos en la base de datos
                $insert = $this->mMapa->insert($uploadData);
                $this->index();
           
			}
}







	public function guardar_fotos()
	{
		$data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'fotos/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('userFile'))
                {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['fecharegistro'] = date("Y-m-d");
                    $uploadData[$i]['idpunto'] = $this->input->post('idpunto');
                    $uploadData[$i]['idsolicitud'] = $this->input->post('idsolicitud');
                }
            }
            
            if(!empty($uploadData)){
                //se inserta la informacion de los archivos en la base de datos
                $insert = $this->mMapa->insert($uploadData);
                $this->index();
            }
            else {
            echo "ocurrio un error favor de selecionar los archivos que se tiene que subir";
            $this->index();
            }
        }
   
    }

	}



	

