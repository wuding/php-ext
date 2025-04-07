<?php

// version 1.250203

try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
    // 对于示例，尝试在超时后重新连接
}
