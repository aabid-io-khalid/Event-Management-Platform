<?php
class Transaction {
    public static function save($userId, $amount, $status) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO transactions (user_id, amount, status) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $amount, $status]);
    }
}
?>
