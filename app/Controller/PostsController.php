<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    	//sets the view variable called ‘posts’ equal to the return value of the find('all') 
    	///method of the Post model. 
    	//Our Post model is automatically available at $this->Post because we’ve followed 
    	//CakePHP’s naming conventions.
        $this->set('posts', $this->Post->find('all'));
    }
}

?>