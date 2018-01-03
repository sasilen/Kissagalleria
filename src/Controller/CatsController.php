<?php
namespace Kissagalleria\Controller;

use Kissagalleria\Controller\AppController;

/**
 * Cats Controller
 *
 * @property \Kissagalleria\Model\Table\CatsTable $Cats
 *
 * @method \Kissagalleria\Model\Entity\Cat[] paginate($object = null, array $settings = [])
 */
class CatsController extends AppController
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

        $breed = $this->request->query('breed');
        $breeder = $this->request->query('breeder');
        $dod = $this->request->query('dod');
				$query = $this->request->getQueryParams();
	      unset($query['direction']);
        unset($query['sort']);
        unset($query['page']);


        $this->paginate = [
            'contain' => ['Breeds','Media'],
						'limit' => 54, 
        ];
				
				/**
				 * Count Cats for each Breed
				 */
				if (isset($dod)) : 
					$breeds = $this->Cats->Breeds->find()->contain(['Cats'=> function($q) {
				    $q->select([
		         'Cats.breed_id',
	           'total' => $q->func()->count('Cats.breed_id')
			      ])
						->where(['deathdate > birthdate'])
						->group(['Cats.breed_id']);
				    return $q;
					}])->all();
				else : 
					$breeds = $this->Cats->Breeds->find()->contain(['Cats'=> function($q) {
	          $q->select([
	           'Cats.breed_id',
  	         'total' => $q->func()->count('Cats.breed_id')
    	      ])
	          ->group(['Cats.breed_id']);
	          return $q;
  	      }])->all();
				endif;

				$breed = $this->request->query('breed');
				$breeder = $this->request->query('breeder');
				$dod = $this->request->query('dod');
				
				$where = array();
				$order = 'rand()';

				if (isset($breed)) :
					$where['breed_id'] = $breed;
				endif;
				if (isset($breeder)) :
					$where['breeder'] = $breeder;
				endif;
				if (isset($dod)) : 
					$where[] = 'deathdate > birthdate';
				endif;
				$cats = $this->paginate($this->Cats->find()->where($where)->order($order));

        $this->set(compact('cats','breeds','breed','dod','query'));
        $this->set('_serialize', ['cats','breeds','breed','dod','query']);
    }

    /**
     * View method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cat = $this->Cats->get($id, [
            'contain' => ['Comments'=>['Users'],'Breeds', 'Users', 'Exhibitions', 'Media','Ratings'=> function($q) {
						    $q->select(['Ratings.foreign_key','total' => $q->func()->avg('Ratings.value')])
								->where(['Ratings.model'=>'Cats']);
								return $q;
						}]
        ]);
				$this->set('isRated', $this->Cats->isRatedBy($id, $this->Auth->user('id')));
        $this->set('cat', $cat);
        $this->set('_serialize', ['cat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cat = $this->Cats->newEntity();
        if ($this->request->is('post')) {
						$cattmp = $this->request->getData();
						$cattmp['user_id'] = $this->request->session()->read('Auth.User.id'); 
						$cattmp['users']['_ids'] = [$this->request->session()->read('Auth.User.id')];
            $cat = $this->Cats->patchEntity($cat, $cattmp);
            if ($this->Cats->save($cat)) {
                $this->Flash->success(__('The cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat could not be saved. Please, try again.'));
        }
        $breeds = $this->Cats->Breeds->find('list', ['limit' => 200]);
  		  $users = $this->Cats->Users->find('list', ['limit' => 200,'keyField'=>'id','valueField'=>'username']);
        $this->set(compact('post', 'users'));

        $this->set(compact('cat', 'breeds', 'users'));
        $this->set('_serialize', ['cat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cat = $this->Cats->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cat = $this->Cats->patchEntity($cat, $this->request->getData());
            if ($this->Cats->save($cat)) {
                $this->Flash->success(__('The cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat could not be saved. Please, try again.'));
        }
        $breeds = $this->Cats->Breeds->find('list', ['limit' => 200]);
        $users = $this->Cats->Users->find('list', ['limit' => 200]);
        $this->set(compact('cat', 'breeds', 'users'));
        $this->set('_serialize', ['cat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cat = $this->Cats->get($id);
        if ($this->Cats->delete($cat)) {
            $this->Flash->success(__('The cat has been deleted.'));
        } else {
            $this->Flash->error(__('The cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
