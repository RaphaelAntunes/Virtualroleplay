<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>

<body>
	<?php
	session_start();
	$mail = $_GET['key'];
	$user = $_GET['id'];

	$decode = base64_decode($mail);
	//$link = "localhost/v/confirm_email.php?key=".$mail."";
	$link = "http://virtualroleplay.xyz/login/confirm_email.php?key=" . $mail . "";
	//Inicio Enviar e-mail
	require 'PHPMailer/PHPMailerAutoload.php';

	$Mailer = new PHPMailer();

	//Define que será usado SMTP
	$Mailer->IsSMTP();

	//Enviar e-mail em HTML
	$Mailer->isHTML(true);

	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';

	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';

	//nome do servidor
	$Mailer->Host = 'mail.virtualroleplay.xyz';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;

	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'noreply@virtualroleplay.xyz';
	$Mailer->Password = 'K^#F[*]m=Mte';

	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'noreply@virtualroleplay.xyz';

	//Nome do Remetente
	$Mailer->FromName = 'VirtualRP';

	//Assunto da mensagem
	$Mailer->Subject = 'Confirme sua conta';

	//Corpo da Mensagem
	$mensagem = "Olá, user. Bem-Vindo ao Virtual Roleplay. <br>";
	$mensagem .= "É um passo bem simpes, basta confirmar seu e-mail e terá acesso a fazer sua Whitelist!<br> ";
	$mensagem .= "<a href=" . $link . ">Clique aqui para confirmar seu e-mail</a><br>";

	$Mailer->Body = $mensagem;

	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';

	//Destinatario 
	$Mailer->AddAddress($decode);

	if ($Mailer->Send()) {
		$_SESSION['callback'] = "Um e-mail de confirmação foi enviado para você, verifique sua caixa de e-mail";
		$_SESSION['user'] = $user;
		echo "<script>location.href='process.php'</script>";
	} else {
		$_SESSION['callback'] = "Um erro ocorreu, entre em contato com a STAFF";
		echo "<script>location.href='index.php'</script>";
	}

	//Fim Enviar e-mail


	?>


</body>

</html>