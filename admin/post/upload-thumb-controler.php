<?php
	include_once("../inc/validForm.php");
	date_default_timezone_set("Asia/Bangkok");
		


			if (isset($_FILES["post_thumb"]) && $_FILES["post_thumb"]["error"] == 0) {
				
				$thumb_name = date("ymdhi").'-'.$_FILES['post_thumb']['name'];
				$thumb_size = $_FILES['post_thumb']['size'];
				$thumb_type = $_FILES['post_thumb']['type'];
				$thumb_error = $_FILES["post_thumb"]["error"];
				$thumb_tmp = $_FILES['post_thumb']['tmp_name'];

				$target_dir = "../../uploads/thumbnail/".basename($thumb_name);
				$thumb_path = '/uploads/thumbnail/'. basename($thumb_name);
				$uploadOK = TRUE;
				$thumbFileType = strtolower(pathinfo($thumb_name,PATHINFO_EXTENSION));
			
				if (!checkExtImg($thumb_name)) {
					$uploadOK = FALSE;
					$errExtThumb = "Lỗi: Ảnh không đúng định dạng !";
				}

				$maxsize = 2 * 1024 * 1024 ;
				if (!checkSizeOfFile($thumb_size,$maxsize)) {
					$uploadOK = FALSE;
					$errSizeThumb = "Lỗi: size ảnh lớn hơn cho phép ".$maxsize/(1024*2)." MB !";
				}
				

				if (file_exists("../../uploads/thumbnail/".$thumb_name)) {
					$uploadOK = FALSE;
					$errExistsThumb = "Tên ảnh đã tồn tại !";
				} 

			} else {
				$uploadOK = FALSE;
				$errNotThumb = "Chưa có Thumbnail !";
			}
	


		