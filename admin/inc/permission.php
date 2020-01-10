<?php

function checkLogin($id){
	if (!isset($id) ) {
		return FALSE;
	} else {
		return TRUE;
	}
}

function checkIsAdmin($level){
	if ($level == 1) {
		return TRUE;
	} else {
		return FALSE;
	}
}

