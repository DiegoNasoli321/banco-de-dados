<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['numeros'])) {
        $numeros = $data['numeros'];

        // Conexão com o banco de dados (substitua pelos seus dados)
        $servername = "localhost";
        $username = "root";
        $password = "Di716555";
        $dbname = "bancodedados";

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Processar e exibir os números recebidos
        echo "Números selecionados:<br>";
        foreach ($numeros as $numero) {
            echo $numero . "<br>";
          $sql = "INSERT INTO numbers (numero) VALUES ('$numero')";
          $conn->query($sql);
        }

        // Fechar a conexão
        $conn->close();
    } else {
        echo "Nenhum número foi enviado.";
    }
} else {
    echo "Método não permitido.";
}

?>