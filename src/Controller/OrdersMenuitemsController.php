<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrdersMenuitems Controller
 *
 * @property \App\Model\Table\OrdersMenuitemsTable $OrdersMenuitems
 */
class OrdersMenuitemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $query = $this->OrdersMenuitems->find()
            ->contain(['Orders', 'Menuitems']);
        $ordersMenuitems = $this->paginate($query);

        $this->set(compact('ordersMenuitems'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Menuitem id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersMenuitem = $this->OrdersMenuitems->get($id, contain: ['Orders', 'Menuitems']);
        $this->set(compact('ordersMenuitem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersMenuitem = $this->OrdersMenuitems->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordersMenuitem = $this->OrdersMenuitems->patchEntity($ordersMenuitem, $this->request->getData());
            if ($this->OrdersMenuitems->save($ordersMenuitem)) {
                $this->Flash->success(__('The orders menuitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders menuitem could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersMenuitems->Orders->find('list', limit: 200)->all();
        $menuitems = $this->OrdersMenuitems->Menuitems->find('list', limit: 200)->all();
        $this->set(compact('ordersMenuitem', 'orders', 'menuitems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Menuitem id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersMenuitem = $this->OrdersMenuitems->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersMenuitem = $this->OrdersMenuitems->patchEntity($ordersMenuitem, $this->request->getData());
            if ($this->OrdersMenuitems->save($ordersMenuitem)) {
                $this->Flash->success(__('The orders menuitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders menuitem could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersMenuitems->Orders->find('list', limit: 200)->all();
        $menuitems = $this->OrdersMenuitems->Menuitems->find('list', limit: 200)->all();
        $this->set(compact('ordersMenuitem', 'orders', 'menuitems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Menuitem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersMenuitem = $this->OrdersMenuitems->get($id);
        if ($this->OrdersMenuitems->delete($ordersMenuitem)) {
            $this->Flash->success(__('The orders menuitem has been deleted.'));
        } else {
            $this->Flash->error(__('The orders menuitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**View Cart actions */
    public function cart()
    {
        $this->viewBuilder()->setLayout('customer');

        // Fetch cart items from the session
        $cart = $this->request->getSession()->read('Cart', []);

        // Calculate the total price
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['quantity'] * $item['price'];
        }

        $this->set(compact('cart', 'cartTotal'));
    }

    public function addToCart($menuitemId, $quantity = 1)
    {
        if (!$menuitemId) {
            $this->Flash->error(__('Invalid menu item.'));
            return $this->redirect(['controller' => 'Menuitems', 'action' => 'menu']);
        }

        // Fetch the menu item from the database
        $menuitem = $this->Menuitems->get($menuitemId);

        // Read or initialize the cart from the session
        $cart = $this->request->getSession()->read('Cart', []);

        if (isset($cart[$menuitemId])) {
            // If the item is already in the cart, update the quantity
            $cart[$menuitemId]['quantity'] += $quantity;
        } else {
            // Add a new item to the cart
            $cart[$menuitemId] = [
                'name' => $menuitem->menuitem_name,
                'quantity' => $quantity,
                'price' => $menuitem->menuitem_price,
                'image' => $menuitem->menuitem_image, // If available
            ];
        }

        // Save the cart back to the session
        $this->request->getSession()->write('Cart', $cart);

        $this->Flash->success(__('Item added to cart.'));
        return $this->redirect(['controller' => 'Menuitems', 'action' => 'menu']);
    }

    public function removeFromCart($menuitemId)
    {
        // Fetch the cart from the session
        $cart = $this->request->getSession()->read('Cart', []);

        // If the item exists in the cart, remove it
        if (isset($cart[$menuitemId])) {
            unset($cart[$menuitemId]);
        }

        // Update the session with the modified cart
        $this->request->getSession()->write('Cart', $cart);

        $this->Flash->success(__('Item removed from cart.'));
        return $this->redirect(['action' => 'viewCart']);
    }

    public function updateQuantity($menuitemId, $quantity)
    {
        // Fetch the cart from the session
        $cart = $this->request->getSession()->read('Cart', []);

        if (isset($cart[$menuitemId])) {
            // Update the quantity for the specified item
            $cart[$menuitemId]['quantity'] = $quantity;
        }

        // Save the updated cart back to the session
        $this->request->getSession()->write('Cart', $cart);

        return $this->redirect(['action' => 'viewCart']);
    }
}


