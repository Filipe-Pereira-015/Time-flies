<!--- Verifica se está cadastrado, se estiver exibe a mensagem em questão -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema_gerenciamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);

    $query = "SELECT * FROM Usuarios WHERE cpf = '$cpf'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<div class='message'>CPF já cadastrado. Tente novamente!</div>";
    }

    $conn->close();
}
?>