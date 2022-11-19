<?php
include 'header.php';

if (isset($_POST['campo_email']) && isset($_POST['campo_senha']) && isset($_POST['campo_aceito'])) {
    echo '<div class= "alert alert-success my-5">Seu cadastro foi realizado com sucesso!</div>';
    $sql = "insert into users (email, pass) values (:email, :senha)";
    $stmt = $pdo->prepare($sql);

    $password = $_POST['campo_senha'];
    $password = md5(KEY . $password);

    $stmt->bindParam(':email', $_POST['campo_email']);
    $stmt->bindParam(':senha', $password);
    $stmt->execute();
}
?>

<div class="container">
    <form method="post">
        <div class="mb-3">
            <label for="input_email" class="form-label">Digite seu e-mail</label>
            <input type="email" name="campo_email" class="form-control" id="input_email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Digite seu e-mail para o cadastro, não compartilhamos dados pessoais.</div>
        </div>
        <div class="mb-3">
            <label for="input_senha" class="form-label">Digite sua Senha</label>
            <input type="password" name="campo_senha" class="form-control" id="input_senha">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="campo_aceito" class="form-check-input" id="input_termos">
            <label class="form-check-label" for="input_termos">Estou de acordo com a <a href="politica-de-privacidade.php">política de privacidade</a></label>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php
include 'footer.php';
?>