<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "Di716555";
$dbname = "new_schema";

// Dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$numeros = $_POST['numeros'];


// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se a informação já existe no banco de dados
$sql = "SELECT * FROM valores WHERE numeros = '$numeros'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "Numeros indisponiveis";
}
   // Preparar a query para inserir os dados no banco de dados
$sql_insert = "INSERT INTO valores (nome, telefone, numeros, imagem) VALUES ('$nome', '$telefone', '$numeros', ?)";
$stmt = $conn->prepare($sql_insert);

// Se a preparação da declaração foi bem-sucedida
if ($stmt) {
    // Bind da imagem como um parâmetro BLOB
    $stmt->bind_param("b", $conteudo_imagem); }

    // Executar a query para inserir os dados no banco de dados
    if ($stmt->execute()) {
        echo 'Sucesso !';}
     else {
        echo "Numeros ja escolhidos, escolha novamente ";
    }
    
$conn->close();
?>
