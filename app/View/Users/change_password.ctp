<br/>
<br/>
<div class="row">
	<div class="large-5 medium-6 small-8 colums medium-offset-3 small-offset-2 large-offset-4 panel">
		<h2> Change Password </h2>
		<?php
			echo $this->Form->create('User',array('controller'=>'users','action'=>'change_password'));
			echo $this->Form->input('user_id',array(
				'type'=>'hidden',
				'div'=>false,
				'value'=>$user['User']['id']
			));
			echo $this->Form->input('newpassword',array(
				'placeholder'=>' New Password',
				'label'=>false,
				'type'=>'password',
				'required'
			));
			
			echo $this->Form->input('Change Password',array(
				'type'=>'submit',
				'div'=>false,
				'label'=>false,
				'class'=>'button expand small radius'
			));
			echo $this->Form->end();
		?>
	</div>
</div>