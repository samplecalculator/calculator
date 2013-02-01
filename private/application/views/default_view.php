<?php echo(doctype('xhtml11')); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<?php echo(meta('Content-type','text/html; charset=utf-8', 'equiv')); ?>
	<title><?php echo($PageTitle); ?></title>
	<!-- css -->
	<?php echo link_tag('resources/css/reset.css','media ="screen"'); ?>
	<?php echo link_tag('resources/css/960.min.css','media ="screen"'); ?>
	<?php echo link_tag('resources/css/screen.css','media ="screen"'); ?>
	<!-- css -->
	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="<?php echo base_url('resources/js/placeholer.js'); ?>"></script>
	<script>
		$(document).ready(function(){
			$("#welcome-info").hide(0).delay(500).fadeIn(3000);
			$('.tip').hide();
			$('.tip2').hide();
			$('input[name="username"]').on("keyup", function(){
				if(this.value != ""){
				$('.tip').show();
				}else{
					$('.tip').hide();
				}
			}).on("blur", function(){
				$('.tip').hide();
			});			
			$('input[name="password"]').on("keyup", function(){
				if(this.value != ""){
				$('input[name="passwordconfirmation"]').show();
				$('.tip2').show();
				}else{
					$('input[name="passwordconfirmation"]').hide();
					$('.tip2').hide();
				}
			});
			
			$('button[name="signup"]').on("click", function(){
				$('.signin').hide();
				$('.signup').show();
			});
			$('button[name="signin"]').on("click", function(){
				$('.signup').hide();
				$('.signin').show();
			});
		});
	</script>
	<!-- javascript -->
</head>
<body>
	<div id="container" class="container_12">
		<div id="application-content" class="grid_8">
			<div id="welcome-splash">
				<div class="img">
				<div id="welcome-info">
					<h1><?php echo $welcomePage['h1']?></h1>
					<h2><?php echo $welcomePage['h2']?></h2>
					<h3><?php echo $welcomePage['h3']?></h3>
				</div>
				</div>
			</div>
		</div>
		<div id="sign-up" class="grid_4">
			<ul class="menu">
				<li><button name="signup" type="button" class= select>Sign up</button></li>
				<li><button name="signin" type="button" class= select2>Sing in</button></li>				
			</ul>
			<div class="signup">
			<?php echo(form_open("calculator/signup")); ?>
			<?php
			$user = "placeholder = \"".$username['value']."\"".' class="text grid_3"';
			$mail = "placeholder = \"".$email['value']."\"".' class="text grid_3"';
			$pass = "placeholder = \"".$password['value']."\"".' class="text grid_3"';
			$passcon = "placeholder = \"".$passwordconfirmation['value']."\"".' class="text grid_3 hidden"';
			
			echo(form_input($username['name'],set_value('username'),$user));
			echo (form_error($username['name'],'<p class="error">','</p>'));
			echo('<p class="tip"> Tip: must be at least 8 characters in length and only alpha numeric characters.</p>');
						
			echo(form_input($email['name'],set_value('email'),$mail));
			echo form_error($email['name'],'<p class="error">','</p>');
			
			echo(form_password($password['name'],set_value('password'),$pass));
			echo form_error($password['name'],'<p class="error">','</p>');
			echo('<p class="tip2"> Tip: must be at least 8 characters in length and only alpha numeric characters.</p>');
			
			echo(form_password($passwordconfirmation['name'],set_value('passwordconfirmation'),$passcon));
			echo form_error($passwordconfirmation['name'],'<p class="error">','</p>');
			
			echo(form_submit($submit['name'],$submit['value'],'class="submit"'));?>
			<?php echo(form_close());?>
			</div>
			<div class="signin hidden">
			<?php echo(form_open("calculator/signin")); ?>
			<?php
			$reguser = "placeholder = \"".$username['reg']."\"".' class="text grid_3"';
			$regpass = "placeholder = \"".$password['reg']."\"".' class="text grid_3"';
			
			echo(form_input($username['name'],set_value('username'),$reguser));
			echo form_error($username['name'],'<p class="error">','</p>');
			
			echo(form_password($password['name'],set_value('password'),$regpass));
			echo form_error($password['name'],'<p class="error">','</p>');
			
			echo(form_submit($submit['name'],'Sign in!','class="submit2"'));?>
			<?php echo(form_close());?>
			</div>
			
		</div>
	</div>
</body>
<script>
$(document).ready(function(){
 setPlaceholderText();
});
</script>
</html>