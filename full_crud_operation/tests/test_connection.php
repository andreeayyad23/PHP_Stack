<?php
// tests/test_connection.php

require '../config/db.php'; // Include the database connection

// Test the connection
try {
    $stmt = $pdo->query("SELECT 1"); // Simple query to test connection
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "Connection successful!";
    } else {
        throw new PDOException("Connection failed");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    $pdo = null;
}

// Additional improvements
function testConnection($pdo) {
    try {
        $stmt = $pdo->query("SELECT 1");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            throw new PDOException("Connection failed");
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    } finally {
        $pdo = null;
    }
}

if (testConnection($pdo)) {
    echo "Connection successful!";
}