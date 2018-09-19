<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipMissions Controller
 *
 * @property \App\Model\Table\InternshipMissionsTable $InternshipMissions
 *
 * @method \App\Model\Entity\InternshipMission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipMissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $internshipMissions = $this->paginate($this->InternshipMissions);

        $this->set(compact('internshipMissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship Mission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipMission = $this->InternshipMissions->get($id, [
            'contain' => []
        ]);

        $this->set('internshipMission', $internshipMission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipMission = $this->InternshipMissions->newEntity();
        if ($this->request->is('post')) {
            $internshipMission = $this->InternshipMissions->patchEntity($internshipMission, $this->request->getData());
            if ($this->InternshipMissions->save($internshipMission)) {
                $this->Flash->success(__('The internship mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship mission could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipMission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship Mission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipMission = $this->InternshipMissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipMission = $this->InternshipMissions->patchEntity($internshipMission, $this->request->getData());
            if ($this->InternshipMissions->save($internshipMission)) {
                $this->Flash->success(__('The internship mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship mission could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipMission'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship Mission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipMission = $this->InternshipMissions->get($id);
        if ($this->InternshipMissions->delete($internshipMission)) {
            $this->Flash->success(__('The internship mission has been deleted.'));
        } else {
            $this->Flash->error(__('The internship mission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
