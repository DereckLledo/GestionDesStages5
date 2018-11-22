<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * InternshipOffers Controller
 *
 * @property \App\Model\Table\InternshipOffersTable $InternshipOffers
 *
 * @method \App\Model\Entity\InternshipOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipOffersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $type = $this->Auth->user('type');
        $id_user = $this->Auth->user('id');

        //SI le user connecté est un official(employeur), on lui affiche seulement ses propres internshipOffers
        if ($type == 2) {
            $query = $this->InternshipOffers->find()->where(['id_user' => $id_user]);
            $internshipOffers = $this->paginate($query);
        } else {

            //on affiche tous les stages ACTIF
            $query = $this->InternshipOffers->find()->where(['actif' => 1]);
            $internshipOffers = $this->paginate($query);
        }

        $this->set(compact('internshipOffers'));
    }

    /**
     * Index method
     *
     * Affiche la liste de tous les stages, actif ET inactif
     */
    public function allOffers() {
        $internshipOffers = $this->paginate($this->InternshipOffers);
        $this->set(compact('internshipOffers'));
    }

    /**
     * Index method
     *
     * Affiche la liste des stages inactif
     */
    public function inactif() {
        
        $query = $this->InternshipOffers->find()->where(['actif' => 0]);
        $internshipOffers = $this->paginate($query);


        $this->set(compact('internshipOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => ['Students']
        ]);

        $id_official = $internshipOffer['id_official'];
        //trouver le id_official avec le id du internshipOffer
        $officialsTable = TableRegistry::get('Officials');
        $official = $officialsTable->get($id_official, [
            'contain' => []
        ]);




        //ceci permet de transférer des données
        $this->set('internshipOffer', $internshipOffer);
        $this->set('official', $official);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $internshipOffer = $this->InternshipOffers->newEntity();
        if ($this->request->is('post')) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData());

            $id_user = $this->Auth->user('id');


            //trouver le id_official avec le id_user
            $officialsTable = TableRegistry::get('Officials');
            $query = $officialsTable->find()->select(['id'])->where(['id_user' => $id_user]);

            foreach ($query as $off) {
                $id_official = $off['id'];
            }

            //ajout des informations cachées dans le formulaire (id_user ET id_official)
            $internshipOffer->id_user = $id_user;
            $internshipOffer->id_official = $id_official;

            if ($this->InternshipOffers->save($internshipOffer)) {
                $this->Flash->success(__('The internship offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship offer could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipOffer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);


            if ($this->InternshipOffers->save($internshipOffer)) {
                $this->Flash->success(__('The internship offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship offer could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipOffer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $internshipOffer = $this->InternshipOffers->get($id);
        if ($this->InternshipOffers->delete($internshipOffer)) {
            $this->Flash->success(__('The internship offer has been deleted.'));
        } else {
            $this->Flash->error(__('The internship offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function postuler($idOffer = null, $idUser = null) {

        $email = new Email('default');
        $internshipOffer = $this->InternshipOffers->get($idOffer);
        $official = null;
        $student = null;


        //trouver le id_official avec le id_official de l'offre
        $officialsTable = TableRegistry::get('Officials');
        $query = $officialsTable->find()->where(['id' => $internshipOffer['id_official']]);

        foreach ($query as $off) {
            $official = $off;
        }

        //trouver l'éleve avec le id_user
        $studentsTable = TableRegistry::get('Students');
        $query = $studentsTable->find()->where(['id_user' => $idUser]);
        foreach ($query as $stud) {
            $student = $stud;
        }

        $this->InternshipOffers->Students->link($internshipOffer, [$student]);

        $message = "L'élève " . $student['first_name'] . " " . $student['last_name'] . " a postulé pour votre offre: " . $internshipOffer['title'] . ". Vous pouvez le rejoindre sur ce email: " . $student['email'];
        $email->setTo($official['email'])->setSubject('Un élève est intéressé par votre offre de stage')->send($message);

        $this->Flash->success(__('You successfully applied for this offer.'));

        return $this->redirect(['controller' => 'students', 'action' => 'appliedOffers', $student->id]);
    }

    public function notifierEtudiants($idOffer = null, $idUser = null) {
        $internshipOffer = $this->InternshipOffers->get($idOffer);
        //trouver l'éleve avec le id_user
        $studentsTable = TableRegistry::get('Students');
        $query = $studentsTable->find('all');

        foreach ($query as $student) {
            if (isset($student['email'])) {

                //si il y a un email et que ce email est valide on envoit un message
                if (filter_var($student['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = new Email('default');
                    $message = "Bonjour " . $student['first_name'] . " " . $student['last_name'] . ". Voici une offre de stage intéressante pour vous : " . $internshipOffer['title'] . ". Allez voir cette offre dans la liste des stages disponibles. Merci";
                    $email->setTo($student['email'])->setSubject('Veuillez considérer cette offre de stage!')->send($message);
                }
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        if ($user['type'] == "1") {
            return true;
        } else if ($user['type'] == "0") {
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['view', 'postuler'])) {
                return true;
            }
        } else if ($user['type'] == "2") {
            // users de type Officials peuvent add et view
            if (in_array($action, ['add', 'view'])) {
                return true;
            }
        }
        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $internshipOffer = $this->InternshipOffers->get($id);
        return $internshipOffer->id_user === $user['id'];
    }

}
