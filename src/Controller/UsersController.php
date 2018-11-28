<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Core\Exception\Exception;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\StudentsTable $Students
 * @property \App\Model\Table\CoordinatorsTable $Coordinators
 * @property \App\Model\Table\OfficialsTable $Officials
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'add', 'recover', 'changePw']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                if ($user['type'] == 0) {
                    $studentsTable = TableRegistry::get('Students');
                    $student = $studentsTable->newEntity();
                    $student->id_user = $user['id'];
                    $student->email = $this->request->getData('email');
                    $studentsTable->save($student);
                } else if ($user['type'] == 1) {
                    $coordinatorsTable = TableRegistry::get('Coordinators');
                    $coordinator = $coordinatorsTable->newEntity();
                    $coordinator->id_user = $user['id'];
                    $coordinatorsTable->save($coordinator);
                } else if ($user['type'] == 2) {
                    $officialsTable = TableRegistry::get('Officials');
                    $official = $officialsTable->newEntity();
                    $official->id_user = $user['id'];
                    $official->email = $this->request->getData('email');
                    $officialsTable->save($official);
                }

                return $this->redirect('\\');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function changePw($id = null) {

        try {
            
            $user = $this->Users->get($id);
            $data = $this->request->getData();
            
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    // Added: Disable modification of user_id.
                    'accessibleFields' => ['user_id' => false]
                ]);

                if ($data['password'] == $data['confirm_password']) {



                    if ($this->Users->save($user)) {

                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect("\\");
                    }
                } else {
                    $this->Flash->error(__('Password and confirm password do not match.'));
                }
            }
        } catch (Exception $ex) {
            $this->Flash->error(__('ID INTROUVABLE'));
            return $this->redirect("\\");
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // In src/Controller/UsersController.php
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

//     			if ($user['type'] == 0) {
//     				return $this->redirect("/Students/Edit/" . $user['id']);
//     			}
                return $this->redirect("\\");
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function recover() {

        if ($this->request->is('post')) {

            $email = $this->request->data(['email']);

            //verifier le email
            if (!empty($email)) {
                $studentsTable = TableRegistry::get('Students');

                // on verifie si il y a un etudiants associer avec le email
                $student = $studentsTable->find()->where(['email' => $email])->first();

                if (!empty($student)) {

                    $user = $this->Users->get($student['id_user']);

                    $this->Flash->success('Bravo.' . $user['username']);

                    //envoyer un email pour informer l'employeur du retrait de l'application.
                    $courriel = new Email('default');
                    $message = "Bonjour " . $student['first_name'] . " " . $student['last_name'] . ", vous pouvez modifier votre mot de passe sur ce lien: "
                            . ""
                            . "localhost/GestionDesStages/users/changePw/" . $user['id'];
                    $courriel->setTo($student['email'])->setSubject('Modifier le mot de passe')->send($message);
                } else {
                    $this->Flash->error('Email do not match.');
                }
            } else {
                $this->Flash->error('Email empty.');
            }

            /*
              //prendre la donnée du email
              if (email) {
              //envoyer un email si il est présent dans la liste de users
              // return $this->redirect("\\");
              }
             */

            // $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function isAuthorized($user) {

        $action = $this->request->getParam('action');

        if ($user['type'] == "1") {
            return true;
        } else if (in_array($action, ['logout'])) {
            return true;
        } else {
            return false;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $internshipOffer = $this->InternshipOffers->get($id);
        return $internshipOffer->user_id === $user['id'];
    }

}
