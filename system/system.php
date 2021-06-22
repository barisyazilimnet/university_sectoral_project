<?php

	function theme_content($con){
		@$page=$_GET["page"];
		switch ($page) {
			case 'cart':
				require "themes/default/cart.php";
				break;
			
			default:
				require "themes/default/default.php";
				break;
		}
	}
	function _header($page){ // sayfa yönelendirmeleri
		if($page==""){
			header("Refresh:3; url = http://localhost/sp/admin/administrator.php", true, 303);
		}else{
			header("Refresh:3; url = http://localhost/sp/admin/administrator.php?do=$page", true, 303);
		}
	}
	function input_control($post, $variable){ // şifre ve benzerleri konrtolü için
		if($post){ 
			if($variable==0 and isset($variable)){ echo 'is-invalid'; } 
		}
	}
	function authorization_add_pages_control($post,$pages,$pages_name){ // yetki ekleme de checkboxda seçim kontrolleri
		if($post){ 
			if($pages!="" and in_array($pages_name, explode(",", $pages))){ echo "checked"; } 
		}
	}
	function authorization_edit_pages_control($post,$pages,$pages_name,$vt_pages){ // yetki düzenleme de checkboxda seçim kontrolleri
		if($post){ 
			if($pages!="" and in_array($pages_name, explode(",", $pages))){ echo "checked"; } 
		}else{ 
			if(in_array($pages_name, explode(",", $vt_pages))){ echo "checked"; } 
		}
	}
	function authorization_edit_color_control($post,$color,$color_name,$vt_color){ // yetki düzenleme de select de seçim kontrolleri
		if($post){ 
			if($color==$color_name){ echo "selected"; } 
		}else{ 
			if($vt_color==$color_name){ echo "selected"; } 
		}
	}
	function password($length){ //otomatik şifre üretiyor
		$characters = "0123456789!@#$%^&*()_+"."abcdefghijklmnopqrstuvwxyz"."ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$sfr = "";
		while(strlen($sfr) < $length)
		{
			$sfr .= substr($characters, (rand()% strlen($characters)), 1);
		}
		return($sfr);
	}
	function system_archives($con, $description, $operation, $active_user_id){ //sistem kayıt sql
		mysqli_query($con, "INSERT INTO system_archives SET description ='$description', operation ='$operation', user_id ='$active_user_id'");
	}
	function case_converter( $keyword){ // bütün harfleri büyütür
		$low = array('a','b','c','ç','d','e','f','g','ğ','h','ı','i','j','k','l','m','n','o','ö','p','r','s','ş','t','u','ü','v','y','z','q','w','x');
		$upp = array('A','B','C','Ç','D','E','F','G','Ğ','H','I','İ','J','K','L','M','N','O','Ö','P','R','S','Ş','T','U','Ü','V','Y','Z','Q','W','X');
		$keyword = str_replace( $low, $upp, $keyword );
		$keyword = function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $keyword ) : $keyword;
		return $keyword;
	}
	function message($message_pattern,$icon,$top_header_message,$message){ // mesaj şekilleri -> warning -- danger -- success
		return '<div class="alert alert-'.$message_pattern.' alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fas fa-'.$icon.'"></i> '.$top_header_message.'</h4>
			'.$message.'
		</div>';
	}
	function p($value, $type){
		if($type=="pass"){
			return md5(strip_tags(trim($_POST[$value])));
		}else if($type=="case_converter"){
			return htmlspecialchars(strip_tags(trim(case_converter($_POST[$value]))), ENT_QUOTES);
		}else if($type=="mb_convert_case"){
			return htmlspecialchars(strip_tags(trim(mb_convert_case($_POST[$value], MB_CASE_TITLE, "utf-8"))), ENT_QUOTES);
		}else{
			return htmlspecialchars(strip_tags(trim($_POST[$value])), ENT_QUOTES);
		}
	}
	function upload_edit($tmp_name,$name,$file_name,$file_pathinfo,$error_message1,$error_message2,$vt_file,$profile=false){
		if(is_uploaded_file($tmp_name)){
			$photo=pathinfo($name);
			$extension=["png","PNG","jpg","JPG","jpeg","JPEG"];
			if(in_array($photo["extension"],$extension)){
				$file_name=$file_name.uniqid(True);
				$new_adress="../uploads/".$file_pathinfo.$file_name.".".$photo["extension"];
				if(move_uploaded_file($tmp_name,$new_adress)){
					if($profile){
						if($vt_file != "Mrs_profile_photo.png" or $vt_file != "Mr_profile_photo.png"){
							unlink("../uploads/".$file_pathinfo.$vt_file);
						}
					}else{
						if($vt_file){
							unlink("../uploads/".$file_pathinfo.$vt_file);
						}
					}
					return $file_name.".".$photo["extension"];
				}else{
					echo $error_message1;
				}
			}else{
				echo $error_message2;
			}
		}else{
			return $vt_file;
		}
	}
	function upload_add($tmp_name,$name,$file_name,$file_pathinfo,$error_message1,$error_message2,$gender){
		if(is_uploaded_file($tmp_name)){
			$photo=pathinfo($name);
			$extension=["png","PNG","jpg","JPG","jpeg","JPEG"];
			if(in_array($photo["extension"],$extension)){
				$file_name=$file_name.uniqid(True);
				$new_adress="../uploads/".$file_pathinfo.$file_name.".".$photo["extension"];
				if(move_uploaded_file($tmp_name,$new_adress)){
					return $file_name.".".$photo["extension"];
				}else{
					echo $error_message1;
				}
			}else{
		 		echo $error_message2;
			}
		}else{
			if($gender!=""){
				if($gender){
					return "Mr_profile_photo.png";
				}else{
					return "Mrs_profile_photo.png";
				}
			}else{
				return "";
			}
		}
	}
	function _date($date, $time=false){
		if($time){
			return date_format(date_create($date),'H:i d.m.Y');
		}else{
			return date_format(date_create($date),'d.m.Y');
		}
	}
	function turkish_converter($keyword){
		$turkish = array('ç','ğ','ı','ö','ş','ü','Ç','Ğ','İ','Ö','Ş','Ü');
		$english = array('c','g','i','o','s','u','C','G','I','O','S','U');
		$keyword = str_replace( $turkish, $english, $keyword );
		$keyword = function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $keyword ) : $keyword;
		return $keyword;
	}
?>