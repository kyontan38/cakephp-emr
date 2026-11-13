<?php
/**
 * 患者一覧画面
 * 
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Patient> $patients
 * @var string|null $patientNumber
 * @var string|null $name
 * @var string|null $nameKana
 */
?>

<div class="patients-index">
    <div class="page-header">
        <h2>患者管理</h2>

        <?= $this->Html->link('+ 新規患者登録', ['action' => 'add'], ['class' => 'button']) ?>
    </div>
    <div class="patient-search">
        <?= $this->Form->create(null, [
            'type' => 'get',
            'url' => ['action' => 'index'],
        ]) ?>
        <div class="search-row">
            <?= $this->Form->control('patient_number', [
                'label' => '患者番号',
                'value' => $patientNumber,
                'required' => false,
            ]) ?>
            <?= $this->Form->control('name', [
                'label' => '氏名',
                'value' => $name,
                'required' => false,
            ]) ?>
            <?= $this->Form->control('name_kana', [
                'label' => 'フリガナ',
                'value' => $nameKana,
                'required' => false,
            ]) ?>
            <?= $this->Form->button('検索', [
                'type' => 'submit',
                'class' => 'button',
            ]) ?>
            <?= $this->Html->link(
                '解除',
                ['action' => 'index'],
                ['class' => 'button button-secondary']
            ) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="patients-table">
        <table>
            <thead>
                <tr>
                    <th>患者番号</th>
                    <th>氏名</th>
                    <th>フリガナ</th>
                    <th>性別</th>
                    <th>生年月日</th>
                    <th>電話番号</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?= h($patient->patient_number) ?></td>
                        <td><?= $this->Html->link(
                                h($patient->name),
                                ['action' => 'view', $patient->id]
                            ) ?></td>
                        <td><?= h($patient->name_kana) ?></td>
                        <td><?= h($patient->gender) ?></td>
                        <td><?= $patient->birth_date ? $patient->birth_date->format('Y/m/d') : '' ?></td>
                        <td><?= h($patient->phone) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>