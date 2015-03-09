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
			$posts=$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$this->Auth->user('id'))));
			$this->set('posts',$posts);
			$this->set('user',$this->Session->read('Auth'));
		}
		public function write_post(){
			$this->layout="blog_mgr";
			$this->set('user',$this->Session->read('Auth'));
			if($this->request->is('post')){
				$data=$this->data;
				$json_dt=$data['Post'];
				$data['Post']['dump']=json_encode($json_dt);
				if($this->Post->save($data)){
					$this->Session->setFlash('Post added successfully','default',array('class'=>'alert-box success radius'),'success');
	            	$this->redirect(array('controller'=>'posts','action'=>'index_user'));
				}
				else{
					$this->Session->setFlash('Sorry error occurred','default',array('class'=>'alert-box alert radius'),'error');
				}
			}
		}
		public function edit_post($id){
				$this->set('user',$this->Session->read('Auth'));
				$this->layout="blog_mgr";
				if(empty($this->data)){
	                $this->data=$this->Post->findById($id);
	            }
				else if(!$id){
					 $this->Session->setFlash("Invalid post",'default',array('class'=>'alert-box alert'),'error');
					 
				}
	            else{
	            	$data=$this->request->data;
	            	$json_dt=$data['Post'];
					$data['Post']['dump']=json_encode($json_dt);
	                if($this->Post->save($data)){
	                    $this->Session->setFlash("Post Updated Successfully",'default',array('class'=>'alert-box success'),'success');
	                    $this->redirect(array('controller'=>'posts','action'=>'index_user'));
	                }
	                else{
	                    $this->Session->setFlash("Post not Updated",'default',array('class'=>'alert-box alert'),'error');
	                 
	                }
	            }
		}
	}
?>