<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('Auth_model');
	$this->load->model('Hotel_model');
	$this->load->model('Pais_model');
	$this->load->model('Ciudad_model');
	$this->load->model('Facilidades_model');
	$this->load->model('Tarifas_model');
	$this->load->model('Imagen_model');
	$this->load->model('Usuarios_model');
	$this->load->model('Tipos_model');
	
}


public function getAll(){
	$this->data["token"]=$_COOKIE['token'];
	$this->data["nivel"]=$_COOKIE['nivel'];
	$this->data["username"]=$_COOKIE['username'];
}


public function index(){
	$this->load->view('login_admin/login');
}


public function authentication(){
	$this->data['username']=$_REQUEST['username'];
	$this->data['password']=$_REQUEST['password'];
	$result=$this->Auth_model->login($this->data);
	if($result->status){
		$nivel=$result->nivel;
		$token=$result->token;
		$id_user=$result->id;
		$username=$result->username;
		$id_hotel=$result->id_hotel;
		$this->data['username']=$username;
		$this->data['nivel']=$nivel;
		$this->data["token"]=$token;
		setcookie("nivel",$nivel);
		setcookie("username",$username);
		setcookie("token",$token);

		$this->data['paises']=$this->Pais_model->getAll($token);
		$this->data['facilidades_hotel']=$this->Facilidades_model->hotelGetAll($token);
		$this->data['facilidades_habitacion']=$this->Facilidades_model->habitacionesGetAll($token);

		if($nivel==0){
			$this->data['tipos']=$this->Tipos_model->getAll($token);
			$this->load->view('main/main',$this->data);
		}

		if($nivel==1){
			
			//*** Datos Hotel***
			$rs=$this->Hotel_model->getById($id_hotel, $token);
			$this->data['rs']=$rs;
			$this->data['ciudades']=$this->Ciudad_model->getByCountry($rs->id_pais, $token);
			
			//*** Facilidades de Hotel ***
			$this->data['rs_facilidades_hot']=$this->Facilidades_model->getHotel($id_hotel, $token);
			$this->data['rs_facilidades_hab']=$this->Facilidades_model->getHabitaciones($id_hotel, $token);

			//*** Tarifas Hotel

			$dinamicas=$this->Tarifas_model->getDinamicaByHotel($id_hotel, $token);
			$manuales=$this->Tarifas_model->getManualByHotel($id_hotel, $token);

			$sw_dinamicas=0;
			$sw_manuales=0;

			if($dinamicas){ $sw_dinamicas=1; }

			if($manuales){ $sw_manuales=1; }

			$this->data['sw_dinamicas']=$sw_dinamicas;
			$this->data['sw_manuales']=$sw_manuales;

			$this->data['tarifas_dinamica']=$dinamicas;
			$this->data['tarifas_manual']=$manuales;
			$this->data['id_hotel']=$id_hotel;
			$this->data['imagenes']=$this->Imagen_model->getById($id_hotel, $token);
			$this->load->view('main/client',$this->data);
		}

	}else{
		$this->load->view('error/login');
	}
}



public function cerrarSesion(){
	session_start();
	session_destroy();
	redirect(base_url()."index.php");
}



//*******  Hotel  **********

