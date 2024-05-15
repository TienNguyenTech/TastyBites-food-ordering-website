<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Cake\Http\Response;

/**
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \App\Model\Table\MenuitemsOrdersTable $MenuitemsOrders
 */
class CheckoutController extends AppController
{
    private \Cake\ORM\Table $MenuitemsOrders;
    private \Cake\ORM\Table $Orders;

    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['checkout']);

        $this->MenuitemsOrders = TableRegistry::getTableLocator()->get('MenuitemsOrders');
        $this->Orders = TableRegistry::getTableLocator()->get('Orders');

    }

    public function checkout($orderID) {
        $this->viewBuilder()->setLayout('customer');
        Stripe::setApiKey('sk_test_51PGCIxP0JLdKd5JZtXPqnn45GBlnjQZ2p09Sw7DVei8Su3qJnIfvrS91wdbwsFrdudVgCvX40ZSJ32EI39a0r7VV00x3rRn7Ph');

        $order = $this->Orders->get($orderID, contain: ['Menuitems']);

        $quantities = $this->MenuitemsOrders->find()->where(['order_id' => $orderID])->all()->toArray();

        $line_items = [];

        $orderTotal = 0;

        foreach ($order->menuitems as $index => $menuitem) {
            $orderTotal += $menuitem->menuitem_price * $quantities[$index]['quantity'];
        }

        foreach ($order['menuitems'] as $index => $menuitem) {
            array_push($line_items, [
                'price_data' => [
                    'product_data' => [
                    'name' => $menuitem['menuitem_name']
                ],
                'currency' => 'AUD',
                'unit_amount' => $menuitem['menuitem_price'] * 100
                ],
                'quantity' => $quantities[$index]['quantity'],
            ]);
        }

        $checkout_session = Session::create([
            'success_url' => Router::fullBaseUrl() . Router::url(['controller' => 'Payments', 'action' => 'add', $orderID, $orderTotal]),
            'cancel_url' => Router::fullBaseUrl() . Router::url(['controller' => 'Orders', 'action' => 'add']),
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $line_items
        ]);

        $this->set('sessionId', $checkout_session['id']);
     }
}
