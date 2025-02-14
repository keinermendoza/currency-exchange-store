<?php
$password = "";
echo password_hash($password, PASSWORD_BCRYPT);
?>

INSERT INTO users (email, username, password) VALUES ('probando', 'probando', '$2y$10$7Z7BUhJvcGlx32HlSEES/OjVFQFWfibGhxBU3b8qfsasJvI54iSUO');
