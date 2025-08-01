<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
class LogModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Enregistre une action utilisateur dans les logs
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

    // Récupère les logs d'activité avec limite
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