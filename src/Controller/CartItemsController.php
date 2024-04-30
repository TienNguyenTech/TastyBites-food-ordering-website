<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\RequestHandlerComponent; // Ensure the correct base controller namespace
use Cake\Controller\Component\FlashComponent;

class CartItemsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent(FlashComponent::class); // Load the RequestHandler component
        $this->loadComponent('Flash'); // Load the Flash component for flash messages
    }

    /**
     * View the current cart contents.
     */
    public function view()
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart', []); // Default to empty cart if session not set

        $this->set(compact('cart')); // Pass the cart data to the view
    }

    /**
     * Add an item to the cart.
     *
     * @param int $itemId The ID of the menu item to add.
     * @param int $quantity The quantity to add (default is 1).
     */
    public function add($itemId, $quantity = 1)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart', []); // Default to empty cart if session not set

        if (isset($cart[$itemId])) {
            $cart[$itemId] += $quantity; // If item already in cart, increase quantity
        } else {
            $cart[$itemId] = $quantity; // Else, add new item to cart
        }

        $session->write('cart', $cart); // Save updated cart back to session

        $this->Flash->success('Item added to cart.'); // Show success message
        return $this->redirect(['action' => 'view']); // Redirect to cart view
    }

    /**
     * Update the quantity of an item in the cart.
     *
     * @param int $itemId The ID of the menu item to update.
     * @param int $quantity The new quantity for the item.
     */
    public function update(int $itemId, int $quantity)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart', []);

        if (isset($cart[$itemId])) {
            if ($quantity <= 0) {
                unset($cart[$itemId]); // Remove item if quantity is zero or less
                $this->Flash->success(__('Item removed from cart.'));
            } else {
                // Update item quantity in the cart
                $cart[$itemId]['quantity'] = $quantity;
                $this->Flash->success(__('Cart updated.'));
            }

            // Save the updated cart to the session
            $session->write('cart', $cart);
        }

        return $this->redirect(['action' => 'view']); // Redirect back to the cart view
    }

    /**
     * Remove an item from the cart.
     *
     * @param int $itemId The ID of the menu item to remove.
     */
    public function remove(int $itemId)
    {
        $session = $this->request->getSession();
        $cart = $session->read('cart', []);

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]); // Remove the item from the cart
            $session->write('cart', $cart); // Save the updated cart
            $this->Flash->success(__('Item removed from cart.'));
        }

        return $this->redirect(['action' => 'view']); // Redirect back to the cart view
    }
}
