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
</head>
<body>
<nav>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xl-2 col-lg-6 col-md-12" >
        </div>
        <div class="col-xl-10 col-lg-6 col-md-12" >
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cadastrocliente.php">Sou cliente</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cadastrorestaurante.php">Sou restaurante</a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
    <div>
    </div>
    </div>
    <footer>
</footer>
</body>
</html>
<?php
    include "conn.php";
    function mais_recente (ultimo id inserido){

    }
    function classicos(mais antigos(id mais antigos)){

    }
    function melhor_nota (avg, media de nota e colocar filtro por nota ){

    }
    function preço(barato,medio,caro){

    }
    function mais comentarios(destaque,tendencias,em alta, tanto faz um desses 3 nomes){

    }
    function(filtro que retorna os resutados que conhetam assinalado na checkbox(tipo de comida(futuramente tipo de restaurante(e ou tipo de prato)))){
        
    }
?>
functionmais recente (ultimo id inseido)
classicos(mais antigos(id mais antigos))]
melhor nota (avg, media de nota e colocar filtro por nota )
filtro por $preco