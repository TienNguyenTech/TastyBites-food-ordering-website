<?php

namespace App\Controller;

/**
 * Dashboard controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 */

class DashboardController extends AppController {

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // Get the authenticated user identity
        $user = $this->Authentication->getIdentity();
        if ($user && $user['user_type'] === 'staff') {
            // If the user is a staff member, set the layout to staff_layout
            $this->redirect(['controller' => 'Orders', 'action' => 'index']);
        }
    }

    public function index() {
        if ($this->Authentication->getIdentity()->getOriginalData('user_type')['user_type'] === 'customer') {
            // Redirect the customer to another page or display an error message
//            $this->Flash->error('You are not authorized to access the dashboard.');
            return $this->redirect('/');
        }

        $menuitemsTable = $this->getTableLocator()->get('Menuitems')->find();
        $menuitems = $this->paginate($menuitemsTable);

        $menuitemsAmount = count($menuitemsTable->toArray());

        $this->set(compact('menuitems', 'menuitemsAmount'));
    }
}
