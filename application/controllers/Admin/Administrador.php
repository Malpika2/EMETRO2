<?php

class administrador extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Inspector/mLogin');
	}
	public function index(){
		if (isset($_SESSION['s_session'])){
			if ($_SESSION['s_session']=='Active') {
				header('Location: '.base_url('Administrador/Solicitud'));
			}else{
				$usuario = $this->input->post('usuario');
				$password = $this->input->post('password');
				if ($usuario!=null) {
					$this->login($usuario,$password);
				}
			}
		} else{
				$usuario = $this->input->post('usuario');
				$password = $this->input->post('password');
				if ($usuario!=null) {
					$this->login($usuario,$password);
				}
				else{
				$this->load->view('Administrador/vLogin');	}
		}
	}
	public function login($usuario,$password){
		if ($this->mLogin->loginAdmin($usuario,$password)==1) {
				header('Location: '.base_url('Administrador/Solicitud'));
		}
		else{
			$data['Mensaje']='Usuariono/Contraseña Incorrecta';
			$this->load->view('Administrador/vLogin',$data);
		}
	}
}