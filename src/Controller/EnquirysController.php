<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Enquirys Controller
 *
 * @property \App\Model\Table\EnquirysTable $Enquirys
 */
class EnquirysController extends AppController
{
    public function initialize(): void {
        parent::initialize();
        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['add']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // Get the authenticated user identity
        $user = $this->Authentication->getIdentity();
        if ($user && $user['user_type'] === 'staff') {
            // If the user is a staff member, set the layout to staff_layout
            $this->viewBuilder()->setLayout('default2');
        } else {
            // Otherwise, use the default layout
            $this->viewBuilder()->setLayout('default');
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Enquirys->find();
        $enquirys = $this->paginate($query);

        $this->set(compact('enquirys'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquiry = $this->Enquirys->get($id, contain: []);
        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('customer');

        $enquiry = $this->Enquirys->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquirys->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquirys->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been sent.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquiry = $this->Enquirys->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquirys->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquirys->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquirys->get($id);
        if ($this->Enquirys->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
