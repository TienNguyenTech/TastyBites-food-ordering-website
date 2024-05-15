<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // Get the authenticated user identity
        $user = $this->Authentication->getIdentity();
        if ($user && $user['user_type'] === 'staff') {
            // If the user is a staff member, set the layout to staff_layout
            $this->redirect(['controller' => 'Orders', 'action' => 'index']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
//        $query = $this->Users->find();
//        $users = $this->paginate($query);
//
//        $this->set(compact('users'));
        $this->redirect(['action' => 'admin']);
    }

    public function admin()
    {
        $query = $this->Users->find()->where(['Users.user_type IN' => ['admin', 'staff']]);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);

        $this->set(compact('user'));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if($data['password'] != $data['password-confirm']) {
                return $this->Flash->error(__('Passwords must match'));
            }

            if(strlen($data['password']) < 10) {
                return $this->Flash->error(__('Password must be at least 10 characters long'));
            }

            preg_match_all('/\d/', $data['password'], $matches);

            if(count($matches[0]) < 2) {
                return $this->Flash->error(__('Password must contain at least 2 numbers'));
            }

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

    }

//    /**
//     * Delete method
//     *
//     * @param string|null $id User id.
//     * @return \Cake\Http\Response|null Redirects to index.
//     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
//     */
//    public function delete($id = null)
//    {
//        $this->request->allowMethod(['post', 'delete']);
//        $user = $this->Users->get($id);
//        if ($this->Users->delete($user)) {
//            $this->Flash->success(__('The user has been deleted.'));
//        } else {
//            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
//        }
//
//        return $this->redirect(['action' => 'index']);
//    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index or admin.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        // Check if the user being deleted is an admin
        $user = $this->Users->get($id);
        if ($user->user_type === 'admin') {
            // Count the number of admin users
            $adminCount = $this->Users->find()->where(['user_type' => 'admin'])->count();
            if ($adminCount === 1) {
                // If there is only one admin user, don't allow deletion
                $this->Flash->error(__('Currently, there is only one admin account. Deleting the admin account is not allowed.'));
                return $this->redirect(['action' => 'admin']);
            }
            // If admin count is more than 1 or user is not an admin, proceed with deletion
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'admin']);
        } else {
            // For non-admin users (e.g., customers), proceed with deletion
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'admin']);
        }
    }
}
