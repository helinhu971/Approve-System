<html>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/notify.js"></script>
<script type="text/javascript" src="js/notify.js.min"></script>
</head>


<?php

// Destinatário
$para = "suporte@approvesys.com.br";

// Assunto do e-mail
$assunto = "Contato do através do site ...";

// Campos do formulário de contato
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['conteudo'];

// Monta o corpo da mensagem com os campos
$corpo = "<html><body>";
$corpo .= "Nome: $nome ";
$corpo .= "Email: $email  Mensagem: $mensagem";
$corpo .= "</body></html>";

// Cabeçalho do e-mail
$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

//Verifica se os campos estão preenchidos para enviar então o email
if (!empty($nome) && !empty($email) && !empty($mensagem)) {
    mail($para, $assunto, $corpo, $email_headers);
    echo "<script>
$('#buton').click(function (){
$.notify('mensagem enviada com sucesso');
});
</script>";
} else {
    echo "<script>
$('#buton').click(function (){
$.notify('erro');
});
</script>";
}


	

?>

</html>