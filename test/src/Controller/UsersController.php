<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;

/**
 * NewUser Controller
 *
 *
 * @method \App\Model\Entity\NewUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index','login','add','login_start']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->render('users');
    }

    public function loginStart()
    {
        $this->render('login');
    }

    public function login()
    {

      if ($this->request->is('post')) {
      $users = $this->Auth->identify();

      // $hasher = new DefaultPasswordHasher();
      // $bool = $hasher->check($this->request->data['password'], $users->password);
      // dd($this->Auth->identify());
      //
      //
      // $match = password_verify($users->data['password'],$this->request->data['password']);

      // 
      // if($users){
      //   debug('Password is Correct');
      // }else{
      //   debug('Password is Wrong');
      // }

        if ($users) {
          $this->Auth->setUser($users);

          return $this->redirect($this->Auth->redirectUrl());
        }
      $this->Flash->error(__('Invalid username or password, try again'));
      }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id New User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('Users', $user);
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
//             else{
//     $this->log(print_r($user->errors(),true),LOG_DEBUG);
// }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('login');
    }


    /**
     * Edit method
     *
     * @param string|null $id New User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The new User has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The new User could not be saved. Please, try again.'));
        }
        $this->set(compact('Users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id New User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->User->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The new User has been deleted.'));
        } else {
            $this->Flash->error(__('The new User could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
