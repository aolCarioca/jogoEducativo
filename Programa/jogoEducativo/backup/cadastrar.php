<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jogo Educativo - Cadastrar   </title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-png/">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>
<div id="corpo-form-Cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text"     name="nome_prof" placeholder="Nome Completo" maxlength="30">
        <input type="email"    name="email"     placeholder="Usuário"       maxlength="40">
        <input type="password" name="senha"     placeholder="Senha"         maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit"   value="Cadastrar">
        
    </form>
</div>
<?php
//verificar se clicou no botão
if (isset($_POST['nome_prof']))
{
    $nome_prof      = addslashes($_POST['nome_prof']);
    $email          = addslashes($_POST['email']);
    $senha          = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verifica se está preenchido
    if(!empty(nome_prof) && !empty(email) && !empty(
        senha) && !empty(confirmarSenha))
    {
        $u->conectar("db_jogo_velha_mat","localhost","root","123456");
        if($u->msgErro == "")//se está tudo ok
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome_prof, $email, $senha))
                {
                    echo "Cadastrado com sucesso! Acesse para entrar!";
                }
                else
                {
                    echo "E-mail já cadastrado!";
                }
            }
            else
            {
                echo "Senha e confirmar senha não correspondem";
            }
        } 
        else
        {
            echo "Erro: ".$u->msgErro;
        }
    } else
    {
        echo "Preencha todos os campos!";
    }   

}

?>
</body>
</html>