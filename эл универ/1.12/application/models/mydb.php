<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mydb extends CI_Model {
    
    function get_article($tabl, $sel, $where_type = '', $where_text = '') //$tabl, $where_type = '', $where_text = ''
    {
		//$this->db->limit('3'); //лимит записей
		$this->db->order_by('id', 'DESC'); //сортировка
		$this->db->select($sel);
		if ($where_type != '') $this->db->where($where_type, $where_text); //условие 
        $query = $this->db->get($tabl);//таблица
        if ($query) return $query->result_array();
		else return false;
    }
	
	function get_article_sort($tabl, $sel, $sort, $where_type = '', $where_text = '') //$tabl, $where_type = '', $where_text = ''
    {
		//$this->db->limit('3'); //лимит записей
		$this->db->order_by($sort, 'ASC'); //сортировка
		$this->db->select($sel);
		if ($where_type != '') $this->db->where($where_type, $where_text); //условие 
        $query = $this->db->get($tabl);//таблица
        if ($query) return $query->result_array();
		else return false;
    }
	
	function add_article($tabl, $data)
	{
		$this->db->insert($tabl, $data);
	}
	
	function edit_article($tabl, $data, $where_type, $where_text)
	{
		$this->db->where($where_type, $where_text);
		$this->db->update($tabl, $data);
	}
	
	function del_article($tabl, $id)
	{
		$this->db->where('id' , $id);
		$this->db->delete($tabl);
	}
	
	function table_list()
	{
		return $this->db->list_tables();
	}

}