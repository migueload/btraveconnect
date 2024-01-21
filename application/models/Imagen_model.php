<?php
class Imagen_model  extends CI_Model  {

	public function getCurl($url,$data,$token){
		$url="http://localhost/apihotel/imagen/".$url;
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


	
	public function getById($id_hotel, $token){
	   $url="getById";
	   $data=array(
	   	"id_hotel"=>$id_hotel
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}

	public function delete($id, $token){
	   $url="delete";
	   $data=array(
	   	"id"=>$id
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}

	public function save($data,  $token){
		$url="save";
		return $this->getCurl($url, json_encode($data), $token);
	}

}