<?php
include('conn.php');
?>
<style>
	
#box{width:500px;max-height:400px;border: 1px solid navy;padding:10px;overflow-y: scroll;}
#msg{width:450px;min-height:100px;float:left;}
#btn{margin-left:10px;}
#users{float:left;margin-left:550px;width:200px;border:1px solid blue;
min-height:200px;
overflow:auto;
position:absolute;}
#users li{
display: block inline;
text-decoration:none;
width:100%;
height:20px;
border:1px  dotted red;
}
li{
	text-decoration: none;
	display: inline-block;
	text-align: center;	
	width: 90%;
}
body{
	background-color: #0678 
}
</style>

<script src="jquery.min.js"></script>
<script>
	$(document).ready(function(){
		setInterval(function(){
			$('#box').load('msgs.php');
		},1000);
	});


$(document).on('submit','#form',function(){
	// aqui captura todos os campos do respectivo formulario
	var dados = $(this).serialize(); 
	$.ajax({
		type: 'POST',
		url: 'cadastrar.php',
		data: dados,
		success: function(){
		$('#msg').val('');
		}
	});
	return false;
});


</script>

	<div id="users">
	<!-- mostrar usuarios online -->
	<?php
		$usuarios = ListarUsuarios();
		while($user = $usuarios->fetch_array()){
			echo '<li class="privado" id="" value="">'.$user['nome'].'</li>';
		}
	?>
	<!-- fim -->
	</div>
	<div name="box" id="box">	
	</div>
	<br/>
		<form action="cadastrar.php" method="post" id="form">
		Digitae: 
		<br>
			<textarea name="msg" id="msg"></textarea>
			<input type="hidden" name="id" value="<?php echo $_GET['user'];?>">
			<input type="submit" value="Enviar">
			
		</form>