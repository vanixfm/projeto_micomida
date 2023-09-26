<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>🐵Micomida</title>
    <style>
        .nav-link {
            color: white;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: orange;
            transform: scale(1.2);
        }
    /* Estilos personalizados para o menu lateral */
    .sidebar { 
    width: 100%;
    height: 100%;
    background-color: ;
}
    .card {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color:;
}

.card img {
  max-width: 100%;
  max-height: 100%;
}
.social-icon {
    width: 30px; /* Defina o tamanho desejado para o ícone */
    height: 30px;
}
.footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .footer img {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
        }
        .footer p {
            font-size: 12px;
            margin: 0;
        }
    </style>
    
</head>
<body>
<nav>
    <div class="container-fluid">
    <div class="row" style="background-color:black">
        <div class="col-xl-2 col-lg-6 col-md-12" >
            <img src="img/logo.png" alt="Logo de um macaco segurando uma faixa escrito micomida" width="100%">
        </div>
        <div class="col-xl-10 col-lg-6 col-md-12" >
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                <a class="nav-link" href="login.php"><h1>Sou cliente</h1></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="loginrestaurante.php"><h1>Sou restaurante</h1></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="avaliacao.php"><h1>Contato</h1></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="favoritos.php"><h1>Sobre o Micomida</h1></a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
<?php
    if(isset($_GET['alerta'])){
        $nm_cliente = "Nome do Cliente"; // Substitua pelo nome do cliente obtido da tabela cliente
?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Deseja realmente sair?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Olá, <?php echo $nm_cliente; ?>. Tem certeza de que deseja sair?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php?logout" class="btn btn-primary">Sim</a>
                        <a href="index.php" class="btn btn-secondary" data-dismiss="modal">Não</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
<?php
    }

    if(isset($_GET['logout'])){
        session_destroy();
        header('location: login.php');
    }
?>

</div>

<?php
include "conn.php";

