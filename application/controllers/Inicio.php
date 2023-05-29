<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	public function index()
	{
		$this->loadView('Inicio', $data = null);
	}

	public function cerrarsesion()
	{
		session_destroy();
		$this->loadView('includes/login', $data = null);
	}

	public function login()
	{

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$loginData = $this->Site_model->loginUser($_POST);

			//Procesamiento del dato foto
			if (isset($loginData[0]->foto)) {
				$toBase64 = base64_encode($loginData[0]->foto);
				$foto_url = 'data:image/png;base64,' . $toBase64;
			} else {
				echo 'No hay imagen guardada';
				$foto_url = NULL;
			}

			//Guarda los datos del usuario extraidos de la base de datos
			$array = array(
				'id' => $loginData[0]->id,
				'nombre' => $loginData[0]->nombre,
				'apellidos' => $loginData[0]->apellidos,
				'fechaNacimiento' => $loginData[0]->fecha_nacimiento,
				'correo' => $loginData[0]->correo,
				'numeroTelefono' => $loginData[0]->numero_telefono,
				'cargo' => $loginData[0]->id_cargo,
				'sexo' => $loginData[0]->id_sexo,
				'foto' => $foto_url,
			);

			// Guardar cargo
			if ($array['cargo'] == 1) {
				$array['cargo'] = 'Administrador';
			} elseif ($array['cargo'] == 2) {
				$array['cargo'] = 'Empleado';
			}

			// Guardar sexo
			if ($array['sexo'] == 1) {
				$array['sexo'] = 'Hombre';
			} elseif ($array['sexo'] == 2) {
				$array['sexo'] = 'Mujer';
			}

			// Guardar sesión
			$this->session->set_userdata($array);
			//print_r($_SESSION);
		}

		$this->loadView('includes/login', $data = null);
	}

	public function perfil()
	{
		//print_r($_SESSION);
		$this->loadView('includes/perfil', $data = null);
	}

	public function empleados()
	{
		// Guarda los datos de la tabla empleado de la base de datos
		$data['empleados'] = $this->Site_model->getEmpleados();

		// carga la vista con los datos $data['empleados']
		$this->loadView('includes/listaEmpleados', $data);
	}

	public function nuevoempleado()
	{
		//$data['empleado'];
		$this->loadView('includes/formEmpleado', $data = NULL);

		if (
			isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['fecha_nacimiento']) &&
			isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['sexo']) &&
			isset($_POST['cargo']) && isset($_FILES['foto']) && isset($_POST['contrasena'])
		) {
			// Va al model y realiza el insert en la base de datos
			$this->Site_model->insertEmpleado($_POST, $_FILES);

			//rederidije a la lista de empleados
			redirect(base_url() . "Inicio/empleados");
		}
	}

	public function eliminarEmpleado($id)
	{
		if ($id) {

			$this->Site_model->deleteEmpleado($id);

			// Redirigir a la lista de empleados después de eliminar
			redirect('Inicio/empleados');
		} else {
			echo "Error: ID del empleado no válido.";
		}
	}

	public function editarEmpleado($id)
	{
		// Obtiene el empleado con el id
		$empleado = $this->Site_model->getEmpleado($id);

		// Mostrar el formulario de edición con los datos del empleado
		$data['empleado'] = $empleado;
		$this->loadView('includes/formEmpleado', $data);
	}

	public function guardarEmpleado($idEmpleado)
	{

		// Obtener los datos enviados desde el formulario
		$array = array(
			'nombre' => $_POST['nombre'],
			'apellidos' => $_POST['apellidos'],
			'correo' => $_POST['correo'],
			'numero_telefono' => $_POST['telefono'],
			'id_cargo' => intval($_POST['cargo']),
			//'foto' => $_FILES['foto']
		);


		$this->Site_model->updateEmpleado($idEmpleado, $array);
		redirect(base_url("Inicio/empleados"));
	}

	function loadView($view, $data)
	{

		if ($_SESSION['correo']) {

			if ($view == 'includes/login') {
				redirect(base_url() . "Inicio/perfil");
			} elseif ($view == 'includes/perfil') {
				$this->load->view('utils/navbar');
				$this->load->view('includes/perfil');
			} elseif ($view == 'includes/listaEmpleados' && $_SESSION['cargo'] == 'Administrador') {
				$this->load->view('utils/navbar');
				$this->load->view('includes/listaEmpleados', $data);
			} elseif ($view == 'includes/formEmpleado' && $_SESSION['cargo'] == 'Administrador') {
				$this->load->view('utils/navbar');
				$this->load->view('includes/formEmpleado', $data);
			}
		} else {
			if ($view == 'includes/login') {
				$this->load->view($view);
			} else {
				redirect(base_url() . "Inicio/login", "location");
			}
		}
	}
}
