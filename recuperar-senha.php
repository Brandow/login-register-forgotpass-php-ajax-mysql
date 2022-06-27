<?php
	if(isset($_GET['token']))
	{
		$token = $_GET['token'];
	}
	else
	{
		$token = '';
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Brandow Figueira">

    <title>Sistema de Login/Registro/Recuperar Senha - PHP,Mysql,Ajax</title>

	<link rel="shortcut icon" href="/assets/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>
<body>
	<div class="wrapper">
		<header class="main-header main-header-01 headroom navbar-light fixed-top default-fixed-header navbar-transparent headroom--not-bottom headroom--not-top headroom--unpinned">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<a class="navbar-brand header-navbar-brand font-16 dt" href="../home/index.html">
						<img src="/assets/img/logo.png" width="50" />
						<span class="text-black poppins">Brandow Figueira</span>
					</a>
					<div class="nav flex-column flex-lg-row d-none d-lg-flex">
						<ul class="navbar-nav ms-auto align-items-center">
							<li class="nav-item">
								<div class="only-icon only-icon-lg text-facebook">
									<i class="lab la-facebook-square"></i>
								</div>
							</li>
							<li class="nav-item">
								<div class="only-icon only-icon-lg text-linkedin">
									<i class="lab la-linkedin"></i>
								</div>
							</li>
							<li class="nav-item">
								<div class="only-icon only-icon-lg text-instagram">
									<i class="lab la-instagram"></i>
								</div>
							</li>
							<li class="nav-item">
								<div class="only-icon only-icon-lg text-black">
									<i class="lab la-github"></i>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<main>
			<section class="effect-section bg-gray-100">
				<div class="effect bg-primary effect-skew"></div>
				<div class="particles-box" id="particles-box">
				   <canvas class="particles-js-canvas-el" width="1349" height="746" style="width: 100%; height: 100%;"></canvas>
				</div>
				<div class="container position-relative">
				   <div class="row min-vh-100 align-items-center py-5">
						<div class="col-lg-6 col-xl-6 text-center">
							<img class="left-login-img" src="assets/img/login.png" title="" alt="">
						</div>
						<div class="col-12 col-lg-5 col-xl-4 py-8 ml-5 animate__animated animate__fadeInRight">
							<h2 class="text-center text-white mb-1">Recuperação de senha</h2>
							<div class="col-12 text-center">
								<span class="text-white small">Voltar para tela de </span>
								<a href="/" id="btn-registro" class="text-white small text-decoration-underline">login.</a>
							</div>
							<form id="altsenha-form">
							<div class="form-group mb-3">
									<label class="form-label rd-input-label focus not-empty text-white">Token</label> 
									<input type="text" name="token" value="<?= $token; ?>" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label class="form-label rd-input-label focus not-empty text-white">Senha</label> 
									<input type="password" name="senha" class="form-control">
								</div>
								<div class="form-group mb-3">
									<label class="form-label rd-input-label focus not-empty text-white">Confirmar senha</label> 
									<input type="password" name="re_senha" class="form-control">
								</div>
								<div class="row">
									<div class="col-sm-5 my-2">
										<button type="submit" class="btn btn-primary border w-100" href="#">
											<span class="btn-inner-text">Alterar</span>
										</button>
									</div>
								</div>
							</form>
						</div>
				   </div>
				</div>
				<div class="col-md-6 ml-5 footer-copy">
					<p class="text-black-85 small">© 2022 Login/Registro/Esqueci a senha | PHP Ajax Mysql | <i class="lab la-github"></i> <a href="https://github.com/Brandow" target="_blank" class="text-black-85 text-decoration-underline">Brandow Figueira</a></p>
				</div>
			</section>
		</main>
	</div>
	<script src="./assets/js/jquery-3.5.1.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/app.js"></script>
	<script src="./assets/js/particles.min.js"></script>
	<script src="./assets/js/particles-app.js"></script>
	<script src="./assets/js/notyf.min.js"></script>
</body>
</html>