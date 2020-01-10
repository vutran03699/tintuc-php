<?php
	function checkInput($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}

	function valueIsEmpty($val){
			return $val . " không được bỏ trống !";
		}

	

	// function formIsEmpty($name,$val){
	// 	if(empty($val)){
	// 		echo $name . "Không được bỏ trống !";
	// 		return false;
	// 	} else {
	// 		echo " ";
	// 		return true;
	// 	}
	// }

	function checkSizeOfFile($sizeFile,$maxsize){
		if ($sizeFile > $maxsize) {
			return false;
		} else{
			return true;
		} 
	}

	function checkExtImg($imgName){
		$ext_allowed = array("jpg"=>"image/jpg",
							"jpeg"=>"image/jpeg",
							"gif" => "image/gif", 
							"png" => "image/png" );
		$ext_thumb = pathinfo($imgName,PATHINFO_EXTENSION);

		if (!array_key_exists(strtolower($ext_thumb), $ext_allowed) ){
			return false;
		} else{
			return true;
		}
	}

?>