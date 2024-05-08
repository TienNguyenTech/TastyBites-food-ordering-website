<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class OrdersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Orders->find(contain: 'Menuitems');
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Menuitems']);

        $orderTotal = 0;

        foreach ($order->menuitems as $menuitem) {
            $orderTotal += $menuitem->menuitem_price;
        }

        $this->set(compact('order', 'orderTotal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('customer');

        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('Your order has been placed! Confirmation will be sent to your email.'));

                return $this->redirect(['controller' => 'Payments', 'action' => 'add', $order->order_id]);
            }
            $this->Flash->error(__('There was an error processing your order. Please, try again.'));
        }
        $menuitems = $this->Orders->Menuitems->find('list', limit: 200)->all();
        $this->set(compact('order', 'menuitems'));
    }

    public function ready($id) {
        $order = $this->Orders->get($id, contain: ['Menuitems']);

        $orderReady = $order;
        $orderReady->order_status = 'ready';

        $order = $this->Orders->patchEntity($order, (array)$orderReady);

        $this->Orders->save($order);

        $this->redirect(['action' => 'index']);
    }

    public function complete($id) {
        $order = $this->Orders->get($id, contain: ['Menuitems']);

        $orderReady = $order;
        $orderReady->order_status = 'complete';

        $order = $this->Orders->patchEntity($order, (array)$orderReady);

        $this->Orders->save($order);

        $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Menuitems']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $menuitems = $this->Orders->Menuitems->find('list', limit: 200)->all();
        $this->set(compact('order', 'menuitems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
