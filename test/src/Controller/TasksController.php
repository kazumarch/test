<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Task;
use Cake\ORM\TableRegistry;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
    public function input()
    {
        // ユーザー情報
        $users_data = TableRegistry::get('Users')->find();
        $this->set('users_data', $users_data);

        // スケジュール情報
        $schedules_data = TableRegistry::get('Schedules')->find();
        $this->set('schedules_data', $schedules_data);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // タスク一覧
        $tasks_data = TableRegistry::get('Tasks')->find();
        $this->set('tasks_data', $tasks_data);
        // $this->paginate = [
        //     'contain' => ['Users', 'CNodes']
        // ];
        // $tasks = $this->paginate($this->Tasks);
        //
        // $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $task = $this->Tasks->get($id, [
        //     'contain' => ['Users', 'CNodes', 'Tasks']
        // ]);
        //
        // $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $in_data = $this->request->getData();
            $task = $this->Tasks->patchEntity($task, $in_data);
            // dd($task);
            $start_date = $in_data['estimate_start_date'];
            $task->set('start_date', date('Y/m/d', strtotime($start_date['year'] . $start_date['month'] . $start_date['day'])));
            $end_date = $in_data['estimate_end_date'];
            $task->set('end_date', date('Y/m/d', strtotime($end_date['year'] . $end_date['month'] . $end_date['day'])));
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'input']);
            } else {
                dump($this->Tasks->validationErrors);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $this->autoRender = false;
        // $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        // $cNodes = $this->Tasks->CNodes->find('list', ['limit' => 200]);
        // $this->set(compact('task', 'users', 'cNodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $task = $this->Tasks->get($id, [
        //     'contain' => []
        // ]);
        dd($id);
        $this->render('input');
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $task = $this->Tasks->patchEntity($task, $this->request->getData());
        //     if ($this->Tasks->save($task)) {
        //         $this->Flash->success(__('The task has been saved.'));
        //
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The task could not be saved. Please, try again.'));
        // }
        // $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        // $cNodes = $this->Tasks->CNodes->find('list', ['limit' => 200]);
        // $this->set(compact('task', 'users', 'cNodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $task = $this->Tasks->get($id);
        // if ($this->Tasks->delete($task)) {
        //     $this->Flash->success(__('The task has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        // }
        //
        // return $this->redirect(['action' => 'index']);
    }
}
