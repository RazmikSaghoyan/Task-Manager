<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('publish_edit_model');
	}

	public function index()
	{
		$this->load->view('admin_vew');
		$published = $this->publish_edit_model->publishedList();
		$this->load->view('published_forms', ['published' => $published]);
		$this->load->view('form_edit');
		$submited = $this->publish_edit_model->getAllSubmitedForms();
		$this->load->view('submited_forms', ['submited' => $submited]);
		
	}

	public function publishForm()
	{
		if ($this->input->post('form_title') && trim($this->input->post('form_title')) != '') {
			$title = $this->input->post('form_title');
		} else {

		}
		$fields = $this->input->post();
		unset($fields['form_title']);
		unset($fields['sub']);
		$fields = array_chunk($fields, 3);
		$data   = serialize($fields);
		$result = $this->publish_edit_model->publishForm($title, $data);
		
		$this->load->view('admin_vew', $result);
		$published = $this->publish_edit_model->publishedList();
		$this->load->view('published_forms', ['published' => $published]);
		$this->load->view('form_edit');
		$submited = $this->publish_edit_model->getAllSubmitedForms();
		$this->load->view('submited_forms', ['submited' => $submited]);
	}

	public function delPublishedList($id)
	{
		if ($id) {
			$this->publish_edit_model->delPublishedList($id);
			$this->index();
		} else {
			echo 'error';
		}

	}

	public function getEditableForm()
	{
		if ($this->input->post('id')) {
			$id     			= $this->input->post('id');
			$data   			= $this->publish_edit_model->publishedList($id);
			$data[0]['fields'] = unserialize($data[0]['fields']);
			echo json_encode($data);
		} else {
			echo 'error';
		}

	}

	public function saveEditedForm($id)
	{
		if ($this->input->post('form_title') && trim($this->input->post('form_title')) != '') {
			$title = $this->input->post('form_title');
		} else {

		}
		$fields = $this->input->post();
		unset($fields['form_title']);
		unset($fields['sub']);
		$fields = array_chunk($fields, 3);
		$data   = serialize($fields);
		if ($id) {
			$this->publish_edit_model->updateData($title, $data, $id);
		}
		$this->index();
	}
}