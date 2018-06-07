<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Publish_edit_model extends CI_Model{
	
	public function publishForm($title, $fileds){
		$this->db->where('title', $title);
		$query = $this->db->get('published_forms');
		$num = $query->num_rows();
		if (!$num) {
			$data = [
				'title'    => $title,
				'fields'   => $fileds,
				'submited' => 0
			];
			$this->db->insert('published_forms', $data);
			$error   = false;
			$messege = 'Form saved successfully'; 
		} else {
			$error   = true;
			$messege = 'There is already a form with <strong>'.$title.'</strong> title'; 
		}
		$result = [
			'error'   => $error,
			'messege' => $messege
		];
		return $result;
	}

	public function publishedList($id = false){
		$this->db->select('*')
				 ->from('published_forms');
		if ($id) {
			$this->db->where('id', $id);
		}
		return $this->db->get()->result_array();
	}

	public function delPublishedList($id){
		$this->db->where('id', $id);
		$this->db->delete('published_forms');
	}

	public function updateData($title, $fileds, $id){
		$data = [
			'title'    => $title,
			'fields'   => $fileds
		];
		$this->db->update('published_forms', $data, "id = {$id}");
	}

	public function submitByUser($id, $values, $ip){
		$data = [
			'form_id'      => $id,
			'fields_value' => $values,
			'user_ip'	   => $ip
		];
		$this->db->insert('submited_forms', $data);
		return $this->db->affected_rows();
	}

	public function updateFormStatus($id) {
		$this->db->update('published_forms', ['submited' => 1], "id = {$id}");
	}

	public function getAllSubmitedForms() {
		return $this->db->select('submited_forms.id, title, fields_value, user_ip, date')
						->from('submited_forms')
						->join('published_forms', 'submited_forms.form_id = published_forms.id')
				 		->get()->result_array();
	}

}	