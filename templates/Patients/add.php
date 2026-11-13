<?php
/**
 * 患者新規登録画面
 * 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>

<div class="patients-add">
    <div class="page-header">
        <h2>新規患者登録</h2>
    </div>
    <div class="patient-form">
        <?= $this->Form->create($patient) ?>
        
        <div class="form-grid">
            <div class="form-group">
                <?= $this->Form->control('patient_number', [
                    'label' => '患者番号',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('name', [
                    'label' => '氏名',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('name_kana', [
                    'label' => 'フリガナ',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('birth_date', [
                    'label' => '生年月日',
                    'type' => 'date',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('gender', [
                    'label' => '性別',
                    'type' => 'select',
                    'options' => [
                        '男性' => '男性',
                        '女性' => '女性',
                        'その他' => 'その他',
                    ],
                    'empty' => '選択してください',
                    'required' => true,
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('phone', [
                    'label' => '電話番号',
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('postal_code', [
                    'label' => '郵便番号',
                ]) ?>
            </div>
            <div class="form-group form-group-wide">
                <?= $this->Form->control('address', [
                    'label' => '住所',
                ]) ?>
            </div>
            <div class="form-group form-group-wide">
                <?= $this->Form->control('note', [
                    'label' => '備考',
                    'type' => 'textarea',
                    'rows' => 4,
                ]) ?>
            </div>
        </div>
        <div class="form-actions">
            <?= $this->Form->button('登録', [
                'class' => 'button',
            ]) ?>
            <?= $this->Html->link(
                'キャンセル',
                ['action' => 'index'],
                ['class' => 'button button-secondary']
            ) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>