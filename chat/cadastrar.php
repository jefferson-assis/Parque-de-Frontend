<?php
include("conn.php");
if($_POST){
	CadastrarMensagem($_POST['msg'],0,$_POST['id']);
}

?>