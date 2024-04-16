<?php

namespace App\Controller;

/**
 * Dashboard controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 */

class DashboardController extends AppController {

    public function index() {
        $menuitemsTable = $this->getTableLocator()->get('Menuitems')->find();
        $menuitems = $this->paginate($menuitemsTable);

        $this->set(compact('menuitems'));
    }
}
