<?php

namespace App\Controller;

/**
 * Dashboard controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 */

class Dashboard2Controller extends AppController {

    public function index() {
        $this->viewBuilder()->setLayout('default2');
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
