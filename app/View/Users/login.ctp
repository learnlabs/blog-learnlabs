<br/>
<br/>
<div class="row">
	<div class="large-4 medium-6 small-8 colums medium-offset-3 small-offset-2 large-offset-4">
		<div class='panel'>
		<h3> Login </h3>
		<hr/>
		<?php
			echo $this->Form->create('User',array('controller'=>'users','action'=>'login'));
			echo $this->Form->input('username',array(
				'placeholder'=>'Email',
				'label'=>false,
				'type'=>'email',
				'required'
			));
			echo $this->Form->input('password',array(
				'placeholder'=>'Password',
				'label'=>false,
				'type'=>'password',
				'required'
			));
			echo $this->Form->input('Login',array(
				'type'=>'submit',
				'div'=>false,
				'label'=>false,
				'class'=>'button expand small radius'
			));
			echo $this->Form->end();
			echo $this->Html->link('Forgot Passord ?',array('controller'=>'users','action'=>'forgot_password'),array('class'=>'center-text-2'));
		?>
		</div>
		<div class='auth-alert'>
		<?php echo "<div style='color:red'>".$this->Session->flash('auth'); ?>
		</div>
	</div>
</div>