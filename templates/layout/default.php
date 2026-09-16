<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'emr']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header class="emr-header">
        <div class="emr-header-title">
            <a href="<?= $this->Url->build('/') ?>">宮野クリニック 電子カルテ</a>
        </div>
        <div class="emr-header-user">
            ログインユーザー：未ログイン
        </div>
    </header>
    <div class="emr-layout">
        <aside class="emr-sidebar">
            <nav class="emr-menu">
                <a href="<?= $this->Url->build('/') ?>">ホーム</a>
                <a href="#">患者管理</a>
                <a href="#">受付管理</a>
                <a href="#">診察</a>
                <a href="#">予約管理</a>
            </nav>
        </aside>
        <main class="emr-main">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </main>
    </div>
    <footer>
    </footer>
</body>
</html>
