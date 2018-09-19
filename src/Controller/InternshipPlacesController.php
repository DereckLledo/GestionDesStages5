<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipPlaces Controller
 *
 * @property \App\Model\Table\InternshipPlacesTable $InternshipPlaces
 *
 * @method \App\Model\Entity\InternshipPlace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipPlacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $internshipPlaces = $this->paginate($this->InternshipPlaces);

        $this->set(compact('internshipPlaces'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship Place id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipPlace = $this->InternshipPlaces->get($id, [
            'contain' => []
        ]);

        $this->set('internshipPlace', $internshipPlace);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipPlace = $this->InternshipPlaces->newEntity();
        if ($this->request->is('post')) {
            $internshipPlace = $this->InternshipPlaces->patchEntity($internshipPlace, $this->request->getData());
            if ($this->InternshipPlaces->save($internshipPlace)) {
                $this->Flash->success(__('The internship place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship place could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipPlace'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship Place id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipPlace = $this->InternshipPlaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipPlace = $this->InternshipPlaces->patchEntity($internshipPlace, $this->request->getData());
            if ($this->InternshipPlaces->save($internshipPlace)) {
                $this->Flash->success(__('The internship place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship place could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipPlace'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship Place id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipPlace = $this->InternshipPlaces->get($id);
        if ($this->InternshipPlaces->delete($internshipPlace)) {
            $this->Flash->success(__('The internship place has been deleted.'));
        } else {
            $this->Flash->error(__('The internship place could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
