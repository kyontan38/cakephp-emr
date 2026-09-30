<?php
/**
 * ログイン画面
 *
 * @var \App\View\AppView $this
 */
?>

<?= $this->Html->css('login') ?>

<div class="login-container">
    <div class="login-panel">
        <div class="login-header">
            <h1>電子カルテシステム</h1>
            <p>宮野クリニック</p>
        </div>
        <div class="login-body">
            <h2>ログイン</h2>
            <?= $this->Form->create() ?>
            <div class="form-group">
                <?= $this->Form->control('username', [
                    'label' => 'ユーザーID',
                    'placeholder' => 'ユーザーIDを入力してください',
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('password', [
                    'label' => 'パスワード',
                    'placeholder' => 'パスワードを入力してください',
                ]) ?>
            </div>
            <div class="login-button-area">
                <?= $this->Form->button('ログイン', [
                    'class' => 'login-button',
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>