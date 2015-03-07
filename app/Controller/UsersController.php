<?php
	class UsersController extends AppModel{
		var $uses = array('User');
		var $helpers = array('Html','Js');
	}
?>