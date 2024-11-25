<?php
// api/api.php

require '../config/db.php'; // Include the database connection

/**
 * Retrieve all users from the database
 *
 * This function retrieves all users from the 'users' table
 * in the database and returns them as an array of associative
 * arrays, where each array represents a single user.
 *
 * @return array List of users
 */
function getAllUsers() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to retrieve users']);
        exit;
    }
}

/**
 * Create a new user in the database
 *
 * @param array $data The request data
 * @return int The ID of the created user
 */
function createUser($data) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email']
        ]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to create user']);
        exit;
    }
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $users = getAllUsers();
    header('Content-Type: application/json');
    echo json_encode($users);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['name']) || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid request data']);
        exit;
    }
    $userId = createUser($data);
    header('Content-Type: application/json');
    echo json_encode(['id' => $userId]);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}
?>