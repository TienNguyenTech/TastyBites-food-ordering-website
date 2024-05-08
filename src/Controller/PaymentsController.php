<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Payments->find()
            ->contain(['Orders']);
        $payments = $this->paginate($query);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, contain: ['Orders']);
        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($orderID)
    {
        $this->viewBuilder()->setLayout('customer');

        $payment = $this->Payments->newEmptyEntity();

        $order = $this->Payments->Orders->get($orderID, contain: ['Menuitems']);

        $orderTotal = 0;

        foreach ($order->menuitems as $menuitem) {
            $orderTotal += $menuitem->menuitem_price;
        }

        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            $payment->order_id = $orderID;
            $payment->payment_amount = $orderTotal;

            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['controller' => 'Orders', 'action' => 'view', $orderID]);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }

        $orderPaid = $order;
        $orderPaid->order_status = 'paid';

        $order = $this->Payments->Orders->patchEntity($order, (array)$orderPaid);
        $this->Payments->Orders->save($order);


        $this->set(compact('payment', 'order', 'orderTotal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $orders = $this->Payments->Orders->find('list', limit: 200)->all();
        $this->set(compact('payment', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
