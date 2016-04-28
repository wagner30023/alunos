<?php require_once("./app/template/header.php"); ?>

<div class="row">
<h4> Bem vindo.</h4>
    <!-- ITEM LISTAR -->
    <div class="col-sm-offset-1 col-sm-5 text-center">
        <div class="item">
            
            <div class="sprite sprite-listar"></div>
            <h2>Listar Usuários</h2>
            <p class="item-descricao">Liste todos os usuários que estão cadastrados no sistema atualmente. Através da listagem, é possível obter informações dos cadastrados, como matrícula, nome e e-mail. Além disso, há a funcionalidade de editar ou remover algum usuário.</p>
            <a href="listar.php?active=listar" class="btn btn-primary item-link">Listar</a>
        </div>
    </div> <!-- end .col-sm-5 -->

    <!-- ITEM CADASTRAR -->
    <div class="col-sm-5 text-center">
        <div class="item">
            <div class="sprite sprite-cadastrar"></div>
            <h2>Cadastrar novo Usuário</h2>
            <p class="item-descricao">Para cadastrar um novo usuário, é necessário informar seus dados pessoais e uma senha. Após o cadastro, será gerado um número de matrícula automaticamente, e o mesmo aparecerá na lista dos usuários cadastrados.</p>
            <a href="cadastrar.php?active=cadastrar" class="btn btn-primary item-link">Cadastrar</a>
        </div>
    </div><!-- end .col-sm-5 -->

    <div class="col-sm-offset-1"></div>

</div> <!-- end .row -->

<?php require_once("./app/template/footer.php"); ?>