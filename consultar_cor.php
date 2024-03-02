<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "Di716555";
$dbname = "bancodedados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$numero = '0';
// Consulta a informação no banco de dados
$sql = "SELECT numero FROM numbers WHERE numero = '$numero'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se a informação estiver no banco de dados, obtém a cor correspondente
    $row = $result->fetch_assoc();
    $cor = $row['cor'];

    // Define o estilo CSS para a cor do elemento
    echo "<style>#num0 { color: $cor; }</style>";
} else {
    echo "Informação não encontrada no banco de dados.";
}

$conn->close();
?>