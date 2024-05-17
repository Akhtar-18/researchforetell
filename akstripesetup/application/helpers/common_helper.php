<?php
function get_news_four($category){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('news');
	$CI->db->where('category',$category);
	$CI->db->where('status','1');
	$CI->db->limit(4,1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->result();
	if($query){
		return $query;
	}else{
		return false;
	}
}


function get_news_two($category){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('news');
	$CI->db->where('category',$category);
	$CI->db->where('status','1');
	$CI->db->limit(4,1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->result();
	if($query){
		return $query;
	}else{
		return false;
	}
}



function get_news_one($category){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('news');
	$CI->db->where('category',$category);
	$CI->db->where('status','1');
	$CI->db->limit(1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->row();
	if($query){
		return $query;
	}else{
		return false;
	}
}


function get_news_fourchannel($channel){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('channelnews');
	$CI->db->where('channelname',$channel);
	$CI->db->limit(3,1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->result();
	if($query){
		return $query;
	}else{
		return false;
	}
}


function get_news_twochannel($channel){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('channelnews');
	$CI->db->where('channelname',$channel);
	$CI->db->limit(2,1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->result();
	if($query){
		return $query;
	}else{
		return false;
	}
}

function get_news_channel($channel){
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->from('channelnews');
	$CI->db->where('channelname',$channel);
	$CI->db->limit(1);
	$CI->db->order_by('id','desc');
	$query = $CI->db->get()->row();
	if($query){
		return $query;
	}else{
		return false;
	}
}