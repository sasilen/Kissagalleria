<?php
namespace Kissagalleria\Controller;

use Kissagalleria\Controller\AppController;

/**
 * Exhibitions Controller
 *
 * @property \Kissagalleria\Model\Table\ExhibitionsTable $Exhibitions
 *
 * @method \Kissagalleria\Model\Entity\Exhibition[] paginate($object = null, array $settings = [])
 */
class ExhibitionsController extends AppController
{

		public function initialize()
    {
      parent::initialize();
      $this->Auth->allow(['index','view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cats'],
						'sortWhitelist' => ['Cats.name','name','date','place','ems','class','result','judge'],
						'order' => ['date' => 'DESC']
        ];
				$judge = $this->request->query('judge');

        if (isset($judge)) :
          $exhibitions = $this->paginate($this->Exhibitions->find()->where(['judge'=>$judge]));
        else :
        	$exhibitions = $this->paginate($this->Exhibitions);
				endif;

				$judges = $this->Exhibitions->find()->select(['judge'])->distinct(['judge'])->all();

        $this->set(compact('exhibitions','judges'));
        $this->set('_serialize', ['exhibitions','judges']);
    }

    /**
     * View method
     *
     * @param string|null $id Exhibition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exhibition = $this->Exhibitions->get($id, [
            'contain' => ['Cats']
        ]);

        $this->set('exhibition', $exhibition);
        $this->set('_serialize', ['exhibition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exhibition = $this->Exhibitions->newEntity();
        if ($this->request->is('post')) {
            $exhibition = $this->Exhibitions->patchEntity($exhibition, $this->request->getData());
            if ($this->Exhibitions->save($exhibition)) {
                $this->Flash->success(__('The exhibition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exhibition could not be saved. Please, try again.'));
        }
        $cats = $this->Exhibitions->Cats->find('list', ['limit' => 200]);
        $this->set(compact('exhibition', 'cats'));
        $this->set('_serialize', ['exhibition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exhibition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exhibition = $this->Exhibitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exhibition = $this->Exhibitions->patchEntity($exhibition, $this->request->getData());
            if ($this->Exhibitions->save($exhibition)) {
                $this->Flash->success(__('The exhibition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exhibition could not be saved. Please, try again.'));
        }
        $cats = $this->Exhibitions->Cats->find('list', ['limit' => 200]);
        $this->set(compact('exhibition', 'cats'));
        $this->set('_serialize', ['exhibition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exhibition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exhibition = $this->Exhibitions->get($id);
        if ($this->Exhibitions->delete($exhibition)) {
            $this->Flash->success(__('The exhibition has been deleted.'));
        } else {
            $this->Flash->error(__('The exhibition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
