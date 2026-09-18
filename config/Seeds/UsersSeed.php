<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\BaseSeed;

/**
 * Users seed.
 * 
 * 初期管理者ユーザーを登録するためのSeed
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/5/guides/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        
        // パスワードを安全に保存するためのハッシュ生成
        $passwordHasher = new DefaultPasswordHasher();
    
    
        // 初期管理者ユーザー
        $data = [
            [
                // RoleSeedで「管理者」を最初に登録しているため role_id = 1
                'role_id' => 1,

                // ログイン時に使用するユーザー名
                'username' => 'admin',

                // 平文では保存せず、必ずハッシュ化する
                'password' => $passwordHasher->hash('Admin1234!'),

                // 画面上で表示する職員名
                'name' => 'システム管理者',

                // アカウントを有効状態にする
                'is_active' => true,

                // 登録日時・更新日時
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        // usersテーブルへ初期データを登録
        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
