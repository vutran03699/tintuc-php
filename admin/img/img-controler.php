<?php
	include_once("../inc/validForm.php");
	date_default_timezone_set("Asia/Bangkok");

		

			$maxSize = 2 * 1024 * 1024;

			if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
				 
				$img_name = date("ymdhi").'-'.$_FILES['img']['name'];
				$img_size = $_FILES['img']['size'];
				$img_type = $_FILES['img']['type'];
				$img_error = $_FILES["img"]["error"];
				$img_tmp = $_FILES['img']['tmp_name'];

				$target_dir = "../../uploads/image/".basename($img_name);
				$img_path = '/uploads/image/'. basename($img_name);
				$uploadOK = TRUE;
				$imgFileType = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
			
				if (!checkExtImg($img_name)) {
					$uploadOK = FALSE;
					$errExtImg = "Lỗi: Ảnh không đúng định dạng !";
				}

				
				if (!checkSizeOfFile($img_size,$maxSize)) {
					$uploadOK = FALSE;
					$errSizeImg = "Lỗi: size ảnh lớn hơn cho phép ".$maxize/(1024*2)." MB !";
				}
				

				if (file_exists("../../uploads/image/".$img_name)) {
					$uploadOK = FALSE;
					$errExistsImg = "Tên ảnh đã tồn tại !";
				} 

			} else {
				$uploadOK = FALSE;
				$errNotImg = "Chưa có Image !";
			}
	