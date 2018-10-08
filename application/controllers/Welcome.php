<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->model('RajaongkirModel','rajaongkir');
    }
	public function index()
	{
		$data['kabupatenAsal'] = $this->rajaongkir->getKabupaten();
		$data['provinsiAsal'] = $this->rajaongkir->getProvince();
		$this->load->view('welcome_message', $data);
	}
	public function get_kabupaten($id){
		$data = $this->rajaongkir->getKabupaten($id);
		foreach($data as $key){
			echo "<option value='".$key['city_id']."'>".$key['city_name']."</option>";
		}
	}
	public function get_ongkir(){
		$data['result'] = $this->rajaongkir->getCost();
		$this->load->view('ongkir', $data);
	}
}
