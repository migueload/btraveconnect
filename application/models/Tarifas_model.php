<?php
class Tarifas_model  extends CI_Model  {

	public function getCurl($url,$data,$token){
		$url="http://localhost/apihotel/tarifas/".$url;
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

	public function saveManual($data,$token){
		 $url="saveManual";
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function saveDinamica($data,$token){
		 $url="saveDinamica";
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function getAllTMPManual($username,$token){
		 $url="getAllTMPManual";
		 $data=array(
	   	   "username"=>$username
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}


	public function delTMPManual($id,$token){
		 $url="delTMPManual";
		 $data=array(
	   	   "id"=>$id
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function delAllTMPManual($username,$token){
		 $url="delAllTMPManual";
		 $data=array(
	   	   "username"=>$username
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}


	public function saveTMPManual($data,$token){
		 $url="saveTMPManual";
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function getAllTMPDinamica($username,$token){
		 $url="getAllTMPDinamica";
		 $data=array(
	   	   "username"=>$username
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function delTMPDinamica($id,$token){
		 $url="delTMPDinamica";
		 $data=array(
	   	   "id"=>$id
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function delAllTMPDinamica($username,$token){
		 $url="delAllTMPDinamica";
		 $data=array(
	   	   "username"=>$username
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function saveTMPDinamica($data,$token){
		 $url="saveTMPDinamica";
		 return $this->getCurl($url,json_encode($data),$token);
	}


	public function getDinamicaByHotel($id_hotel,$token){
		 $url="getDinamicaByHotel";
		 $data=array(
	   	   "id_hotel"=>$id_hotel
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function getManualByHotel($id_hotel,$token){
		 $url="getManualByHotel";
		 $data=array(
	   	   "id_hotel"=>$id_hotel
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function editDinamica($data,$token){
		 $url="editDinamica";
		 return $this->getCurl($url,json_encode($data),$token);
	}


	public function delManual($id,$token){
		 $url="delManual";
		 $data=array(
	   	   "id"=>$id
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	public function delDinamica($id,$token){
		 $url="delDinamica";
		 $data=array(
	   	   "id"=>$id
	     );
		 return $this->getCurl($url,json_encode($data),$token);
	}

	


}
