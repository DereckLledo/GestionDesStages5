<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Officials Controller
 *
 * @property \App\Model\Table\OfficialsTable $Officials
 *
 * @method \App\Model\Entity\Official[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfficialsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $officials = $this->paginate($this->Officials);

        $this->set(compact('officials'));
    }

    /**
     * View method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);

        $this->set('official', $official);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $official = $this->Officials->newEntity();
        if ($this->request->is('post')) {
            $official = $this->Officials->patchEntity($official, $this->request->getData());

            $official->user_id = $this->Auth->user('id');

            if ($this->Officials->save($official)) {
                $this->Flash->success(__('The official has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The official could not be saved. Please, try again.'));
        }
        $this->set(compact('official'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $official = $this->Officials->patchEntity($official, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            
            $official['verifier'] = 1;
            if ($this->Officials->save($official)) {
                $this->Flash->success(__('The official has been saved.'));

                //TODO: Rediriger vers le view du official qui vient d'être modifier
                return $this->redirect('\\');
            }
            $this->Flash->error(__('The official could not be saved. Please, try again.'));
        }
        $this->set(compact('official'));
    }

    public function miseAJour() {
    	
    	$message = "Modifier vos informations sur www.gestionstages.ca/users/login";
    	//la date il y a 15 jours
    	$date = date('Y.m.d', strtotime("-15 days"));
    	
    	//query pour avoir les official + vieu de 15 jours et qui nont pas ete modifier
    	$query = $this->Officials->find()->where(['created <=' => $date, 'verifier' => 0]);
    	$email = new Email('default');
    	foreach ($query as $off) {
    		
    		
    		$email->setTo($off['email'])->setSubject('Modifier vos informations')->send($message . " " . $off['first_name']);
    		
    		
    		$official = $this->Officials->get($off['id'], [
    				'contain' => []
    		]);
    		
    		$official['verifier'] = 1;
    		
    		
    		
    		if ($this->Officials->save($official)) {
    		}
    	}
    }

    public function modifier() {
        //id du user connecté
        $id_user = $this->Auth->user('id');


        $officialsTable = TableRegistry::get('Officials');
        $query = $officialsTable->find()->select(['id'])->where(['id_user' => $id_user]);

        foreach ($query as $row) {
            $id_official = $row['id'];
        }
        //redirection
        return $this->redirect('/Officials/Edit/' . $id_official);
    }

    /**
     * Delete method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $official = $this->Officials->get($id);
        if ($this->Officials->delete($official)) {
            $this->Flash->success(__('The official has been deleted.'));
        } else {
            $this->Flash->error(__('The official could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {


        $action = $this->request->getParam('action');
        
        
        if (in_array($action, ['miseAJour'])) {
        	return true;
        }

        //coordinators ont le droit de modifier les officials
        if ($user['type'] == "1") {
            return true;

            //les Officials ont seulement le droit de modifier leur propres profil
        } else if ($user['type'] == "2") {
        	
        	// authorize l'access a modifier() pour les officials
        	if (in_array($action, ['modifier']) && $user['type'] == "2") {
        		return true;
        	}

            if (in_array($action, ['view', 'edit'])) {

                $id_official = $this->request->getParam('pass.0');
                $id_user = $user['id'];

                $official = $this->Officials->get($id_official, [
                    'contain' => []
                ]);

                //si la foreing key du official 'id_user' est = au ID du user en cours, il est autorisé à modifier
                if ($official['id_user'] == $id_user) {
                    return true;
                } else {
                    return false;
                }
            }
        } else if ($user['type'] == "0") {
            return false;
        }


        

        return false;
    }

}
