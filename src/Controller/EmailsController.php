<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class EmailsController extends AppController {

    public function index() {

        $email = new Email('default');

      //  $email->to('derecklledo@gmail.com')->subject('About')->send('My message -> MASTER');
        $this->set(compact('date'));
    }

    public function verifierMiseAJour() {

        $message = "Modifier vos informations sur www.gestionstages.ca/users/login";
        //la date il y a 15 jours
        $date = date('Y.m.d', strtotime("-15 days"));
        $officialsTable = TableRegistry::get('Officials');
        
        //query pour avoir les official + vieu de 15 jours et qui nont pas ete modifier
        $query = $officialsTable->find()->where(['created <=' => $date,'verifier' => 0]);
        $email = new Email('default');
        foreach ($query as $off) {
            
            $email->to($off['email'])->subject('Modifier vos informations')->send($message." ".$off['first_name']);
            
            //on change le boolean pour ne pas 
            $off['verifier'] = 1;
            return $this->redirect(['controller'=>'Officials', 'action'=>'miseAJour',$off['id']]);
           // $email->to($off['email'])->subject('Modifier vos informations')->send($message + " " + $off["first_name"]);
        }
        
    }

    public function isAuthorized($user) {
        return true;
    }

}

?>