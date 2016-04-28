<?php require_once("./app/template/header.php"); ?>
<?php require_once("./app/db/database.php"); ?>


<?php
$id = 0;

// Caso tenha requisição para deletar usuário
if (!empty($_GET['delet-id'])) {
    $id = $_GET['delet-id'];

    $con = Database::connect();
    $sql = "DELETE FROM usuario WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        die("Ocorreu algum erro ao deletar o usuário.");
    }
    $stmt->close();
    Database::disconnect();
    header("Location: listar.php?active=listar");
}

?>

<div class="row">

    <div class="col-sm-12">

<?php
$con = Database::connect();
$result = null;
$testFilter = false;
$testAll = false;


// Caso tenha requisição para filtrar os usuários pelo nome
if (!empty($_GET['nome-filter'])) {
    $nome = $_GET['nome-filter'];

    // SQL filtrando o nome
    $sql = "SELECT * FROM usuario WHERE nome LIKE '%" . $nome . "%'";
    $result = $con->query($sql);
    $testFilter = true;
} else {
    $sql = "SELECT * FROM usuario";
    $result = $con->query($sql);
    $testAll = true;
}



if ($result->num_rows == 0 && $testFilter === TRUE) :
    ?>

            <!-- Caso não haja sucesso na filtragem -->
            <h3 class="text-center">
                Nenhum aluno contém "<?php echo $nome ?>" em seu nome. <br> <br>

                <a href="listar.php?active=listar" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp Voltar</a>
            </h3>

    <?php
endif;

if ($result->num_rows == 0 && $testAll === TRUE) :
    ?>

            <!-- Caso não haja sucesso na listagem -->
            <h3 class="text-center">
                Nenhum aluno cadastrado no momento. Deseja <a href="cadastrar.php?active=cadastrar">cadastrar</a> um novo usuário?
            </h3>

    <?php
endif;

if ($result->num_rows > 0) :
    ?>

            <div class="row">

                <div class="col-sm-4">
                    <h1> Relatório de alunos:</h1>
                </div>

                <!-- Só é visível ao atualizar um usuário -->
                <div class="col-sm-4">
                    <h3 id="edit-aviso" class="bg-success">
                        Usuário atualizado <span class="glyphicon glyphicon-ok"></span>
                    </h3>
                </div>

                <!-- Formulário de filtragem -->
                <div class="col-sm-4">
                    <form action="listar.php" class="inline-form filter-form" method="get" role="form">
                        <input type="hidden" name="active" value="listar">

                        <div class="input-group">
                            <input type="text" name="nome-filter" placeholder="Filtrar usuários por nome" class="form-control" /> 
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Filtrar</button>
                            </span>
                        </div>
                    </form> <!-- end form -->
                </div>

            </div> <!-- end .row -->


            <div class="row">
                <div class="table-responsive col-sm-12">

                    <!-- TABELA DOS USUÁRIOS -->
                    <table id="lista" class="table table-striped table-bordered table-lista">
                        <thead class="text-center">
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de Nascimento</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead> <!-- end thead -->

                        <tbody>
                            <!-- Preenche o corpo da tabela com os usuários -->
    <?php
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td><span class="td-align">' . $row['id'] . '</span></td>';
        echo '<td><span class="td-align">' . $row['nome'] . '</span></td>';
        echo '<td><span class="td-align">' . $row['email'] . '</span></td>';
        echo '<td><span class="td-align">' . $row['datanasc'] . '</span></td>';
        echo '<td class="table-acoes">

											<a href="editar.php?active=listar&edit-id=' . $row['id'] . '" class="btn btn-primary btn-sm table-btn-editar">
												<span class="glyphicon glyphicon-cog"></span>
												&nbspEditar
											</a>
											<a href="#" onclick="lightbox_open(' . $row['id'] . ',\'' . $row['nome'] . '\')" class="btn btn-danger btn-sm">
												<span class="glyphicon glyphicon-remove"></span>
												&nbspRemover
											</a>
										  </td>';
        echo '</tr>';
    }
    ?>

                        </tbody> <!-- end tbody -->

                    </table> <!-- end table -->

                </div> <!-- end .table-responsive -->
            </div> <!-- end .row -->

    <?php
endif;
Database::disconnect();
?>
    </div>

</div>

<!-- Lightbox de confirmação para remover usuário -->
<div id="remover-box">
    <h3>Tem certeza que deseja remover o usuário <span id="remover-nome"></span>?</h3>
    <a href="#" id="remover-link" class="btn btn-danger btn-remover">Remover</a>
    <a href="#" class="btn btn-default" onclick="lightbox_close()">Cancelar</a>
</div>
<div id="remover-fade" onClick="lightbox_close()"></div>


<?php require_once("./app/template/footer.php"); ?>