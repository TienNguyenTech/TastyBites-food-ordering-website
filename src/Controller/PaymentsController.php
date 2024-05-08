<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Utility\Security;

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

            $payment->card_number = Security::encrypt($payment->card_number, '3a85ced9674faa08e70bc3b0a347989a842d9792d0794f6108b2494c32b280bc');
            $payment->card_expiry = Security::encrypt($payment->card_expiry, '3a85ced9674faa08e70bc3b0a347989a842d9792d0794f6108b2494c32b280bc');
            $payment->card_cvc = Security::encrypt($payment->card_cvc, '3a85ced9674faa08e70bc3b0a347989a842d9792d0794f6108b2494c32b280bc');

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

        $mailer = new Mailer('default');

        $mailer
            ->setEmailFormat('html')
            ->setTo($order->customer_email)
            ->setFrom('noreply@tastybites.u24s1009.monash-ie.me')
            ->setSubject('Tasty Bites Kitchen: Order Confirmation')
            ->viewBuilder()
                ->disableAutoLayout()
                ->setTemplate('order_confirmation');

        $mailer->setViewVars([
            'order_status' => $order->order_status,
            'customer_name' => $order->customer_name,
            'customer_email' => $order->customer_email,
            'customer_phone' => $order->customer_phone,
            'order_id' => $order->order_id
        ]);

        $email_result = $mailer->deliver();

        if ($email_result) {
            $this->Flash->success(__('The enquiry has been saved and sent via email.'));
        } else {
            $this->Flash->error(__('Email failed to send. Please check the enquiry in the system later. '));
        }


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
