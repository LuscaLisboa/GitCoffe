<?php include('../db.php'); ?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto deletado com sucesso.";
} else {
    echo "Erro ao deletar produto: " . $conn->error;
}
header("Location: adm.php");
?>
