<?php
	class UsersController extends AppController{
		var $uses = array('User','Post');
		var $helpers = array('Html','Js');
		public function beforeFilter() {
	        parent::beforeFilter();
			$this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'index');
			$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
			$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
			
			 // Basic setup
	        $this->Auth->authenticate = array('Form');
	
	        // Pass settings in
	       $this->Auth->authenticate = array(
	            'Form' => array('userModel' => 'User')
	        );
	        $this->Auth->allow('login','forgot_password','subscribe');
	    }
	
		
		public function login(){
			
			$this->layout='blog_layout';
			// $a=array();
			// $a['name']='Lakhan Samani';
			// $a['email']='lakhan.m.samani@gmail.com';
			// $a['password']='123456';
			// $this->User->save($a);
			if($this->Session->check('Auth.User')){
				$this->redirect(array('action' => 'index'));		
			}
			
			// if we get the post information, try to authenticate
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$this->Session->setFlash('Successfully logged in','default',array('class'=>'alert-box success radius'),'success');
					$this->redirect($this->Auth->redirectUrl());
					
				} else {
					$this->Session->setFlash('Invalid username or password','default',array('class'=>'alert-box alert radius'),'error');
				}
			} 
		}
		 public function logout(){
	        if($this->Auth->logout()){
	        	$this->Session->setFlash('Successfully Logged out of the system','default',array('class'=>'alert-box success radius'),'success');
	            $this->redirect(array('controller'=>'users','action'=>'login'));
	        }
	        else{
	            die('Sorry incorrect.');
	        }
	    }
	}
?>