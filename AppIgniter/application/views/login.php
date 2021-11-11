
<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- GETTING STARTED -->
<div class="all box-center box-column">
    <?php echo form_open('/Login/checkLogin',["class" => "box-column box-center"]); ?>
	<h1>Login</h1>
        <div class="boxRow box-y-center">
			<i class="material-icons">person</i>
			&nbsp;
		<?php
			echo form_input([
				"class" => "login_input",
				"type"  => "text",
				"name"  => "username",
				"placeholder"  => "username",
			]);

		?>
		</div>
		
		<div class="boxRow box-y-center">
		<i class="material-icons">vpn_key</i>
		&nbsp;
		<?php
			echo form_input([
				"class" => "login_input",
				"type"  => "password",
				"name"  => "password",
				"placeholder"  => "password",
			]);
		?>
		</div>
		<input class="login_btn" type="submit" value="Login">    

    <?php
	 
		if(isset($error))
			echo "<div style='padding:20px' class='txt_error'>$error</div>";

	 	echo form_close(); 
	?>
</div>