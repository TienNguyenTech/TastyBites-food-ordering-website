<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MenuitemsOrders Controller
 *
 * @property \App\Model\Table\MenuitemsOrdersTable $MenuitemsOrders
 */
class MenuitemsOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MenuitemsOrders->find()
            ->contain(['Menuitems', 'Orders']);
        $menuitemsOrders = $this->paginate($query);

        $this->set(compact('menuitemsOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Menuitems Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuitemsOrder = $this->MenuitemsOrders->get($id, contain: ['Menuitems', 'Orders']);
        $this->set(compact('menuitemsOrder'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuitemsOrder = $this->MenuitemsOrders->newEmptyEntity();
        if ($this->request->is('post')) {
            $menuitemsOrder = $this->MenuitemsOrders->patchEntity($menuitemsOrder, $this->request->getData());
            if ($this->MenuitemsOrders->save($menuitemsOrder)) {
                $this->Flash->success(__('The menuitems order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menuitems order could not be saved. Please, try again.'));
        }
        $menuitems = $this->MenuitemsOrders->Menuitems->find('list', limit: 200)->all();
        $orders = $this->MenuitemsOrders->Orders->find('list', limit: 200)->all();
        $this->set(compact('menuitemsOrder', 'menuitems', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menuitems Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuitemsOrder = $this->MenuitemsOrders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuitemsOrder = $this->MenuitemsOrders->patchEntity($menuitemsOrder, $this->request->getData());
            if ($this->MenuitemsOrders->save($menuitemsOrder)) {
                $this->Flash->success(__('The menuitems order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menuitems order could not be saved. Please, try again.'));
        }
        $menuitems = $this->MenuitemsOrders->Menuitems->find('list', limit: 200)->all();
        $orders = $this->MenuitemsOrders->Orders->find('list', limit: 200)->all();
        $this->set(compact('menuitemsOrder', 'menuitems', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menuitems Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuitemsOrder = $this->MenuitemsOrders->get($id);
        if ($this->MenuitemsOrders->delete($menuitemsOrder)) {
            $this->Flash->success(__('The menuitems order has been deleted.'));
        } else {
            $this->Flash->error(__('The menuitems order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
