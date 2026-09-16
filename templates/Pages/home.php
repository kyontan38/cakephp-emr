<div class="emr-home">
    <div class="dashboard-header">
        <div>
            <h1>ダッシュボード</h1>
            <p>宮野クリニック</p>
        </div>

        <div class="dashboard-date">
            <?= date('Y年m月d日') ?>
        </div>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <div class="dashboard-card-title">本日の受付</div>
            <div class="dashboard-card-number">0<span>人</span></div>
        </div>
        <div class="dashboard-card">
            <div class="dashboard-card-title">診察待ち</div>
            <div class="dashboard-card-number">0<span>人</span></div>
        </div>
        <div class="dashboard-card">
            <div class="dashboard-card-title">診察済み</div>
            <div class="dashboard-card-number">0<span>人</span></div>
        </div>
    </div>
    <section class="quick-menu">
        <h2>クイックメニュー</h2>
        <div class="quick-menu-items">
            <a href="#" class="quick-menu-item">
                <div class="quick-menu-title">患者登録</div>
                <div class="quick-menu-description">新しい患者を登録します</div>
            </a>
            <a href="#" class="quick-menu-item">
                <div class="quick-menu-title">受付登録</div>
                <div class="quick-menu-description">患者の受付を登録します</div>
            </a>
            <a href="#" class="quick-menu-item">
                <div class="quick-menu-title">診察開始</div>
                <div class="quick-menu-description">本日の診察患者を確認します</div>
            </a>
        </div>
    </section>
    <section class="today-reception">
        <div class="section-header">
            <h2>本日の受付状況</h2>
            <a href="#" class="section-link">受付一覧へ戻る</a>
        </div>
        <div class="reception-table-wrapper">
            <table class="reception-table">
                <thead>
                    <tr>
                        <th>受付時刻</th>
                        <th>患者名</th>
                        <th>診療科</th>
                        <th>受診区分</th>
                        <th>状態</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="empty-message">本日の受付情報はありません</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>