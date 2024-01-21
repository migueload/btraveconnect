<?php
class Facilidades_model  extends CI_Model  {

	public function getCurl($url,$data,$token){
		$url="http://localhost/apihotel/Facilidades/".$url;
		$ch = curl_init($url);
		$headers = [];
	    $headers[] = 'Content-Type:application/json';
	    $headers[] = "Authorization: Bearer ".$token;
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $result = curl_exec($ch);     
	    curl_close($ch);
	    return json_decode($result);
	}	


	public function hotelGetAll($token){
	   $url="hotelGetAll";
	   return $this->getCurl($url,"",$token);
	}

	public function habitacionesGetAll($token){
	   $url="habitacionesGetAll";
	   return $this->getCurl($url,"",$token);
	}

	public function getHotel($id, $token){
	   $url="getHotel";
	    $data=array(
	   	"id_hotel"=>$id
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}

	public function getHabitaciones($id, $token){
	   $url="getHabitacion";
	    $data=array(
	   	"id_hotel"=>$id
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}

	public function saveOneFacilidadHotel($data,$token){
		 $url="saveOneFacilidadHotel";
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function saveOneFacilidadHabitacion($data,$token){
		 $url="saveOneFacilidadHabitacion";
		 return $this->getCurl($url,json_encode($data),$token);
	}


}