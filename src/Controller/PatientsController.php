<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{
    /**
     * 患者一覧
     */
    public function index()
    {
        // 患者一覧取得用のクエリ
        $query = $this->Patients
            ->find()
            ->where([
                'is_active' => true,
            ]);

        // 検索キーワードを取得
        $patientNumber = $this->request->getQuery('patient_number');
        $name = $this->request->getQuery('name');
        $nameKana = $this->request->getQuery('name_kana');

        // 患者番号で検索
        if (!empty($patientNumber)) {
            $query->where([
                'patient_number LIKE' => '%' . $patientNumber . '%',
            ]);
        }

        // 氏名で検索
        if (!empty($name)) {
            $query->where([
                'name LIKE' => '%' . $name . '%',
            ]);
        }

        // フリガナで検索
        if (!empty($nameKana)) {
            $query->where([
                'name_kana LIKE' => '%' . $nameKana . '%',
            ]);
        }

        // 患者番号順に並べる
        $patients = $query->orderBy([
            'patient_number' => 'ASC',
        ]);

        // テンプレートへ渡す
        $this->set(compact(
            'patients',
            'patientNumber',
            'name',
            'nameKana'
        ));
    }

    /**
     * 患者新規登録
     */
    public function add()
    {
        // 空のPatientエンティティを作成
        $patient = $this->Patients->newEmptyEntity();

        // POST送信された場合のみ登録処理
        if ($this->request->is('post')) {
            // 入力内容をPatientエンティティへ反映
            $patient = $this->Patients->patchEntity(
                $patient,
                $this->request->getData()
            );

            // 患者情報を保存
            if ($this->Patients->save($patient)) {
                $this->Flash->success('患者情報を登録しました。');

                return $this->redirect([
                    'action' => 'index',
                ]);
            }

            $this->Flash->error(
                '患者情報を登録できませんでした。入力内容を確認してください。'
            );
        }

        // 患者データをテンプレートへ渡す
        $this->set(compact('patient'));
    }

    /**
     * 患者詳細
     */
    public function view($id = null)
    {
        // IDを指定して患者情報を1件取得
        $patient = $this->Patients->get($id);

        // テンプレートへ渡す
        $this->set(compact('patient'));
    }

    /**
     * 患者情報編集
     */
    public function edit($id = null)
    {
        // 編集対象の患者情報を取得     
        $patient = $this->Patients->get($id);

        // PATCH / POST / PUT のとき更新処理
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity(
                $patient,
                $this->request->getData()
            );

            if ($this->Patients->save($patient)) {
                $this->Flash->success('患者情報を更新しました。');

                return $this->redirect([
                    'action' => 'view',
                    $patient->id,
                ]);
            }

            $this->Flash->error(
                '患者情報を更新できませんでした。入力内容を確認してください。'
            );
        }

        // テンプレートへ渡す
        $this->set(compact('patient'));
    }

    /**
     * 患者無効化
     */
    public function deactivate($id = null)
    {
        // POStのみ許可
        $this->request->allowMethod(['post']);

        // 対象患者を取得
        $patient = $this->Patients->get($id);

        // 無効状態に変更
        $patient->is_active = false;

        if ($this->Patients->save($patient)) {
            $this->Flash->success('患者情報を無効化しました。');
        } else {
            $this->Flash->error('患者情報を無効化できませんでした。');
        }

        return $this->redirect(['action' => 'index',]);
    }
}
