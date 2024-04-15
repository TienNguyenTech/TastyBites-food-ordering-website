<?php

namespace App\Controller;

/**
 * Dashboard controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 * @property \App\Model\Table\OrdersTable $Orders
 */

class DashboardController extends AppController {
    public function index() {
        $menuitems = $this->getTableLocator()->get('Menuitems')->find();
        $orders = $this->getTableLocator()->get('Orders')->find();

        $this->set(compact('menuitems', 'orders'));
    }
}
