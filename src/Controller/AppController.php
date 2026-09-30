<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    
    /**
     * ユーザー役割ID
     * 
     * rolesテーブルのIDと対応する
     */
    protected const ROLE_ADMIN = 1;
    protected const ROLE_DOCTOR = 2;
    protected const ROLE_NURSE = 3;
    protected const ROLE_CLERK = 4;
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        // 認証済みユーザーだけが各画面へアクセスできるようにする
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    /**
     * ログイン中ユーザーの役割IDを取得する
     * 
     * @return int|null
     */
    protected function getCurrentRoleId(): ?int
    {
        // Authenticationからログイン中ユーザー情報を取得
        $identity = $this->request->getAttribute('identity');

        // 未ログインの場合はnullを返す
        if ($identity === null) {
            return null;
        }

        // users.role_id を取得
        return (int)$identity->get('role_id');
    }

    /**
     * 指定された役割のユーザーだけアクセスを許可する
     * 
     * @param array<int> $allowedRoleIds アクセスを許可する役割ID
     * @return \Cake\Http\Response|null
     */
    protected function requireRole(array $allowedRoleIds): ?\Cake\Http\Response
    {
        // 現在ログインしているユーザーの役割IDを取得
        $roleId = $this->getCurrentRoleId();

        // 許可された役割に含まれていない場合
        if ($roleId === null || !in_array($roleId, $allowedRoleIds, true)) {
            // 権限がないことをユーザーへ通知
            $this->Flash->error('この画面にアクセスする権限がありません。');

            // ホーム画面へ戻す
            return $this->redirect('/');
        }

        // アクセス可能な場合は何もしない
        return null;
    }
}