public function saveHotel(){
	$this->data['nombre']=$_REQUEST['nombre'];
	$this->data['categoria']=$_REQUEST['categoria'];
	$this->data['id_pais']=$_REQUEST['pais'];
	$this->data['id_ciudad']=$_REQUEST['ciudad'];
	$this->data['emailreservas']=$_REQUEST['email_reservas'];
	$this->data['emailpublico']=$_REQUEST['email_publico'];
	$this->data['codigopostal']=$_REQUEST['codigo_postal'];
	$this->data['telefono']=$_REQUEST['telefono'];
	$this->data['hentrada']=$_REQUEST['hora_entrada'];
	$this->data['hsalida']=$_REQUEST['hora_salida'];
	$this->data['habitacion']=$_REQUEST['habitaciones'];
	$this->data['restaurante']=$_REQUEST['restaurantes'];
	$this->data['descripcion_hotel']=$_REQUEST['descripcion'];
	$this->data['direccion']=$_REQUEST['direccion'];
	$this->data['latitud']=$_REQUEST['latitud'];
	$this->data['longitud']=$_REQUEST['longitud'];
	

	$facilidadesHot=json_decode($_REQUEST['facilidadesHot']);
	$facilidadesHab=json_decode($_REQUEST['facilidadesHab']);
	$token=$_COOKIE['token'];
	$id_hotel=$this->Hotel_model->saveOne($this->data, $token);
	foreach($facilidadesHot as $hot){
   		$this->facilidad['id_hotel']=$id_hotel;
		$this->facilidad['id_facilidad']=$hot;
		$this->Facilidades_model->saveOneFacilidadHotel($this->facilidad, $token);
    }

    foreach($facilidadesHab as $hab){
   		$this->facilidad['id_hotel']=$id_hotel;
		$this->facilidad['id_facilidad']=$hab;
		$this->Facilidades_model->saveOneFacilidadHabitacion($this->facilidad, $token);
    }

    $username=$_COOKIE['username'];
    $tarifasTMPDinamica=$this->Tarifas_model->getAllTMPDinamica($username, $token);
    if($tarifasTMPDinamica!=null){
    	foreach($tarifasTMPDinamica as $rowTarifaDinamica){
    		$this->tarifaD["id_hotel"]=$id_hotel;
    		$this->tarifaD["tipo"]=$rowTarifaDinamica->tipo;
    		$this->tarifaD["fecha_inicio"]=$rowTarifaDinamica->fecha_inicio;
    		$this->tarifaD["fecha_fin"]=$rowTarifaDinamica->fecha_fin;
    		$this->tarifaD["monto"]=$rowTarifaDinamica->monto;
    		$this->Tarifas_model->saveDinamica($this->tarifaD, $token);
    	}
    	$this->Tarifas_model->delAllTMPDinamica($username, $token);
    }

    $tarifasTMPManual=$this->Tarifas_model->getAllTMPManual($username, $token);
    if($tarifasTMPManual!=null){
    	foreach($tarifasTMPManual as $rowTarifaManual){
    		$this->tarifaM["id_hotel"]=$id_hotel;
    		$this->tarifaM["tipo"]=$rowTarifaManual->tipo;
    		$this->tarifaM["descripcion"]=$rowTarifaManual->descripcion;
    		$this->tarifaM["monto"]=$rowTarifaManual->monto;
    		$this->Tarifas_model->saveManual($this->tarifaM, $token);
    	}
    	$this->Tarifas_model->delAllTMPManual($username, $token);
    }

}

public function list_hotel(){
	$token=$_COOKIE['token'];
	$this->data['rs']=$this->Hotel_model->getAllAdmin($token);
	$this->getAll();
	$this->load->view('hotel/list',$this->data);
}

public function new_hotel(){
	$this->getAll();
	$token=$_COOKIE['token'];
	$username=$_COOKIE['username'];
	$this->data['paises']=$this->Pais_model->getAll($token);
	$this->data['facilidades_hotel']=$this->Facilidades_model->hotelGetAll($token);
	$this->data['facilidades_habitacion']=$this->Facilidades_model->habitacionesGetAll($token);
	$this->data['tarifas_dinamica']=$this->Tarifas_model->getAllTMPDinamica($username, $token);
	$this->data['tarifas_manual']=$this->Tarifas_model->getAllTMPManual($username, $token);
	$this->load->view('hotel/new',$this->data);
}


