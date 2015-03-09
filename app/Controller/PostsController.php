<?php
	class PostsController extends AppController{
		var $uses = array('User','Post');
		// main blog page
		public function beforeFilter() {
	        $this->Auth->allow('index');
	    }
		public function index(){
			$this->layout="blog_layout";
		}

		public function index_user(){
			$this->layout="blog_mgr";
			$posts=$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$$activeUser['User']['id'])));
			//echo $this->Form->input('mechanic_id',array('type'=>'hidden','value'=>$activeUser['User']['id']));
		}
	}
?>