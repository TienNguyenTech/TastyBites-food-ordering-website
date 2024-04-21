<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * Menuitems Controller
 *
 * @property \App\Model\Table\MenuitemsTable $Menuitems
 */
class MenuitemsController extends AppController
{
    // TODO: custoemr views: menu, search; everything else are admin

    public function initialize(): void
    {
        parent::initialize();
        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['menu']);


        //By default, use admin layout
        // $this->viewBuilder()->setLayout('admin');
        // Override individual functions if to use default (i.e. customers ) layout
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $search = $this->request->getQuery('search');
        $searchConditions = [
            'OR' => [
                'menuitem_name LIKE' => "%{$search}%",
                'menuitem_desc LIKE' => "%{$search}%"
            ]
        ];

        $query = $this->Menuitems->find()->where($searchConditions);
        $menuitems = $this->paginate($query);

        $this->set(compact('menuitems'));
    }

    public function menu()
    {
        //Updated upstream
        $this->viewBuilder()->setLayout('customer');

        // Use default (customer ) layout
//         $this->viewBuilder()->setLayout('default');
        //Stashed changes
        //$this->render('index');

        $query = $this->Menuitems->find();
        $menuitems = $this->paginate($query);

        $this->set(compact('menuitems'));
        $this->set('pageTitle', 'Menu');

    }

    public function search()
    {
        $search = $this->request->getData();

        $search = array_filter(array_map('trim', $search));

        $url = [
            'action' => 'index',
            '?' => $search
        ];

        return $this->redirect($url);
    }


    /**
     * View method
     *
     * @param string|null $id Menuitem id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuitem = $this->Menuitems->get($id, contain: ['Orders']);
        $this->set(compact('menuitem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuitem = $this->Menuitems->newEmptyEntity();
        if ($this->request->is('post')) {
            $menuitem = $this->Menuitems->patchEntity($menuitem, $this->request->getData());
            $image = $this->request->getUploadedFiles();

            $menuitem->menuitem_image = $image['menuitem_image']->getClientFilename();
            $image['menuitem_image']->moveTo(WWW_ROOT . 'img' . DS . 'menu' . DS . $menuitem->menuitem_image);



            if ($this->Menuitems->save($menuitem)) {
                $this->Flash->success(__('The menuitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menuitem could not be saved. Please, try again.'));
        }
        $orders = $this->Menuitems->Orders->find('list', limit: 200)->all();
        $this->set(compact('menuitem', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menuitem id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit2($id = null)
    {
        $menuitem = $this->Menuitems->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();



            if (!empty($this->request->getData('menuitem_image')->getClientFilename())) {
                $image = $this->request->getUploadedFiles();

                $menuitem->menuitem_image = $image['menuitem_image']->getClientFilename();
                $image['menuitem_image']->moveTo(WWW_ROOT . 'img' . DS . 'menu' . DS . $menuitem->menuitem_image);

                //dd([$requestData, $image['menuitem_image']->getClientFilename(), $menuitem]);
            } else {
                $requestData['menuitem_image'] = null;
            }

            $menuitem = $this->Menuitems->patchEntity($menuitem, $this->request->getData());

            //dd([$menuitem, $requestData]);

            if ($this->Menuitems->save($menuitem)) {
                $this->Flash->success(__('The menuitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menuitem could not be saved. Please, try again.'));
        }
        $orders = $this->Menuitems->Orders->find('list', limit: 200)->all();
        $this->set(compact('menuitem', 'orders'));
    }

    public function edit($id = null)
    {
        $menuitem = $this->Menuitems->get($id, contain: ['Orders']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();

            //            if(!empty($this->request->getData('menuitem_image')->getClientFilename())) {
//                $image = $this->request->getUploadedFiles();
//
//                $menuitem->menuitem_image = $image['menuitem_image']->getClientFilename();
//                $image['menuitem_image']->moveTo(WWW_ROOT . 'img' . DS . 'menu' . DS . $menuitem->menuitem_image);
//            } else {
//                $requestData['menuitem_image'] = null;
//            }

            $menuitem = $this->Menuitems->patchEntity($menuitem, $requestData);


            if ($this->Menuitems->save($menuitem)) {
                $this->Flash->success(__('The menuitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menuitem could not be saved. Please, try again.'));
        }
        $orders = $this->Menuitems->Orders->find('list', limit: 200)->all();
        $this->set(compact('menuitem', 'orders'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Menuitem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuitem = $this->Menuitems->get($id);
        if ($this->Menuitems->delete($menuitem)) {
            $this->Flash->success(__('The menuitem has been deleted.'));
        } else {
            $this->Flash->error(__('The menuitem could not be deleted. Please, try again.'));
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