public function edit_hotel(){
	$this->getAll();
	$token=$_COOKIE['token'];
	$id_hotel=$_REQUEST['id'];
	
	//*** Datos Hotel***
	$this->data['paises']=$this->Pais_model->getAll($token);
	$this->data['facilidades_hotel']=$this->Facilidades_model->hotelGetAll($token);
	$this->data['facilidades_habitacion']=$this->Facilidades_model->habitacionesGetAll($token);
	$rs=$this->Hotel_model->getById($id_hotel, $token);
	$this->data['rs']=$rs;
	$this->data['ciudades']=$this->Ciudad_model->getByCountry($rs->id_pais, $token);
	
	//*** Facilidades de Hotel ***
	$this->data['rs_facilidades_hot']=$this->Facilidades_model->getHotel($id_hotel, $token);
	$this->data['rs_facilidades_hab']=$this->Facilidades_model->getHabitaciones($id_hotel, $token);

	//*** Tarifas Hotel

	$dinamicas=$this->Tarifas_model->getDinamicaByHotel($id_hotel, $token);
	$manuales=$this->Tarifas_model->getManualByHotel($id_hotel, $token);

	$sw_dinamicas=0;
	$sw_manuales=0;

	if($dinamicas){ $sw_dinamicas=1; }

	if($manuales){ $sw_manuales=1; }

	$this->data['sw_dinamicas']=$sw_dinamicas;
	$this->data['sw_manuales']=$sw_manuales;

	$this->data['tarifas_dinamica']=$dinamicas;
	$this->data['tarifas_manual']=$manuales;
	$this->data['imagenes']=$this->Imagen_model->getById($id_hotel, $token);
	$this->data['id_hotel']=$id_hotel;

	$this->load->view('hotel/edit',$this->data);
}


public function loadCity(){
	$id_pais=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	$this->data['ciudades']=$this->Ciudad_model->getByCountry($id_pais, $token);
	$this->load->view('hotel/ciudad',$this->data);
}

public function getHotelById(){
	$id_hotel=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	echo json_encode($this->Hotel_model->getById($id_hotel, $token));
}

public function getFacilidadesHot(){
	$id_hotel=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	echo json_encode($this->Facilidades_model->getHotel($id_hotel, $token));
}

public function getFacilidadesHab(){
	$id_hotel=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	echo json_encode($this->Facilidades_model->getHabitaciones($id_hotel, $token));
}

public function getHotelByIdNOAUTH(){
	$id_hotel=$_REQUEST['id'];
	echo json_encode($this->Hotel_model->getHotelByIdNOAUTH($id_hotel));
}

public function getFacilidadesHotNOAUTH(){
	$id_hotel=$_REQUEST['id'];
	echo json_encode($this->Facilidades_model->getHotel($id_hotel));
}

public function getFacilidadesHabNOAUTH(){
	$id_hotel=$_REQUEST['id'];
	echo json_encode($this->Facilidades_model->getHabitaciones($id_hotel));
}

public function deleteHotel(){
	$id_hotel=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	$this->Hotel_model->delete($id_hotel, $token);
}

//***************

//***Tarifa Dinamica***

public function addTarifaDinamica(){
	$username=$_COOKIE['username'];
	$this->data['id_usuario']=$username;
	$this->data['tipo']=$_REQUEST['tipo_tarifa'];
	$this->data['tipo_habitacion']=$_REQUEST['tipo_habitacion'];
	$this->data['fecha_inicio']=$_REQUEST['fecha_inicio'];
	$this->data['fecha_fin']=$_REQUEST['fecha_fin'];
	$this->data['monto']=$_REQUEST['monto'];
	$token=$_COOKIE['token'];
	$this->Tarifas_model->saveTMPDinamica($this->data, $token);
	$this->data['tarifas_dinamica']=$this->Tarifas_model->getAllTMPDinamica($username, $token);
	$this->load->view('hotel/item_tarifa_dinamica',$this->data);
}

public function delItemTarifaDinamica(){
	$id=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	$username=$_COOKIE['username'];
	$this->Tarifas_model->delTMPDinamica($id, $token);
	$this->data['tarifas_dinamica']=$this->Tarifas_model->getAllTMPDinamica($username, $token);
	$this->load->view('hotel/item_tarifa_dinamica',$this->data);
}

