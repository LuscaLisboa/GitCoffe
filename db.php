<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gitcoffe"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
)";
if ($conn->query($sql) === FALSE) {
    echo "Erro ao criar tabela de pedidos: " . $conn->error;
}

?>
