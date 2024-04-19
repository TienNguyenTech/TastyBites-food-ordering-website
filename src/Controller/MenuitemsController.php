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

    public function initialize(): void {
        parent::initialize();

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
        // $this->viewBuilder()->setLayout('default');
        //Stashed changes
        //$this->render('index');

        $query = $this->Menuitems->find();
        $menuitems = $this->paginate($query);

        $this->set(compact('menuitems'));
        $this->set('pageTitle', 'Menu');

    }

    public function search() {
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
    public function edit($id = null)
    {
        $menuitem = $this->Menuitems->get($id, contain: ['Orders']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuitem = $this->Menuitems->patchEntity($menuitem, $this->request->getData());
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
}
