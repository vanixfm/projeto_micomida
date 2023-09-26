$tipo = $_POST['tipo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($tipo == "cliente") {
  // Realizar o processo de login para o cliente
  // ...
} elseif ($tipo == "restaurante") {
  // Realizar o processo de login para o restaurante
  // ...
} else {
  // Tipo inválido, tratar o erro
  // ...
}
Dessa forma, você pode tratar os processos de login separadamente, dependendo do tipo selecionado pelo usuário.






