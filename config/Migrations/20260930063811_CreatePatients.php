<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreatePatients extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/5/guides/writing-migrations/migration-methods.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('patients');
        
        $table
            // 患者番号
            ->addColumn('patient_number', 'string', [
                'limit' => 20,
                'null' => false,
            ])

            // 氏名
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false,
            ])

            // フリガナ
            ->addColumn('name_kana', 'string', [
                'limit' => 100,
                'null' => false,
            ])

            // 生年月日
            ->addColumn('birth_date', 'date', [
                'null' => false,
            ])

            // 性別
            ->addColumn('gender', 'string', [
                'limit' => 10,
                'null' => false,
            ])

            // 郵便番号
            ->addColumn('postal_code', 'string', [
                'limit' => 10,
                'null' => true,
                'default' => null,
            ])

            // 住所
            ->addColumn('address', 'string', [
                'limit' => 255,
                'null' => true,
                'default' => null,
            ])

            // 電話番号
            ->addColumn('phone', 'string', [
                'limit' => 20,
                'null' => true,
                'default' => null,
            ])

            // 備考
            ->addColumn('note', 'text', [
                'null' => true,
                'default' => null,
            ])

            // 作成日時
            ->addCOlumn('created', 'datetime', [
                'null' => false,
            ])

            // 更新日時
            ->addColumn('modified', 'datetime', [
                'null' => false,
            ])

            // 患者番号は重複不可
            ->addIndex(
                ['patient_number'],
                ['unique' => true]
            )

            ->create();
    }
}
