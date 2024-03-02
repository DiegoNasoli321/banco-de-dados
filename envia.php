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
    echo "Número escolhido indisponível.";
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
        echo "<!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    background-color: lightgreen;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .mensagem {
                    text-align: center;
                    padding: 20px;
                    background-color: white;
                    border-radius: 10px;
                }
            </style>
        </head>
        <body>
            <div class='mensagem'>
                <h1>Sua mensagem foi enviada com sucesso!</h1>
                <p>Obrigado por enviar seus dados.</p>
            </div>
            <script>
                // Limpa os campos do formulário após o envio
                document.getElementsByTagName('form')[0].reset();
            </script>
        </body>
        </html>";
    }
     else {
        echo "Erro ao inserir informação: " . $conn->error;
    }

$conn->close();
?>
