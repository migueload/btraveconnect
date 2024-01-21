<?php
class Auth_model  extends CI_Model  {

	public function getCurl($url,$data){

		$url="http://localhost/apihotel/auth/".$url;
		 $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_close($ch);
	    $result=json_decode(curl_exec($ch));
	    return $result;
	}	


	public function login($data){
	   $url="login";
	   return $this->getCurl($url,$data);
	}



}