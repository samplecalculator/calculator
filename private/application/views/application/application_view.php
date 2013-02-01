<?php echo(doctype('xhtml11')); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<?php echo(meta('Content-type','text/html; charset=utf-8', 'equiv')); ?>
	<title><?php echo($PageTitle); ?></title>
	<!-- css -->
	<?php echo link_tag('resources/css/reset.css','media ="screen"'); ?>
	<?php echo link_tag('resources/css/960.min.css','media ="screen"'); ?>
	<?php echo link_tag('resources/css/screen.css','media ="screen"'); ?>
	<!--[if lte IE 9]>
	<style type="text/css">
	.operator{
		background-color:  rgb(91,167,64) !important;
	}
	</style>
	<![endif]-->
	<!-- css -->
	<!-- javascript -->
	<script src="<?php echo base_url('resources/js/calculator.js'); ?>"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
    		$("#container").hide(0).delay(500).fadeIn(3000);
    		$(".tip3").hide(0).delay(100).fadeIn(3000);
    		$('input[name="signout"]').on("click", function(){
				$("#container").hide(0).delay(500).fadeOut(3000);
			});
    		
		});
	</script>
	<!-- javascript -->
</head>
<body>
	<!-- Application Container -->
	<div id="container" class="container_12">
		<!-- Application -->
		<div id="application-content" class="grid_8 noshow">
			<div id="calculator" class="grid_6">
				<div id="calculator-top">
					<input class="grid_5" id="screen" type="text" onkeypress="enter(this,event);" />
				</div>
				<div id="calculator-middle">
					<div class="rows grid_5">
						<span class="cell m_cell_r">
							<input type="button" value=7 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=8 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=9 onclick="getInput(this.value);" />
						</span>
						<span class="cell">
							<input class="operator" type="button" value='*' onclick="getInput(this.value);" />
						</span>
					</div>
					<div class="rows grid_5">
						<span class="cell m_cell_r">
							<input type="button" value=4 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=5 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=6 onclick="getInput(this.value);" />
						</span>
						<span class="cell">
							<input class="operator" type="button" value='/' onclick="getInput(this.value);" />
						</span>
					</div>
					<div class="rows grid_5">
						<span class="cell m_cell_r">
							<input type="button" value=1 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=2 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value=3 onclick="getInput(this.value);" />
						</span>
						<span class="cell">
							<input class="operator" type="button" value='-' onclick="getInput(this.value);" />
						</span>
					</div>
					<div class="rows grid_5">
						<span class="cell m_cell_r">
							<input type="button" value=0 onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r fix">
							<input type="button" value='.' onclick="getInput(this.value);" />
						</span>
						<span class="cell m_cell_r">
							<input type="button" value='=' onclick="processInput(document.getElementById('screen').value);"/>
						</span>
						<span class="cell">
							<input class="operator" type="button" value='+' onclick="getInput(this.value);" />
						</span>
					</div>
				</div>
				<div id="calculator-bottom">
					<input class="inline" type="button" value='clean' onclick="getInput(this.value);"/>
				</div>
			</div>
		</div>
		<div id="sign-up" class="grid_4">
			<ul class="menu">
				<li><button name="signup" type="button" class= select><?php 
					foreach ($information as $part) :
   					echo 'Welcome '. $part->username;
    				endforeach;						
					?></button></li>
			</ul>
			<div class="signup">
			<?php echo(form_open('calculator/signout'));
				echo(
					'<p class="tip3">The Purpose of this application is to make an online calculator that could be used by anyone register, and provide mathematical assistence when needed.</p>'
				);
				echo(form_submit('signout','Sign out!','class="submit"'));?>			
			<?php echo(form_close());?>
			</div>
		</div>
		</div>
</body>
</html>