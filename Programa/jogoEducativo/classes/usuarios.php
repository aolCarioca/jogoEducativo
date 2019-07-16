<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome,$host, $usuario, $senha)
    {
        global $pdo;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$
            email, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        

    } 

    public function cadastrar($nome_prof, $email, $senha)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql->$prepare("SELECT id_prof FROM tbl_prof 
            WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();       
        if($sql->rowCount() > 0)
        {
            return false; // usuário já cadastrado
        } else{
            //caso não Cadastrar
           $sql = $pdo->prepare("INSERT INTO tbl_prof (nome_prof,
             login, senha) VALUE (:n, :e, :s)");
              $sql->bindValue(":n",$nome_prof);
              $sql->bindValue(":e",$email);
              $sql->bindValue(":s",$senha);
              $sql->excute();
              return true;   
        }        
    }

    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_prof FROM tbl_prof
            WHERE email = :e AND senha = :s");
        $sql->bindValue(" :e",$email);
        $sql->bindValue(" :s",$senha);     
        $sql->execute();   
        if($sql->rowCount() > 0){ 
            //entrar no sistema(sessão)     
            $dado = $sql->fecth(key);
            session_start();
            $_SESSION['id_prof'] = $dado['id_prof'];
            return true; //logado com sucesso
        }else{
            return false; // não foi possivel logar
        }            
        
    }
}

?>