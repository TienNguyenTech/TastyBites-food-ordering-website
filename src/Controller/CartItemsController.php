<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\FlashComponent;

class CartItemsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash'); 
    }

    private function getCartSession()
    {
        return $this->request->getSession()->read('cart', []); 
    }

    private function setCartSession(array $cart)
    {
        $this->request->getSession()->write('cart', $cart); 
    }

    public function addToCart(int $menuitem_id, int $quantity = 1)
    {
        $cart = $this->getCartSession(); 

        if (isset($cart[$menuitem_id])) {
            $cart[$menuitem_id]['quantity'] += $quantity; 
        } else {
            
            $menuitem = $this->fetchTable('Menuitems')->get($menuitem_id);

            
            $cart[$menuitem_id] = [
                'name' => $menuitem->menuitem_name,
                'image' => $menuitem->menuitem_image,
                'price' => $menuitem->menuitem_price,
                'quantity' => $quantity,
            ];
        }

        
        $this->setCartSession($cart);

        
        $this->Flash->success(__('Item added to cart.'));

       
        return $this->redirect(['controller' => 'Menuitems', 'action' => 'menu']); // Thay đổi hành động nếu cần
    }

    public function viewCart()
    {
        $this->viewBuilder()->setLayout('cart_tab'); 
        $cart = $this->getCartSession(); 
        $this->set(compact('cart')); 
    }

    public function update(int $menuitem_id, int $quantity)
    {
        $cart = $this->getCartSession(); 

        if (isset($cart[$menuitem_id])) {
            if ($quantity <= 0) {
                unset($cart[$menuitem_id]); 
                $this->Flash->success(__('Item removed from cart.'));
            } else {
                
                $cart[$menuitem_id]['quantity'] = $quantity;
                $this->Flash->success(__('Cart updated.'));
            }

            $this->setCartSession($cart); 
        }

        return $this->redirect(['action' => 'viewCart']); 
    }

    public function remove(int $menuitem_id)
    {
        $cart = $this->getCartSession(); 
        if (isset($cart[$menuitem_id])) {
            unset($cart[$menuitem_id]); 
            $this->setCartSession($cart); 
            $this->Flash->success(__('Item removed from cart.'));
        }

        return $this->redirect(['action' => 'viewCart']); 
    }
}
