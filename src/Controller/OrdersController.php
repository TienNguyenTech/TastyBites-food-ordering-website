<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

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

        $this->Authentication->allowUnauthenticated(['add', 'view']);
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
        $this->viewBuilder()->setLayout('customer');

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

            // Check if customer email contains '@'
//            if (!strpos($order->customer_email, '@')) {
//                $this->Flash->error(__('Please enter a valid email address.'));
//            } else
              if ($this->Orders->save($order)) {

                  foreach ($this->request->getData('MenuitemsOrder') as $menuitem_id => $menuitem_data) {
                      if(!empty($menuitem_data['quantity'])) {
                          $menuitemsOrder = $this->Orders->MenuitemsOrders->newEmptyEntity();
                          $menuitemsOrder->menuitem_id = $menuitem_id;
                          $menuitemsOrder->order_id = $order->order_id;
                          $menuitemsOrder->quantity = $menuitem_data['quantity'];
                          $this->Orders->MenuitemsOrders->save($menuitemsOrder);
                      }
                  }

                  //return $this->redirect(['controller' => 'Payments', 'action' => 'add', $order->order_id]);
                  return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('There was an error processing your order. Please, try again.'));
            }
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

        $mailer = new Mailer('default');

        $mailer
            ->setEmailFormat('html')
            ->setTo($order->customer_email)
            ->setFrom('noreply@tastybites.u24s1009.monash-ie.me')
            ->setSubject('Tasty Bites Kitchen: Order Pickup')
            ->viewBuilder()
            ->disableAutoLayout()
            ->setTemplate('order_ready');

        $mailer->setViewVars([
            'order_status' => $order->order_status,
            'customer_name' => $order->customer_name,
            'order_datetime' => $order->order_datetime,
            'order_id' => $order->order_id
        ]);

        $email_result = $mailer->deliver();

        if ($email_result) {
            $this->Flash->success(__('The enquiry has been saved and sent via email.'));
        } else {
            $this->Flash->error(__('Email failed to send. Please check the enquiry in the system later. '));
        }

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
