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
}
