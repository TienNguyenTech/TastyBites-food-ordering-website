<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Menuitems Controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 */
class MenuitemsController extends AppController
{
    /**
     * Initialize method
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['menu', 'addToCart', 'viewCart']);
    }

    /**
     * Menu method
     *
     * Display all available menu items.
     *
     * @return \Cake\Http\Response|null|void
     */
    public function menu()
    {
        $this->viewBuilder()->setLayout('customer');
        $menuitems = $this->Menuitems->find('all');
        $this->set(compact('menuitems'));
    }

    /**
     * Add to Cart method
     *
     * Add a menu item to the cart.
     *
     * @param string|null $menuitemId The ID of the menu item to add.
     * @param int $quantity The quantity to add.
     * @return \Cake\Http\Response|null|void
     */
    public function addToCart($menuitemId = null, $quantity = 1)
    {
        if (!$menuitemId) {
            $this->Flash->error(__('Invalid menu item.'));
            return $this->redirect(['action' => 'menu']);
        }

        $menuitem = $this->Menuitems->get($menuitemId);

        // Get cart from session or initialize it if it doesn't exist
        $cart = $this->request->getSession()->read('Cart', []);

        if (isset($cart[$menuitemId])) {
            $cart[$menuitemId]['quantity'] += $quantity;
        } else {
            $cart[$menuitemId] = [
                'name' => $menuitem->menuitem_name,
                'quantity' => $quantity,
                'price' => $menuitem->menuitem_price
            ];
        }

        $this->request->getSession()->write('Cart', $cart);

        $this->Flash->success(__('Added to cart.'));
        return $this->redirect(['action' => 'menu']);
    }

    /**
     * View Cart method
     *
     * Display the contents of the cart.
     *
     * @return \Cake\Http\Response|null|void
     */
    public function viewCart()
    {
        $this->viewBuilder()->setLayout('customer');

        $cart = $this->request->getSession()->read('Cart', []);
        $cartTotal = 0;

        foreach ($cart as $item) {
            $cartTotal += $item['quantity'] * $item['price'];
        }

        $this->set(compact('cart', 'cartTotal'));
    }

    /**Cart */
    /**Cart actions */
    public function viewCart()
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
