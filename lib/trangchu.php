
<?php
require_once "../admin/core/dbConfig.php";
function tinMoiNhat_1(){
    require_once "dbConfig.php";
    $qr="
            SELECT * FROM tin 
            ORDER BY idTin DESC
            LIMIT 0,3
    ";
    return mysqli_query($this->conn,$qr);
    
}
function quangCao(){
    $qr = "SELECT * FROM `quangcao` ORDER BY idQC DESC LIMIT 0,1";
    return mysqli_query(mysqli_connect("localhost", "root","","tintuc"),$qr);
}

?>