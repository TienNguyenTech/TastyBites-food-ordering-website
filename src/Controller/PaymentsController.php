<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Utility\Security;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class PaymentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

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
    public function add($orderID, $orderTotal)
    {
        $this->viewBuilder()->setLayout('customer');

        $payment = $this->Payments->newEmptyEntity();

        $order = $this->Payments->Orders->get($orderID, contain: ['Menuitems']);

        $payment = $this->Payments->patchEntity($payment, $this->request->getData());
        $payment->order_id = $orderID;
        $payment->payment_amount = $orderTotal;

        if ($this->Payments->save($payment)) {

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
                'order_id' => $order->order_id,
                'order_datetime' => $order->order_datetime
            ]);

            try {
                //$email_result = $mailer->deliver();
                $email_result = true;

                if ($email_result) {
                    $this->Flash->success(__('The order confirmation has been sent.'));
                } else {
                    $this->Flash->error(__('Order confirmation failed to send, please ensure that email is correct.'));
                    $this->redirect(['controller' => 'Orders', 'action' => 'add']);
                    $this->Payments->Orders->delete($order);
                }
            } catch (\Exception $e) {
                $this->Flash->error(__('Order confirmation failed to send, please ensure that email is correct.'));
                $this->redirect(['controller' => 'Orders', 'action' => 'add']);
                $this->Payments->Orders->delete($order);
            }

            $this->Flash->success(__('The payment has been saved.'));
            return $this->redirect(['controller' => 'Orders', 'action' => 'view', $orderID]);
        }
        $this->Flash->error(__('The payment could not be saved. Please, try again.'));




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
