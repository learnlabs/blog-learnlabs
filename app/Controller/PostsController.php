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
	}
?>