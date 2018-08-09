<?php
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html prefix="og: http://ogp.me/ns#">
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- INÍCIO ENVIO DE EMAIL -->
	<?php
		 
		// Inclui o arquivo class.phpmailer.php localizado na pasta class
		require_once("assets/class/class.phpmailer.php");
		 
		// Inicia a classe PHPMailer
		$mail = new PHPMailer(true);
		 
		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		 
		$nome = $_POST['nome'];
		$empresa = $_POST['empresa'];
		$email = $_POST['email'];
		$telefone = $_POST['tel'];
		$formacontato = $_POST['contatar'];
		$mensagem = $_POST['msg'];
		$data = date('d-m-Y');

		try {
		     $mail->Host = 'smtp.djament.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
		     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		     $mail->Port       = 587; //  Usar 587 porta SMTP
		     $mail->Username = 'contato@djament.com.br'; // Usuário do servidor SMTP (endereço de email)
		     $mail->Password = 'MDdm290787*'; // Senha do servidor SMTP (senha do email usado)
		 
		     //Define o remetente
		     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
		     $mail->SetFrom('contato@djament.com.br', 'Djament'); //Seu e-mail
		     $mail->AddReplyTo('contato@djament.com.br', 'Djament'); //Seu e-mail
		     $mail->Subject = 'Contato da empresa '.$empresa.' em '.$data;//Assunto do e-mail
		 
		 
		     //Define os destinatário(s)
		     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		     $mail->AddAddress('marcelo@djament.com.br', 'Marcelo Diament');
		 
		     //Campos abaixo são opcionais 
		     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
		     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
		     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
		 
		 	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
		 
		     //Define o corpo do email
		     $mail->MsgHTML('
		     	<p>Você recebeu uma mensagem via Landing Page Seguro de Saúde para Empresas</p>
		     	<p>Confira os dados a seguir:</p>
		     	<ul>
		     		<li><b>Empresa: </b>'.$empresa.'<br/>
					<li><b>Contato: </b>'.$nome.'<br/>
					<li><b>Telefone: </b>'.$telefone.'<br/>
					<li><b>Email: </b>'.$email.'<br/>
					<li><b>Preferem contato via: </b>'.$formacontato.'<br/>
					<li><b>Mensagem: </b>'.$mensagem.'<br/>
				</ul>
					<small>Mensagem enviada em: '.$data.'<br/>
		     	'); 
		 
		     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
		     //$mail->MsgHTML(file_POST_contents('arquivo.html'));
		 
		     $mail->Send();
		     // echo "Mensagem enviada com sucesso</p>\n";
		 
		    //caso apresente algum erro é apresentado abaixo com essa exceção.
		    }catch (phpmailerException $e) {
		      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
		}
	?>
	<!-- FIM ENVIO DE EMAIL -->
	<title>Mensagem Enviada</title>
	<!-- SCHEMA.ORG -->
	<script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "url": "https://agatamacsaude.com.br",
        "logo": "https://agatamacsaude.com.br/img/common/logo.png",
        "description": "Agata Mac - Soluções em Planos de Saúde e Seguro de Saúde para Empresas | Seguro de Saúde Empresarial, Planos de Seguro Saúde Corporativo (PJ) | Consultoria e Assessoria para Empresas e departamentos de RH",
        "additionalType": "http://www.productontology.org/doc/Health_insurance_companies",
        "telephone" : "+55-11-4302-6044",
        "email" : "contato@agatamacsaude.com.br",
        "name" : "Agata Mac Saúde",
        "alternateName" : "Agata Mac | Seguro Saúde para Empresas",
        "address" : {
          "@type" : "PostalAddress",
          "streetAddress" : "Alameda Grajaú, 129, 8º andar, conjunto 809 – Alphaville",
          "addressLocality" : "Barueri",
          "addressRegion" : "São Paulo",
          "postalCode" : "06454-050"
        },
        "sameAs" : [ "https://www.facebook.com/agatamacsaude" ],
        "contactPoint": [{
          "@type": "ContactPoint",
          "telephone": "+55-11-4302-6044",
          "contactType": "customer service"
        }]
      }
    </script>
	<!-- META DATA OG -->
    <meta property="og:site_name" content="Agata Mac | Seguro Saúde para Empresas">
    <meta property="og:title" content="Agata Mac Saúde">
    <meta property="og:description" content="Agata Mac - Soluções em Planos de Saúde e Seguro de Saúde para Empresas | Seguro de Saúde Empresarial, Planos de Seguro Saúde Corporativo (PJ) | Consultoria e Assessoria para Empresas e departamentos de RH">
    <meta property="og:url" content="https://agatamacsaude.com.br">
    <meta property="og:locale" content="pt-BR">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://agatamacsaude.com.br/img/common/logo.png">
    <meta property="og:image:alt" content="Agata Mac Seguro Saúde para Empresas">
    <meta property="og:image:url" content="https://agatamacsaude.com.br/img/common/logo.png">
    <meta property="og:image:type" content="img/png">
    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="https://agatamacsaude.com.br/img/common/logo.png">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="https://agatamacsaude.com.br/img/common/logo.png">
	<!-- META DATA -->
	<meta name="title" content="Agata Mac | Seguros Saúde para Empresas | Mensagem Enviada">
	<meta name="author" content="Djament Comunicação">
	<meta name="description" content="Agata Mac - Soluções em Planos de Saúde e Seguro de Saúde para Empresas | Seguro de Saúde Empresarial, Planos de Seguro Saúde Corporativo (PJ) | Consultoria e Assessoria para Empresas e departamentos de RH">
	<meta name="keywords" content="plano de saúde para empresa, seguro de saúde para empresa, seguro saúde pj, plano de saúde corporativo, seguros para empresa, consultoria em seguros">
	<meta name="robots" content="index,follow">
	<meta name="theme-color" content="#0085c4">
	<meta name="reply-to" content="contato@agatamacsaude.com.br">
	<link defer ="defer" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script defer="defer" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script defer="defer" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link defer="defer" href="https://fonts.googleapis.com/css?family=Anton|Poiret+One|Raleway|Marcellus" rel="stylesheet">
	<link defer="defer" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="bodyobrigado" class="container-fluid">
	<main id="obrigado" class="row">
		<section id="obrigado-topo" class="col-12">
			<article>
				<img src="assets/img/common/logo.png" alt="Agata Mac Saúde - Seguro Saúde PJ" title="Agata Mac Saúde | Especialista em Seguro Saúde para Empresas" width="60px" height="auto">
				<h2 id="agatamac">Agata Mac</h2>
			</article>
		</section>
		<section>
			<article>
				<h2>Obrigado, mensagem enviada!</h2>
				<h1>Entraremos em contato com <?php echo $nome; ?> para falarmos sobre o <strong>Seguro de Saúde da <?php echo $empresa; ?></strong>
					<?php if ($_POST['contatar']){ ?>
						através do
							<?php
								if ($_POST['contatar'] == 'telefone'){
									echo '
										telefone '.$_POST['tel'].'.';
								} else {
									echo '
										e-mail '.$_POST['email'].'.';
								}
							?>
				</h1>
				<?php
					} else {
						echo '<p>Entraremos em contato em breve!</p>';
					}
				?>
				<br/>
				<p>Se preferir, entre em contato diretamente conosco:</p>
				<br/>
				<div>
					<a title="Ligar para Agata Mac" rel="nofollow" hreflang="pt" target="_blank" href="tel:+551143026044"><i class="fa fa-phone"></i> (11) 4302-6044</a>
					<br/>
					<a title="Ligar ou enviar mensagem para Agata Mac" rel="nofollow" hreflang="pt" target="_blank" href="tel:+5511942880299"><i class="fab fa-whatsapp"></i> (11) 94288-0299</a>
					<br/>
					<a title="Enviar um email para Agata Mac" rel="nofollow" hreflang="pt" target="_blank" href="mailto:contato@agatamacsaude.com.br?cc=acmarcelo@terra.com.br&subject=Contato%20via%20Landing%20Page%20Seguro%20Saude"><i class="fa fa-envelope"></i> contato@agatamacsaude.com.br</a>
					<br/>
					<a title="Acessar o site da Agata Mac (nova aba/guia)" rel="noopener" hreflang="pt" target="_blank" href="https://agatamacsaude.com.br"><i class="fas fa-globe"></i> agatamacsaude.com.br</a>
					<br/>
				</div>
			</article>
		</section>
	</main>
</body>
</html>