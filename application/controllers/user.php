<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('publish_edit_model');
	}

	public function index()
	{
		$published = $this->publish_edit_model->publishedList();
		$this->load->view('user_view', ['published' => $published]);
	}

	public function submitForm($id)
	{
		$fields = $this->input->post();
		unset($fields['sub']);
		$data = serialize($fields);
		$host = gethostname();
		$ip   = gethostbyname($host);
		$res  = $this->publish_edit_model->submitByUser($id, $data, $ip);
		
		if ($res) {
			$this->publish_edit_model->updateFormStatus($id);
		}

		$published = $this->publish_edit_model->publishedList();
		$this->load->view('user_view', ['published' => $published]);
	}

}