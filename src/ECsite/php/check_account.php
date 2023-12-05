<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db-connect.php';
    $pdo = new PDO($connect, USER, PASS);
    $accountName = $_POST['account_name'];
    $query = "SELECT COUNT(*) AS count FROM member WHERE account_name = :account_name";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':account_name', $accountName);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        if ($result['count'] > 0) {
            echo json_encode(['error' => true, 'message' => 'このアカウント名は既に使用されています。']);
        } else {
            echo json_encode(['error' => false, 'message' => 'アカウント名は使用可能です。']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => true, 'message' => 'データベースエラーが発生しました。']);
    }
}
?>