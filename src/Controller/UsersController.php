<?php
namespace Kissagalleria\Controller;

use Kissagalleria\Controller\AppController;
use Cake\I18n\I18n;
/**
 * Users Controller
 *
 * @property \Kissagalleria\Model\Table\UsersTable $Users
 *
 * @method \Kissagalleria\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
          'contain' => ['Breeders','Media'],
          'limit' => 54,
        ];

				$breeders = $this->Users->Breeders->find()->all();

				$breeder = $this->request->query('breeder');
				if (isset($breeder)) :
          $users = $this->paginate($this->Users->find()->matching('Breeders', function ($q) use ($breeder) {return $q->where(['Breeders.name' => $breeder]);}));
				else :
	        $users = $this->paginate($this->Users);
				endif;

        $this->set(compact('users','breeders'));
        $this->set('_serialize', ['users','breeders']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
          //            'contain' => ['Usergroups', 'Breeders', 'Cats', 'BlogPosts', 'Blogs', 'Comments', 'Commentsold', 'Photos', 'Posts', 'Vets']
          'contain' => ['Breeders', 'Cats', 'Media','Comments'=>['Users']]
        ]);

#		    $data = $this->Users->find()->where(['Users.id' => $id])->find('comments')->first();
#        $this->set(compact('data'));
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
#        $usergroups = $this->Users->Usergroups->find('list', ['limit' => 200]);
        $breeders = $this->Users->Breeders->find('list', ['limit' => 200]);
        $cats = $this->Users->Cats->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usergroups', 'breeders', 'cats'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Cats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
 #       $usergroups = $this->Users->Usergroups->find('list', ['limit' => 200]);
        $breeders = $this->Users->Breeders->find('list', ['limit' => 200]);
        $cats = $this->Users->Cats->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usergroups', 'breeders', 'cats'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	 	public function language($lang) {
			I18n::locale($lang);
			return $this->redirect($this->referer());
	  }

}
