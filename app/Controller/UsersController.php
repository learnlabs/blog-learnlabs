<?php
	class UsersController extends AppModel{
		var $uses = array('User');
		var $helpers = array('Html','Js');
		public function beforeFilter(){
        AppController::beforeFilter();
	        // Basic setup
	        $this->Auth->authenticate = array('Form');
			
	        // Pass settings in
	        $this->Auth->authenticate = array(
	            'Form' => array('userModel' => 'User')
	        );
	        $this->Auth->allow('login','forgot_password','subscribe','register');
    	}
	}
	public function login()
	{
		$this->layout = "blog_layout";
		if($this->request->is('post'))
		{
			if($this->Auth->login()){
               $user_access_detail = $this->Session->read('Auth');
				$user_access = $user_access_detail['User']['is_active'];
				if($user_access == 1 || $user_access == "1")
				{
					$user_name = $this->Session->read('Auth')['User']['first_name'];
					$this->Session->setFlash('Welcome back!, '.$user_name,'default',array('class' =>'alert alert-success'),'good');
					$this->redirect(array('controller'=>'Users','action'=>'index'));	
				}
				else 
				{
					$this->Session->setFlash('Sorry! Your Access Denied','default',array('class' =>'alert alert-danger'),'bad');
					$this->redirect(array('controller'=>'users','action'=>'login'));
				} 
            }
            else{
            	
				$this->Session->setFlash('Invalid Username or Password','default',array('class' =>'alert alert-danger'),'bad');
				$this->redirect(array('controller'=>'users','action'=>'login'));
            }
		}
		
	}
	
	public function logout()
	{
        if($this->Auth->logout()){
            $this->redirect(array('controller'=>'users','action'=>'login'));
        }
        else{
            $this->redirect(array('controller'=>'users','action'=>'login'));
        }
    }
?>