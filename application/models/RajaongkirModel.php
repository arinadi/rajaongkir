<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class RajaongkirModel extends CI_Model {
 
    public $api = "http://api.rajaongkir.com/starter/";
    public $key = "9f7a600c99ab449a24abdb1120cc790e";
    public function __construct()
    {
        parent::__construct();
    }
 
    public function getKabupaten($province=null){
        $url = $this->api."city";
        if($province!=null){
            $url .= "?province=$province";
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:$this->key"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);        
        curl_close($curl);

        $data = json_decode($response, true);
        return $data['rajaongkir']['results'];
    }   

    public function getProvince(){
        $url = $this->api."province";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:$this->key"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);        
        curl_close($curl);

        $data = json_decode($response, true);
        return $data['rajaongkir']['results'];
    }    

    public function getCost(){
        $post = $this->input->post();
        $asal = $post['asal'];
        $id_kabupaten = $post['kab_id'];
        $kurir = $post['kurir'];
        $berat = $post['berat'];

        $url = $this->api."cost";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:$this->key"
            ),
         ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);        
        curl_close($curl);

        $data = json_decode($response, true);
        return $data['rajaongkir']['results'];
    }    
}