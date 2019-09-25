<?php
	include('conn.php');

		$todas = ListarMensagens();

		while($msg = $todas->fetch_array()) {
			echo '<p>'.$msg['nome'].':'.$msg['mensagem'].'</p>';
		}
?>