<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    //http://localhost/cakephpExplorer/posts/index
    //list all posts
    public function index() {
    	//sets the view variable called ‘posts’ equal to the return value of the find('all') 
    	///method of the Post model. 
    	//Our Post model is automatically available at $this->Post because we’ve followed 
    	//CakePHP’s naming conventions.
        $this->set('posts', $this->Post->find('all'));
    }

    ////http://localhost/cakephpExplorer/posts/index/view
    //view a post according to post id
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
      
        $this->set('post', $post);
    }

}

?>