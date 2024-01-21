<?php
class Ciudad_model  extends CI_Model  {

	public function getCurl($url,$data,$token){
		$url="http://localhost/apihotel/Ciudad/".$url;
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


	public function getByCountry($id_pais, $token){
	   $url="getByCountry";
	    $data=array(
	   	"id_pais"=>$id_pais
	   );
	   return $this->getCurl($url,json_encode($data),$token);
	}



}