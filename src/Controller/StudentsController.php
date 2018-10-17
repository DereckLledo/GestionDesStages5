<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);

        $this->set('student', $student);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);

            $student->user_id = $this->Auth->user('id');

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $student = $this->Students->get($id, [
            'contain' => []
        ]);



        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));
                return $this->redirect("\\");
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    public function modifier() {
        //id du user connecté
        $id_user = $this->Auth->user('id');
        
        
        $studentsTable = TableRegistry::get('Students');
        $query = $studentsTable->find()->select(['id'])->where(['id_user' => $id_user]);

        foreach ($query as $off) {
            $id_student = $off['id'];
        }
        //redirection
        return $this->redirect('/Students/Edit/' . $id_student);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {


        $action = $this->request->getParam('action');

        //coordinators ont le droit de modifier les élèves
        if ($user['type'] == "1") {
            return true;

            //les élèves ont seulement le droit de modifier leur propres profil
        } else if ($user['type'] == "0") {
         
            if (in_array($action, ['view', 'edit'])) {

                $id_student = $this->request->getParam('pass.0');
                $id_user = $user['id'];

                $student = $this->Students->get($id_student, [
                    'contain' => []
                ]);

                //si la foreing key du student 'id_user' est = au ID du user en cours, il est autorisé à modifier
                if ($student['id_user'] == $id_user) {
                    return true;
                } else {
                    return false;
                }
            }
        } else if ($user['type'] == "2") {
            return false;
        }

        // authorize l'access a modifier pour les étudiants
        if (in_array($action, ['modifier']) && $user['type'] == "0") {
            return true;
        }

        return false;
    }

}
