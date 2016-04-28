<?php require_once("./app/template/header.php"); ?>

<?php
require_once './app/db/Conexao.php';
require_once './app/class/Usuario.php';
require_once './app/class/UsuarioDAO.php';

// Caso tenha requisição POST para cadastro
if (!empty($_POST)) {
    $senhaErro = null;

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaConfirm = $_POST['senhaConfirm'];

    $valid = true;

    // Testes para confirmar a senha
    if (empty($senhaConfirm)) {
        $senhaErro = "Confirme sua senha";
        $valid = false;
    } elseif ($senha != $senhaConfirm) {
        $senhaErro = "Erro ao confirmar senha";
        $valid = false;
    }

    // Se a senha não for confirmada... preenche os campos com os valores de antes
    if (!$valid) {
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }

    // Caso o cadastro seja válido
    if ($valid) {
        $usuarios = new Usuario();
        $stmt = new UsuarioDAO();

        $usuarios->setNome(trim(utf8_encode($nome)));
        $usuarios->setDatanasc(trim(utf8_encode($data)));
        $usuarios->setEmail(trim(utf8_encode($email)));
        $usuarios->setSenha(trim(utf8_encode(md5($senha))));

        $stmt = UsuarioDAO::Insert($usuarios);


        header("Location: cadastrar.php?active=cadastrar&aviso=true");
    }
}
?>

<div class="row">

    <h1 class="text-center">Cadastrar Usuário</h1>

    <div class="col-sm-offset-2 col-sm-8">

        <!-- Formulário de Cadastro -->
        <form action="cadastrar.php?active=cadastrar" method="post" class="form-horizontal form-cadastrar" role="form">

            <!-- NOME -->
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-3 ">
                        <label for="nome" class="control-label">Nome:</label>
                    </div>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php if (!empty($nome)) echo $nome; ?>"  pattern="[A-Za-z ]*" placeholder="Somente letras" required="required">
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
                        <input type="text" class="form-control" id="data" class="data" name="data" value="<?php if (!empty($data)) echo $data; ?>" pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}$" title="Insira uma data válida" required="required">
                    </div>
                </div>
            </div> <!-- end .row -->

            <!-- EMAIL -->
            <div class="row">
                <div class="form-group ">
                    <div class="col-sm-3">
                        <label for="email" class="control-label">E-mail:</label>
                    </div>

                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>"placeholder="exemplo@aaaa.com" required="required">
                    </div>
                </div>
            </div> <!-- end .row -->

            <!-- SENHA -->
            <div class="row">
                <div class="form-group ">
                    <div class="col-sm-3">
                        <label for="senha" class="control-label">Senha:</label>
                    </div>

                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="senha" name="senha" pattern="[A-Za-z0-9_.-]{4,}" placeholder="Mínimo de 4 dígitos" required="required">
                    </div>
                </div>
            </div> <!-- end .row -->

            <!-- CONFIRMAR SENHA -->
            <div class="row">
                <div class="form-group  has-feedback <?php echo!empty($senhaErro) ? 'has-error' : ''; ?>">
                    <div class="col-sm-3">
                        <label for="senhaConfirm" class="control-label">Confirmar senha:</label>
                    </div>

                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="senhaConfirm" name="senhaConfirm" required="required">

                        <?php if (!empty($senhaErro)): ?>
                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <?php endif; ?>

                    </div>
                </div>
            </div> <!-- end .row -->

            <!-- SUBMIT -->
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" id="submit" class="btn btn-default">Cadastrar</button>

                        <!-- Caso ocorra um erro ao confirmar a senha -->
                        <?php if (!empty($senhaErro)): ?>
                            <span><?php echo $senhaErro; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- end .row -->

        </form> <!-- end form -->

    </div> <!-- end .col-sm-8 -->

</div> <!-- end .row -->

<!-- Heading oculto. Só aparece caso ocorra um cadastro -->
<h1 id="cadastro-aviso" class="bg-success">
    Usuário cadastrado com sucesso! &nbsp<span class="glyphicon glyphicon-ok"></span>
</h1>


<?php require_once("./app/template/footer.php"); ?>