public function addTarifaDinamica_edit(){
	$id_hotel=$_REQUEST['id_hotel'];
	$this->data['id_hotel']=$_REQUEST['id_hotel'];
	$this->data['tipo']=$_REQUEST['tipo_tarifa'];
	$this->data['tipo_habitacion']=$_REQUEST['tipo_habitacion'];
	$this->data['fecha_inicio']=$_REQUEST['fecha_inicio'];
	$this->data['fecha_fin']=$_REQUEST['fecha_fin'];
	$this->data['monto']=$_REQUEST['monto'];
	$token=$_COOKIE['token'];
	$this->Tarifas_model->saveDinamica($this->data, $token);
	$this->data['tarifas_dinamica']=$this->Tarifas_model->getDinamicaByHotel($id_hotel, $token);
	$this->load->view('hotel/item_tarifa_dinamica_edit',$this->data);
}

public function delItemTarifaDinamica_edit(){
	$id=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	$id_hotel=$_REQUEST['id_hotel'];
	$this->Tarifas_model->delDinamica($id, $token);
	$this->data['tarifas_dinamica']=$this->Tarifas_model->getDinamicaByHotel($id_hotel, $token);
	$this->load->view('hotel/item_tarifa_dinamica',$this->data);
}
//*********************


//***Tarifa Manual***

public function addTarifaManual(){
	$username=$_COOKIE['username'];
	$this->data['id_usuario']=$username;
	$this->data['tipo']=$_REQUEST['tipo_tarifa'];
	$this->data['tipo_habitacion']=$_REQUEST['tipo_habitacion'];
	$this->data['descripcion']=$_REQUEST['descripcion'];
	$this->data['monto']=$_REQUEST['monto'];
	$token=$_COOKIE['token'];
	$this->Tarifas_model->saveTMPManual($this->data, $token);
	$this->data['tarifas_manual']=$this->Tarifas_model->getAllTMPManual($username, $token);
	$this->load->view('hotel/item_tarifa_manual',$this->data);
}

public function delItemTarifaManual(){
	$id=$_REQUEST['id'];
	$token=$_COOKIE['token'];
	$username=$_COOKIE['username'];
	$this->Tarifas_model->delTMPManual($id, $token);
	$this->data['tarifas_manual']=$this->Tarifas_model->getAllTMPManual($username, $token);
	$this->load->view('hotel/item_tarifa_manual',$this->data);
}

public function addTarifaManual_edit(){
	$id_hotel=$_REQUEST['id_hotel'];
	$this->data['id_hotel']=$_REQUEST['id_hotel'];
	$this->data['descripcion']=$_REQUEST['descripcion'];
	$this->data['tipo']=$_REQUEST['tipo_tarifa'];
	$this->data['tipo_habitacion']=$_REQUEST['tipo_habitacion'];
	$this->data['monto']=$_REQUEST['monto'];
	$token=$_COOKIE['token'];
	$this->Tarifas_model->saveManual($this->data, $token);
	$this->data['tarifas_manual']=$this->Tarifas_model->getManualByHotel($id_hotel, $token);
	$this->load->view('hotel/item_tarifa_manual_edit',$this->data);
}

public function delItemTarifaManual_edit(){
	$id=$_REQUEST['id'];
	$id_hotel=$_REQUEST['id_hotel'];
	$token=$_COOKIE['token'];
	$this->Tarifas_model->delManual($id, $token);
	$this->data['tarifas_manual']=$this->Tarifas_model->getManualByHotel($id_hotel, $token);
	$this->load->view('hotel/item_tarifa_manual',$this->data);
}





