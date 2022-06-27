<?php

	use PHPMailer\PHPMailer\PHPMailer;
	class User 
	{
		public static function Login()
		{
			global $db,$config;

			if (!empty($_POST['email']))
			{
				if (!empty($_POST['senha']))
				{
					$stmt = $db->prepare("SELECT email, senha FROM usuarios WHERE email = :email");
					$stmt->bindParam(':email', $_POST['email']);
					$stmt->execute();
					if($stmt->RowCount() >= 1)
					{
						$row = $stmt->fetch();
						if(password_verify($_POST['senha'], $row['senha']))
						{
							echo 'ok';
						}
						else
						{
							echo 'Senha incorreta';
						}
					}
					else
					{
						echo 'Usuário não encontrado';
					}
				}
				else
				{
					echo 'Preencha o campo senha';
				}
			}
			else
			{
				echo 'Preencha o campo email';
			}
		}

		public static function Cadastro()
		{
			global $db,$config;

			if (!empty($_POST['email']))
			{
				if (!empty($_POST['senha']))
				{
					if (!empty($_POST['re_senha']))
					{
						if (strlen($_POST['senha']) >= 6)
						{
							if ($_POST['senha'] == $_POST['re_senha'])
							{
								$stmt = $db->prepare("SELECT email, senha FROM usuarios WHERE email = :email");
								$stmt->bindParam(':email', $_POST['email']);
								$stmt->execute();
								if(!$stmt->RowCount() >= 1)
								{
									$senhacript = self::CriptSenha($_POST['senha']);
									$stmt = $db->prepare("INSERT INTO usuarios (email,senha) VALUES (:email,:senha)");
									$stmt->bindParam(':email', $_POST['email']);
									$stmt->bindParam(':senha', $senhacript);
									$stmt->execute();
									echo 'ok';
								}
								else
								{
									echo 'Email ja cadastrado';
								}
							}
							else
							{
								echo 'A senha e confirmação de senha não são iguais.';
							}
						}
						else
						{
							echo 'Sua senha precisa ter no mínimo 6 caracteres';
						}
					}
					else
					{
						echo 'Preencha o campo confirme a senha';
					}
				}
				else
				{
					echo 'Preencha o campo senha';
				}
			}
			else
			{
				echo 'Preencha o campo email';
			}
		}

		public static function CriptSenha($password)
		{	
			return password_hash($password, PASSWORD_DEFAULT);
		}

		public static function EsqueciSenha()
		{	
			global $db,$config;
			if (!empty($_POST['email']))
			{
				$stmt = $db->prepare("SELECT email, senha FROM usuarios WHERE email = :email");
				$stmt->bindParam(':email', $_POST['email']);
				$stmt->execute();
				if(!$stmt->RowCount() == 0)
				{
					$token = bin2hex(random_bytes(50));
					$stmt = $db->prepare("UPDATE usuarios SET token = :token WHERE email = :email ");
					$stmt->bindParam(':email', $_POST['email']);
					$stmt->bindParam(':token', $token);
					$stmt->execute();

					$mail = new PHPMailer();
					$mail->CharSet = "utf-8";
					$mail->isSMTP();
					$mail->Host = $config['SMTP_host'];
					$mail->SMTPAuth = true;
					$mail->Username = $config['SMTP_user'];
					$mail->Password = $config['SMTP_senha'];
					$mail->SMTPSecure = 'tls';
					$mail->Port = $config['SMTP_porta'];
					$mail->setFrom('brandow.sony@gmail.com', 'Brandow');
					$mail->addAddress($_POST['email'], '');
					$mail->Subject = 'Recuperação de senha - Projeto PHP Ajax Mysql';
					$mailContent = 'Recuperar senha: <a href="http://192.168.0.219/recuperar-senha.php?token="'.$token.'" target="_blank">Clique aqui</a><br>Seu token: '.$token;
					$mail->Body = $mailContent;

					if($mail->send()){
						echo 'ok';
					}else{
						echo 'Erro: ' . $mail->ErrorInfo;
					}
				}
				else
				{
					echo 'E-mail informado não foi cadastrado.';
				}
			}
			else
			{
				echo 'Preencha o campo com e-mail.';
			}
		}

		public static function Altsenha()
		{	
			global $db,$config;

			if (!empty($_POST['token']))
			{
				if (!empty($_POST['senha']))
				{
					if (!empty($_POST['re_senha']))
					{
						if (strlen($_POST['senha']) >= 6)
						{
							if ($_POST['senha'] == $_POST['re_senha'])
							{
								$stmt = $db->prepare("SELECT email, token FROM usuarios WHERE token = :token");
								$stmt->bindParam(':token', $_POST['token']);
								$stmt->execute();
								if(!$stmt->RowCount() == 0)
								{
									$row = $stmt->fetch();
									$senhacript = self::CriptSenha($_POST['senha']);
									$stmt = $db->prepare("UPDATE usuarios SET senha = :senha, token = '' WHERE email = :email");
									$stmt->bindParam(':senha', $senhacript);
									$stmt->bindParam(':email', $row['email']);
									$stmt->execute();
									echo 'ok';
								}
								else
								{
									echo 'Token inválido.';
								}
							}
							else
							{
								echo 'A senha e a confirmação precisam ser iguais.';
							}
						}
						else
						{
							echo 'Sua senha precisa ter no mínimo 6 caracteres.';
						}
					}
					else
					{
						echo 'Preencha o campo confirmação de senha.';
					}
				}
				else
				{
					echo 'Preencha o campo senha.';
				}
			}
		}
	}
?>