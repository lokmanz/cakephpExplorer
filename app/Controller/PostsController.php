<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    //http://localhost/cakephpExplorer/posts/index OR
    //http://localhost/cakephpExplorer/posts
    //list all posts
    public function index() {
    	//sets the view variable called ‘posts’ equal to the return value of the find('all') 
    	///method of the Post model. 
    	//Our Post model is automatically available at $this->Post because we’ve followed 
    	//CakePHP’s naming conventions.
        $this->set('posts', $this->Post->find('all'));
    }

    //http://localhost/cakephpExplorer/posts/view
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

    //http://localhost/cakephpExplorer/posts/add
    //add a new post 
    //If the HTTP method of the request was POST, it tries to save the data using the Post model. 
    //If for some reason it doesn’t save, it just renders the view. 
    //   - This gives us a chance to show the user validation errors or other warnings.
    public function add() {
    	//$this->request->is() 
    	//   - takes a single argument, 
    	//   - which can be the request METHOD (get, put, post, delete) or some request identifier (ajax). 
    	//   - It is not a way to check for specific posted data. 
    	//       - For instance, $this->request->is('book') will not return true if book data was posted.
        if ($this->request->is('post')) {//check that the request if it is a HTTP POST request
        	//We call the create() method first in order to reset the model state for saving new information. 
        	//It does not actually create a record in the database, 
        	//but clears Model::$id and sets Model::$data based on your database field defaults.
            $this->Post->create();
            
            //When a user uses a form to POST data to your application, 
            //that information is available in $this->request->data. 
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

}

?>