//*********************
	//*** Usuarios ***

	public function usuarios(){
		$token=$_COOKIE['token'];
		$this->getAll();
		$this->data['rs']=$this->Usuarios_model->getAll($token);
		$this->data['hoteles']=$this->Hotel_model->getAll($token);
		$this->load->view('usuarios/list',$this->data);
	}

	public function getUsuarioById(){
		$id=$_REQUEST['id'];
		$token=$_COOKIE['token'];
		echo json_encode($this->Usuario_model->getById($id, $token));
	}

	public function saveUser(){
		$this->datos['id_hotel']=$_REQUEST['id_hotel'];
		$this->datos['username']=$_REQUEST['login'];
		$this->datos['email']=$_REQUEST['email'];
		$this->datos['password']=sha1($_REQUEST['password']);
		$this->datos['nivel']=$_REQUEST['nivel'];
		$token=$_COOKIE['token'];
		$this->Usuarios_model->save($this->datos, $token);
		$this->data['rs']=$this->Usuarios_model->getAll($token);
		$this->load->view('usuarios/item',$this->data);
	}

	public function saveUserAdmin(){
		$this->datos['username']=$_REQUEST['login'];
		$this->datos['email']=$_REQUEST['email'];
		$this->datos['password']=sha1($_REQUEST['password']);
		$this->datos['nivel']=0;
		$token=$_COOKIE['token'];
		$this->Usuarios_model->save($this->datos, $token);
		$this->data['rs']=$this->Usuarios_model->getAllAdmin($token);
		$this->load->view('configuracion/item',$this->data);
	}


	public function editUser(){
		$this->datos['id']=$_REQUEST['id'];
		$pwd=$_REQUEST['pwd'];
		$password=$_REQUEST['password'];
		if ($pwd==$password) {
			$this->datos['password']=$password;
		}else{
			$this->datos['password']=sha1($password);
		}

		$this->datos['username']=$_REQUEST['login'];
		$this->datos['email']=$_REQUEST['email'];
		$this->datos['nivel']=$_REQUEST['nivel'];
		$this->datos['status']=$_REQUEST['status'];
		$token=$_COOKIE['token'];
		$this->Usuarios_model->edit($this->datos, $token);
		$this->data['rs']=$this->Usuarios_model->getAll($token);
		$this->load->view('usuarios/item',$this->data);
	}

	public function editUserAdmin(){
		$this->datos['id']=$_REQUEST['id'];
		$pwd=$_REQUEST['pwd'];
		$password=$_REQUEST['password'];
		if ($pwd==$password) {
			$this->datos['password']=$password;
		}else{
			$this->datos['password']=sha1($password);
		}

		$this->datos['username']=$_REQUEST['login'];
		$this->datos['email']=$_REQUEST['email'];
		$this->datos['status']=$_REQUEST['status'];
		$token=$_COOKIE['token'];
		$this->Usuarios_model->edit($this->datos, $token);
		$this->data['rs']=$this->Usuarios_model->getAllAdmin($token);
		$this->load->view('configuracion/item',$this->data);
	}


	public function deleteUsuario(){
		$id=$_REQUEST['id'];
		$token=$_COOKIE['token'];
		$this->Usuarios_model->delete($id, $token);
		$this->data['rs']=$this->Usuarios_model->getAll($token);
		$this->load->view('usuarios/item',$this->data);
	}

	public function deleteUsuarioAdmin(){
		$id=$_REQUEST['id'];
		$token=$_COOKIE['token'];
		$this->Usuarios_model->delete($id, $token);
		$this->data['rs']=$this->Usuarios_model->getAllAdmin($token);
		$this->load->view('configuracion/item',$this->data);
	}

	

//Configuraciones

public function configuracion(){
	$token=$_COOKIE['token'];
	$this->getAll();
	$this->data['rs']=$this->Usuarios_model->getAllAdmin($token);
	$this->load->view('configuracion/main',$this->data);
}



//*** Guardar imagenes***



	public function uploadImage(){
		if(isset($_FILES['userfile']['name'])){
			$clave=$_REQUEST['id_hotel'];
			$file=base64_encode(file_get_contents($_FILES['userfile']['tmp_name']));
			$this->data['id_hotel']=$clave;
			$this->data['tipo']=$_FILES['userfile']['type'];
			$this->data['nombre']=$_FILES['userfile']['name'];
			$this->data['contenido']=$file;

			$token=$_COOKIE['token'];
			$this->Imagen_model->save($this->data,$token);
			$url=base_url()."index.php/Main/edit_hotel?id=".$clave;
			?>
				<script type="text/javascript">
					document.location.href='<?php echo $url?>';
				</script>
				<?php
			}
	}




	public function delImagen(){
		$id_hotel=$_REQUEST['id_hotel'];
		$id=$_REQUEST['id'];
		$token=$_COOKIE['token'];
		$this->Imagen_model->delete($id, $token);
		$this->data['imagenes']=$this->Imagen_model->getById($id_hotel, $token);
		$this->load->view('hotel/show_imagenes',$this->data);

	}




}




