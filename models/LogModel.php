<?php
class LogModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function logAction($userId, $actionType, $details = null) {
        $query = "INSERT INTO modifications 
                 (utilisateur_id, action, details) 
                 VALUES (:user_id, :action, :details)";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':user_id' => $userId,
            ':action' => $actionType,
            ':details' => json_encode($details)
        ]);
    }

    public function getLogs($limit = 100) {
        $query = "SELECT m.*, u.email 
                 FROM modifications m
                 JOIN utilisateurs u ON m.utilisateur_id = u.id
                 ORDER BY m.date_modification DESC
                 LIMIT :limit";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}