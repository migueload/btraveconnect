<?php
class Hotel_model  extends CI_Model  {

	public function getCurl($url,$data,$token){
		$url="http://localhost/apihotel/hotel/".$url;
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

	public function getAllAdmin($token){
	   $url="getAllAdmin";
	   return $this->getCurl($url,"",$token);
	}

	public function getAll($token){
	   $url="getAll";
	   return $this->getCurl($url,"",$token);
	}

	public function getById($id_hotel, $token){
	   $url="getById";
	   $data=array(
	   	"id"=>$id_hotel
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}

	public function delete($id_hotel, $token){
	   $url="delete";
	   $data=array(
	   	"id"=>$id_hotel
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}


	public function saveOne($data,  $token){
		$url="saveOne";
		return $this->getCurl($url, json_encode($data), $token);
	}
	


	public function getHotelByIdNOAUTH($id_hotel, $token){
	   $url="getHotelByIdNOAUTH";
	   $data=array(
	   	"id"=>$id_hotel
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}



}