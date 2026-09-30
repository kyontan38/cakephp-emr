<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find()
            ->contain(['Roles']);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Roles']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
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

    /**
     * アクション実行前の共通処理
     * 
     * loginアクションのみ、未ログイン状態でもアクセスを許可する
     * 
     * @param \Cake\Event\EventInterface $event イベント
     * @return void
     */
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);

        // ログイン画面は未認証でもアクセス可能にする
        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * ログイン処理
     * 
     * Authenticationプラグインによる認証結果を確認し、
     * 認証成功時はホーム画面へ遷移する
     * 
     * @return \Cake\Http\Response|null|void
     */
    public function login()
    {
        // Authenticationミドルウェアによる認証結果を取得
        $result = $this->request
            ->getAttribute('authentication')
            ->getResult();

        // ログインフォームがPOST送信された場合
        if ($this->request->is('post')) {
            // 認証成功時
            if ($result->isValid()) {
                // ホーム画面へ移動
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'display',
                    'home',
                ]);
            }

            // 認証失敗時
            $this->Flash->error(
                'ユーザーIDまたはパスワードが正しくありません。'
            );
        }   
    }

    /**
     * ログアウト処理
     * 
     * 現在の認証情報を破棄し、
     * ログイン画面へ戻す。
     * 
     * @return \Cake\Http\Response
     */
    public function logout()
    {
        // Authenticationサービスを取得
        $authentication = $this->request->getAttribute('authentication');

        // 認証情報を破棄
        $result = $authentication->clearIdentity(
            $this->request,
            $this->response
        );

        // clearIdentity()が返した新しいResponseを利用する
        $this->request = $result['request'];
        $this->response = $result['response'];

        // ログイン画面へ戻る
        return $this->redirect('/login');
    }

}
