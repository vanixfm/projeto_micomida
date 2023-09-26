<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>🐵Micomida</title>
    <script>
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            max-width: 400px;
            border-radius: 10px;
            padding: 20px;
            background-color: #FF8C00;
        }

        .login-form .form-group {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-form" >
        <div class="text-center">
            <img src="img/logo.png" alt="Logo" width="150">
        </div>
        <form action="cadastrorestaurante.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <fieldset>
                <legend><b>CADASTRO</b></legend>
                <div class="form-group">
                <label> Nome restaurante</label>
                        <input type="text" name="nm_restaurante" placeholder="nome restaurante"maxlength="40" required /></br>
                    <label> Telefone       </label>    
                        <input type="text" name="telefone" placeholder="Telefone" maxlength="40" required />
                </div>
                    <?php
                        include "conn.php";
                        $exibir = $conn->prepare('SELECT * FROM `tipocomida`');
                        $exibir->execute();
                        while ($row = $exibir->fetch()) {
                            echo "<input type='checkbox' name='tipos_comida[]' value='" . $row['id_tipocomida'] . "'>" . $row['nm_tipocomida'] ;
                        }
                    ?>
                <div class="form-group">        
                    <input type="text" name="insta" placeholder="instagram" maxlength="100" required />
                </div>
                <div class="form-group"> 
                    <label for="rodizio">Rodízio</label>
                    <input type="radio"  name="rodizio" value="1">SIM
                    <input type="radio"  name="rodizio" value="0">NÃO
                </div>
                <div class="form-group">
                    <label for="alacarte">À la carte</label>
                    <input type="radio"  name="alacarte" value="1">SIM
                    <input type="radio"  name="alacarte" value="0">NÃO
                </div>
                <div class="form-group">
                    <label for="delivery">Delivery</label>
                    <input type="radio"  name="delivery" value="1">SIM
                    <input type="radio"  name="delivery" value="0">NÃO
                </div>
                <div class="form-group">    
                    <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" maxlength="15" /><br/>
                </div>
                <div class="form-group">                    
                    <input type="text" name="rua" id="rua" placeholder="Rua" maxlength="100" required/><br/>
                </div>
                <div class="form-group">        
                    <input type="text" name="numero" placeholder="Número" maxlength="10" required/><br/>
                </div>
                <div class="form-group">                
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" maxlength="80" required/>
                </div>
                <div class="form-group">                   
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" maxlength="80"required/><br/>
                </div>
                <div class="form-group"> 
                    <input type="text" name="uf" id="uf" placeholder="UF" maxlength="2" required/>
                </div>
                <div class="form-group">
                    <input type="email" name="emailrestaurante" placeholder="E-mail" required/>
                </div>
                <div class="form-group">
                    <input type="password" name="senharestaurante" placeholder="Senha" maxlength="40" required/><br/>
                </div>
                <p>Envie suas imagens e renomeie elas</p>
                <div class="form-group">
                    <input type="text" name="nome"/>
                    <input type="file" name="arquivo"/><br/>
                    <input type="submit" name="gravar" value="Enviar" /> 
                    <a href="index.php" >Voltar</a>
                </div>
            </fieldset>
        </div>
        </form>
    </div>
    <?php
    include "conn.php";
        if(isset($_POST['gravar'])){
        $emailrestaurante=$_POST['emailrestaurante'];
        $senharestaurante=md5($_POST['senharestaurante']);
        $gravar=$conn->prepare('INSERT INTO `login_restaurante` (`id_login`, `email`, `senha`) VALUES (NULL, :pemailrestaurante, :psenharestaurante);');
        $gravar->bindValue(':pemailrestaurante',$emailrestaurante);
        $gravar->bindValue(':psenharestaurante',$senharestaurante);
        $gravar->execute();
        $id_login_restaurante=$conn->lastinsertid();
        $cep=$_POST['cep'];
        $rua=$_POST['rua'];
        $numero=$_POST['numero'];
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $uf=$_POST['uf'];
        $gravar=$conn->prepare('INSERT INTO `endereco` (`id_endereco`, `cep_end`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `id_login` ) VALUES (NULL, :pcep, :prua, :pnumero, :pbairro, :pcidade, :puf, :pid_login_restaurante);');
        $gravar->bindValue(':pcep',$cep);
        $gravar->bindValue(':prua',$rua);
        $gravar->bindValue(':pnumero',$numero);
        $gravar->bindValue(':pbairro',$bairro);
        $gravar->bindValue(':pcidade',$cidade);
        $gravar->bindValue(':puf',$uf);
        $gravar->bindValue(':pid_login_restaurante',$id_login_restaurante);
        $gravar->execute();
        $id_endereco=$conn->lastinsertid();    
        $nm_restaurante=$_POST['nm_restaurante'];
        $telefone=$_POST['telefone'];
        $rodizio=$_POST['rodizio'];
        $delivery=$_POST['delivery'];
        $alacarte=$_POST['alacarte'];
        $insta=$_POST['insta'];
        $gravar=$conn->prepare('INSERT INTO `restaurante` (`id_restaurante`, `nm_restaurante`, `telefone_restaurante`, `id_login_restaurante`, `id_endereco`, `rodizio`, `delivery`, `a_la_carte`, `insta` ) VALUES (NULL, :pnm_restaurante, :ptelefone, :pid_login_restaurante, :pid_endereco, :prodizio, :pdelivery, :palacarte, :pinsta);');
        $gravar->bindValue(':pnm_restaurante',$nm_restaurante);
        $gravar->bindValue(':ptelefone',$telefone);
        $gravar->bindValue(':pid_login_restaurante',$id_login_restaurante);
        $gravar->bindValue(':pid_endereco',$id_endereco);
        $gravar->bindValue(':prodizio',$rodizio);
        $gravar->bindValue(':pdelivery',$delivery);
        $gravar->bindValue(':palacarte',$alacarte);
        $gravar->bindValue(':pinsta',$insta);
        $gravar->execute();
    $id_restaurante = $conn->lastInsertId();

    // Tipos de comida selecionados
    $tipos_comida = $_POST['tipos_comida'];

    // Inserir registros na tabela tipo_restaurante
    foreach ($tipos_comida as $id_tipocomida) {
        $gravar = $conn->prepare('INSERT INTO tipo_restaurante (id_restaurante, id_tipocomida) VALUES (:pid_restaurante, :pid_tipocomida);');
        $gravar->bindValue(':pid_restaurante', $id_restaurante);
        $gravar->bindValue(':pid_tipocomida', $id_tipocomida);
        $gravar->execute();
    }

    echo "<h1 style='color: white;'>Parabéns, Cadastro realizado com sucesso!</h1>";

    }
?>
<?php
include "conn.php";
if(isset($_POST['gravar'])){
    $nome=$_POST['nome'];
    $_UP['pasta']="arquivos/";
    $_UP['tamanho']=1024*1024*2;
    $_UP['extensao']=array('jpg','png','jpeg');
    $_UP['renomear']=true;

    //validação de extensão
    $explode=explode('.',$_FILES['arquivo']['name']);
    $aponta=end($explode);// guarda o ultimo valor do explode.
    $extensao=strtolower($aponta);//transforma tudo em minusculo.

    if(array_search($extensao,$_UP['extensao'])===false){// 3 iguais é pra ver se é identico.
        echo "Extensão não aceita";
        exit();
    }

    //validação de tamanho.
    if($_UP['tamanho']<=$_FILES['arquivo']['size']){
        echo "Arquivo  muito grande";
        exit();
    }

    //validação de nome(renomear);
    if($_UP['renomear']===true){
        $nome_final=md5(time()).".$extensao";
    }else{
        $nome_final=$_FILES['arquivos']['name'];
    }

    if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$nome_final)){
        include "conn.php";
        $url=$_UP['pasta'].$nome_final;
        $id_login_restaurante;  
        $grava=$conn->prepare('INSERT INTO arquivos (id_arq,nome_arq,url_arq,id_login) VALUES (NULL,:pnome, :purl, :pid_restaurante );');
        $grava->bindValue(':pnome',$nome);
        $grava->bindValue(':purl',$url);
        $grava->bindValue(':pid_restaurante',$id_login_restaurante);
        $grava->execute();
    }else{
        echo "Algo deu errado!";
    }

}
?>
<footer>
</footer>
</body>
</html>