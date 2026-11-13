<?php
/**
 * 患者詳細画面
 * 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>

<div class="patients-view">
    <div class="page-header">
        <h2>患者詳細</h2>
        <div>
            <?= $this->Html->link(
                '患者情報を編集',
                ['action' => 'edit', $patient->id],
                ['class' => 'button']
            ) ?>
            <?= $this->Form->postLink(
                '患者を無効化',
                ['action' => 'deactivate', $patient->id],
                [
                    'confirm' => 'この患者を無効化してもよろしいですか？',
                    'class' => 'button button-secondary',
                ]
            ) ?>
            <?= $this->Html->link(
                '患者一覧へ戻る',
                ['action' => 'index'],
                ['class' => 'button button-secondary']
            ) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>患者番号</th>
            <td><?= h($patient->patient_number) ?></td>
        </tr>
        <tr>
            <th>氏名</th>
            <td><?= h($patient->name) ?></td>
        </tr>
        <tr>
            <th>フリガナ</th>
            <td><?= h($patient->name_kana) ?></td>
        </tr>
        <tr>
            <th>性別</th>
            <td><?= h($patient->gender) ?></td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td>
                <?= $patient->birth_date
                    ? $patient->birth_date->format('Y/m/d') : '' ?>
            </td>
        </tr>
        <tr>
            <th>郵便番号</th>
            <td><?= h($patient->postal_code) ?></td>
        </tr>
        <tr>
            <th>住所</th>
            <td><?= h($patient->address) ?></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><?= h($patient->phone) ?></td>
        </tr>
        <tr>
            <th>備考</th>
            <td><?= nl2br(h($patient->note)) ?></td>
        </tr>
    </table>
</div>