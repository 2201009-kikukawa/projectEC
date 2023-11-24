<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/.css">
<h1>お知らせ</h1>
<?php
require 'db-connect.php'; // データベース接続

// オークション終了のチェック
$endQuery = "SELECT * FROM auction WHERE finishtime <= NOW() AND notified = 0";
$endedAuctions = $pdo->query($endQuery)->fetchAll();

foreach ($endedAuctions as $auction) {
    // 落札者の情報を取得
    $winnerQuery = "SELECT * FROM member WHERE member_id = ?";
    $winnerStmt = $pdo->prepare($winnerQuery);
    $winnerStmt->execute([$auction['winner_id']]);
    $winner = $winnerStmt->fetch();

    if ($winner) {
        // 落札者に通知
        $to = $winner['email']; // 落札者のEメール
        $subject = "オークション落札通知";
        $message = "おめでとうございます。オークションで「{$product['product_name']}」を落札しました。";
        mail($to, $subject, $message);


        // 通知済みフラグを更新
        $updateEndQuery = "UPDATE auction SET notified = 1 WHERE auction_id = ?";
        $pdo->prepare($updateEndQuery)->execute([$auction['auction_id']]);
    }
}

// オークション終了間近のチェック
$nearEndQuery = "SELECT * FROM auction WHERE finishtime BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 HOUR) AND near_end_notified = 0";
$nearEndAuctions = $pdo->query($nearEndQuery)->fetchAll();

foreach ($nearEndAuctions as $auction) {
    // オークションに参加しているユーザーを取得
    $biddersQuery = "SELECT DISTINCT member_id FROM bids WHERE auction_id = ?";
    $biddersStmt = $pdo->prepare($biddersQuery);
    $biddersStmt->execute([$auction['auction_id']]);
    $bidders = $biddersStmt->fetchAll();

    foreach ($bidders as $bidder) {
        // 各ユーザーに通知
        $userQuery = "SELECT mell FROM member WHERE member_id = ?";
        $userStmt = $pdo->prepare($userQuery);
        $userStmt->execute([$bidder['member_id']]);
        $user = $userStmt->fetch();

        if ($user) {
            $to = $member['mell']; // ユーザーのEメール
            $subject = "オークション終了間近通知";
            $message = "オークション「{$product['product_name']}」がまもなく終了します。";
            mail($to, $subject, $message);
        }
    }

    // 終了間近通知済みフラグを更新
    $updateNearEndQuery = "UPDATE auction SET near_end_notified = 1 WHERE auction_id = ?";
    $pdo->prepare($updateNearEndQuery)->execute([$auction['auction_id']]);
}
?>
