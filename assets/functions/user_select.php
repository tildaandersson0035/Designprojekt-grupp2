<?php
$sql = "SELECT * FROM users ORDER BY userID DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