// Verifica se o botão de pesquisa foi acionado
if (isset($_POST['pesquisar'])) {
    // Obtém os valores dos filtros selecionados pelo usuário
    $nota = $_POST['nota'];
    $delivery = $_POST['delivery'];
    $rodizio = $_POST['rodizio'];

    // Constrói a consulta SQL com base nos filtros selecionados
    $sql = "SELECT * FROM restaurante WHERE 1=1";

    if (!empty($nota)) {
        $sql .= " AND nota = :nota";
    }

    if (!empty($delivery)) {
        $sql .= " AND delivery = :delivery";
    }

    if (!empty($rodizio)) {
        $sql .= " AND rodizio = :rodizio";
    }

    // Prepara a consulta
    $stmt = $conn->prepare($sql);

    // Define os valores dos parâmetros da consulta
    if (!empty($nota)) {
        $stmt->bindValue(':nota', $nota);
    }

    if (!empty($delivery)) {
        $stmt->bindValue(':delivery', $delivery);
    }

    if (!empty($rodizio)) {
        $stmt->bindValue(':rodizio', $rodizio);
    }

    // Executa a consulta
    $stmt->execute();

    // Obtém os resultados da consulta
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Exibe os resultados
    foreach ($resultados as $resultado) {
        echo "Nome: " . $resultado['nm_restaurante'] . "<br>";
        echo "Endereço: " . $resultado['endereco'] . "<br>";
        echo "Nota: " . $resultado['nota'] . "<br>";
        echo "Delivery: " . $resultado['delivery'] . "<br>";
        echo "Rodízio: " . $resultado['rodizio'] . "<br>";
        echo "<br>";
    }
}
?>
<section>
<div class="container-fluid">
    <div class="row" style="background-color:">
        <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="sidebar">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <?php
                        include "conn.php";
                        $exibir = $conn->prepare('SELECT * FROM `tipocomida`');
                        $exibir->execute();
                        while ($row = $exibir->fetch()) {
                            echo "<div class='form-check'>";
                            echo "<input type='checkbox' name='tipos_comida[]' value='" . $row['id_tipocomida'] . "' class='form-check-input'>";
                            echo "<label class='form-check-label'>" . $row['nm_tipocomida'] . "</label>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="sidebar">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="nota">Nota:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota" value="" class="form-check-input" checked>
                            <label class="form-check-label" for="nota">Todas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota1" value="1" class="form-check-input">
                            <label class="form-check-label" for="nota1">1 estrela</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota2" value="2" class="form-check-input">
                            <label class="form-check-label" for="nota2">2 estrelas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota3" value="3" class="form-check-input">
                            <label class="form-check-label" for="nota3">3 estrelas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota4" value="4" class="form-check-input">
                            <label class="form-check-label" for="nota4">4 estrelas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="nota" id="nota5" value="5" class="form-check-input">
                            <label class="form-check-label" for="nota5">5 estrelas</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-2 col-md-2">
            <div class="sidebar">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="delivery">Delivery:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="delivery" id="delivery" value="" class="form-check-input" checked>
                            <label class="form-check-label" for="delivery">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="delivery" id="deliverySim" value="sim" class="form-check-input">
                            <label class="form-check-label" for="deliverySim">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="delivery" id="deliveryNao" value="nao" class="form-check-input">
                            <label class="form-check-label" for="deliveryNao">Não</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-2 col-md-2">
            <div class="sidebar">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="rodizio">Rodízio:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rodizio" id="rodizio" value="" class="form-check-input" checked>
                            <label class="form-check-label" for="rodizio">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rodizio" id="rodizioSim" value="sim" class="form-check-input">
                            <label class="form-check-label" for="rodizioSim">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rodizio" id="rodizioNao" value="nao" class="form-check-input">
                            <label class="form-check-label" for="rodizioNao">Não</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2">
            <div class="sidebar">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="alacarte">Rodízio:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="alacarte" id="alacarte" value="" class="form-check-input" checked>
                            <label class="form-check-label" for="alacarte">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rodizio" id="alacarteSim" value="sim" class="form-check-input">
                            <label class="form-check-label" for="alacarteSim">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="alacarte" id="alacarteNao" value="nao" class="form-check-input">
                            <label class="form-check-label" for="alacarteNao">Não</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-12 col-lg-6 col-md-4 ">
        <h1>Conteúdo Principal</h1>
        <?php
            include "conn.php";
            $exibir = $conn->prepare('SELECT restaurante.nm_restaurante, restaurante.telefone_restaurante, restaurante.insta, arquivos.url_arq, endereco.*, AVG(avaliacao.nota) as media_nota
                                        FROM restaurante
                                        INNER JOIN login_restaurante ON restaurante.id_login_restaurante = login_restaurante.id_login
                                        INNER JOIN arquivos ON login_restaurante.id_login = arquivos.id_login
                                        INNER JOIN endereco ON login_restaurante.id_login = endereco.id_login
                                        LEFT JOIN avaliacao ON restaurante.id_restaurante = avaliacao.id_restaurante
                                        GROUP BY restaurante.id_restaurante');
            $exibir->execute();
            $rows = $exibir->fetchAll();
            
            if (count($rows) == 0) {
                echo "Nenhum resultado encontrado.";
            } else {
                $i = 1; // contador para controlar a exibição de três cards por linha
                foreach ($rows as $row) {
                    if ($i == 1) {
                        echo '<div class="row">';
                    }
                    ?>
           <div class="col-md-4">
               <div class="card h-100">
                   <img src="<?php echo $row['url_arq']; ?>" alt="Imagem">
                   <div class="card-body">
                       <h5 class="card-title"><?php echo $row['nm_restaurante']; ?></h5>
                       <p class="card-text">Telefone <?php echo $row['telefone_restaurante']; ?></p>
                       <p class="card-text">Endereço: <?php echo $row['rua'],"-".$row['numero'],"-".$row['bairro'],"-".$row['cidade'],"-".$row['uf']; ?></p>
                       <p class="card-text"><a href="<?php echo $row['insta']; ?>"><img src="img/insta.jpg" class="social-icon"></a></p>

                       <p class="card-text">Avaliação:
                       <?php
                        $media_nota = round($row['media_nota']); // Arredonda para o número inteiro mais próximo
                        for ($j = 0; $j < $media_nota; $j++) {
                            echo '★'; // Caractere Unicode para a estrela preenchida
                        }
                        echo ' (' . $media_nota . ')';
                        ?>
                       </p>
                       
                       
                    </div>
                </div>
           </div>
           <?php
           if ($i == 3) {
               echo '</div><br>'; // fecha a linha de cards a cada três elementos
               $i = 1;
           } else {
               $i++;
           }
       }
   
       // Caso a última linha não tenha três elementos, fecha a div da linha
       if ($i != 1) {
           echo '</div><br>';
       }
   }
   
                   ?>

        </div>
    </div>
</div>
</section>
<footer class="footer">
    <img src="img/logo.png" alt="Logo de um macaco segurando uma faixa escrito micomida">
    <p>Todos os direitos reservados &copy; 2023 - Micomida</p>
</footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
</body>
</html>

