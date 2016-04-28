<?php require_once("./app/template/header.php"); ?>
<?php require_once("./app/db/database.php"); ?>

<?php 
	$id = null;

	// Resgata o ID do usuário que será editado
	if (!empty($_GET['edit-id'])) {
		$id = $_GET['edit-id'];
	}

	if ($id == null) {
		header("Location: listar.php?active=listar&att-aviso=true");
	}

	// Caso tenha requisição POST para editar
	if (!empty($_POST)) {

		$id = intval($_POST['id']);
		$nome = $_POST['nome'];
		$data = $_POST['data'];
		$email = $_POST['email'];

		$con = Database::connect();

		$sql = "UPDATE usuario SET nome=?, datanasc=?, email=? WHERE id=?";
		$stmt = $con->prepare($sql);
		$stmt->bind_param("sssi", $nome, $data, $email, $id);
	

		if ($stmt->execute()) {
			die ("Erro ao realizar alteração.");
		}
		Database::disconnect();
		header("Location: listar.php?active=listar&att-aviso=true");
	}

	// Caso não tenha POST, preenche os campos com os dados
	else {
		$con = Database::connect();
		$sql = "SELECT nome,datanasc,email FROM usuario WHERE id = ?";
		$stmt = $con->prepare($sql);
		$stmt->bind_param("i", $id);

		if ($stmt->execute()) {
			$stmt->bind_result($nome,$data,$email);
			$stmt->fetch();
		}
		else
			die ("Erro ao realizar consulta.");

		$stmt->close();
		Database::disconnect();
	}
	
?>

<div class="row">

	<!-- Título com nome do usuário -->
	<h1 class="text-center">Editar <?php echo $nome?></h1>

	<div class="col-sm-offset-2 col-sm-8">

		<form action="editar.php?active=listar" method="post" class="form-horizontal form-cadastrar" role="form">

			<!-- Envia o ID do usuário por POST -->
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			
			<!-- NOME -->
			<div class="row">
				<div class="form-group">
					<div class="col-sm-3 ">
						<label for="nome" class="control-label">Nome:</label>
					</div>

				    <div class="col-sm-8">
				    	<input type="text" class="form-control" id="nome" name="nome" value="<?php if(!empty($nome)) echo $nome; ?>"  pattern="[A-Za-z ]*" placeholder="Somente letras" required="required">
				    </div>
			    </div>
		    </div> <!-- end .row -->
			
			<!-- DATA DE NASCIMENTO -->
			<div class="row">
			    <div class="form-group  ">
			    	<div class="col-sm-3">
						<label for="data" class="control-label">Data de Nascimento:</label>
					</div>

				    <div class="col-sm-8">
				    	<input type="text" class="form-control" id="data" class="data" name="data" value="<?php if(!empty($data)) echo $data; ?>" pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}$" title="Insira uma data válida" required="required">
				    </div>
			    </div>
		    </div> <!-- end .row -->
			
			<!-- E-MAIL -->
			<div class="row">
			    <div class="form-group ">
			    	<div class="col-sm-3">
						<label for="email" class="control-label">E-mail:</label>
					</div>

				    <div class="col-sm-8">
				    	<input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($email)) echo $email; ?>"placeholder="exemplo@aaaa.com" required="required">
				    </div>
			    </div>
		    </div> <!-- end .row -->

			<!-- SUBMIT -->
			<div class="row">
			    <div class="form-group">
			    	<div class="col-sm-offset-3 col-sm-9">
				    	<button type="submit" id="submit" class="btn btn-default">Atualizar</button>
			    	</div>
			  	</div>
		  	</div> <!-- end .row -->

		</form> <!-- end form -->

	</div> <!-- end .col-sm-8 -->

</div> <!-- end .row -->

<?php require_once("./app/template/footer.php"); ?>