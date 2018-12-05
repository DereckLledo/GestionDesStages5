<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

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
        $students = $this->paginate($this->Students->find('all'));

        $this->set(compact('students'));
    }

    public function noInternship() {
        
        $students = $this->paginate($this->Students->find('all')->where(['internship' => false]));
        $this->set(compact('students'));
        
    }

    public function withInternship() {
        
        $students = $this->paginate($this->Students->find('all')->where(['internship' => true]));
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
            //permet de voir les internshipoffers auquel il a postuler
            'contain' => ['InternshipOffers']
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
            'contain' => ['InternshipOffers']
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

    
    public function choisirEtudiant($id = null) {

        $student = $this->Students->get($id, [
        ]);
        
        $student['internship'] = true;
                     
        if($this->Students->save($student)) {
            $this->Flash->success(__('Vous avez sélectionné cet étudiant pour un stage.'));
        } else {
             $this->Flash->error(__('Erreur dans la sélection de l\'étudiant'));
        }
        
        return $this->setAction('view', $id);
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

    public function findApplications() {
        //id du user connecté
        $id_user = $this->Auth->user('id');


        $studentsTable = TableRegistry::get('Students');
        $query = $studentsTable->find()->select(['id'])->where(['id_user' => $id_user]);

        foreach ($query as $off) {
            $id_student = $off['id'];
        }

        return $this->redirect('/Students/Applied-offers/' . $id_student);
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

    public function removeApplication($idStudent = null, $idOffer = null) {

        $student = $this->Students->get($idStudent, [
            //permet de voir les internshipoffers auquel il a postuler
            'contain' => ['InternshipOffers']
        ]);


        $offer;
        //on trouve l'offre qui est relier avec la id
        foreach ($student->internship_offers as $internshipOffer) {
            if ($internshipOffer->id == $idOffer) {
                $offer = $internshipOffer;
            }
        }

        //on retire la liaison entre les tables Students et internshipOffer
        $this->Students->InternshipOffers->unlink($student, [$offer]);

        //on trouve l'official de l'offre
        $officialsTable = TableRegistry::get('Officials');
        $query = $officialsTable->find()->where(['id' => $offer['id_official']]);

        foreach ($query as $off) {
            $official = $off;
        }


        //envoyer un email pour informer l'employeur du retrait de l'application.
        $email = new Email('default');
        $message = "L'élève " . $student['first_name'] . " " . $student['last_name'] . " a retiré son application pour votre offre: " . $offer['title'] . ". Vous pouvez le rejoindre sur ce email: " . $student['email'];
        $email->setTo($official['email'])->setSubject('Un élève a retiré son application pour une offre de stage')->send($message);


        $this->Flash->success(__('You successfully removed your application named ' . $offer->title . '.'));

        return $this->redirect(['action' => 'appliedOffers', $student->id]);
    }

    public function appliedOffers($id = null) {

        $student = $this->Students->get($id, [
            //permet de voir les internshipoffers auquel il a postuler
            'contain' => ['InternshipOffers']
        ]);

        $this->set('student', $student);
    }


    public function isAuthorized($user) {


        $action = $this->request->getParam('action');

        //coordinators ont le droit de modifier les élèves
        if ($user['type'] == "1") {
            return true;

            //les élèves ont seulement le droit de modifier leur propres profil
        } else if ($user['type'] == "0") {

            if (in_array($action, ['view', 'edit', 'appliedOffers', 'removeApplication'])) {

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
            if (in_array($action, ['index','view','choisirEtudiant'])) {
                return true;
            }
            
            return false;
        }

        // authorize l'access a modifier pour les étudiants
        if (in_array($action, ['modifier', 'findApplications']) && $user['type'] == "0") {
            return true;
        }

        return false;
    }

}
