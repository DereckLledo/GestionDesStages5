<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class EmailsController extends AppController {

    public function index() {

        //  $email->to('derecklledo@gmail.com')->subject('About')->send('My message -> MASTER');

    }
    
    
    public function initialize() {
    	parent::initialize();
    	$this->Auth->allow(['index']);
    }

    public function verifierMiseAJour() {

         $this->redirect(['controller'=>'Officials', 'action'=>'miseAJour']);      
    }

    public function isAuthorized($user) {
    	
    	
    	if (in_array($action, ['verifierMiseAJour', 'index'])) {
    		return true;
    	}
        return true;
    }

}

?>