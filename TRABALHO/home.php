<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Ordenador de Nomes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h1 class="display-1">Ordenador de Nomes</h1>
        </div>

    </nav>

    <main class="container">

        <div class="row justify-content-around mt-5">
            <div class="card text-white bg-secondary mb-3 col-4" style="width: 18rem; height: 20rem;">
                <img class="card-img-bottom cropped" src="https://tm.ibxk.com.br/materias/5748/21170.jpg?ims=1120x420" alt="Mestre dos Magos">
                <div class="card-body text-center">
                    <form action="Controller/enviarNome.php" method="post" enctype="multipart/form">
                        <h5 class="card-title">Inserir Novo Nome</h5>
                        <input type="text" class="form-control" id="nome" name="nome"></input>
                        <button type="submit" value="enviar" class="btn btn-success mt-3"><strong>Enviar</strong></a>

                    </form>

                </div>
                <div class="card-body text-center">
                    <form action="Controller/enviarNome.php?nomealeatorio=true" method="post" enctype="multipart/form">
                        <button type="submit" value="nomeAleatorio" class="btn btn-success "><strong>Nome Aleatório</strong></a>
                    </form>
                </div>

            </div>
            <div class="card text-white bg-secondary mb-3  col-4" style="width: 18rem;">
                <img class="card-img-top cropped" src="source/im2.png" alt="Vidente das advinhações">
                <div class="card-body text-center">
                    <h5 class="card-title">Lista dos Nomes</h5>
                    <?php

                    include "Controller/listarNomes.php";
                    $data = getData();
                    $count = 0;
                    if ($data->num_rows > 0) {
                        while ($row = $data->fetch_assoc()) {
                            echo "<p class='card-text' id='nome" . $count . "' value='".$row['nome']."'>" . $row['nome'] . "</p>";
                            $count++;
                        }
                        $nData = $data->num_rows;
                    } else {
                        echo "Cadastre um novo nome!";
                    }

                    ?>


                    <a href="#" onclick="ordenarNomes()"  class="btn btn-success"><strong>Ordenar</strong></a>
                    <a href="#" onclick="baguncarNomes()"  class="btn btn-success"><strong>Bagunçar</strong></a>
                    <div class="card-body text-center">
                    <form action="Controller/apagarNomes.php" method="post" enctype="multipart/form">
                        <input type="hidden" name="deletarBanco">
                        <button type="submit" value="nomeAleatorio" class="btn btn-danger "><strong>Resetar Lista</strong></a>
                    </form>
                    
                </div>
                <small id="tempo"> Tempo de execução: 0.00 </small>
                </div>
            </div>
        </div>


    </main>



    <script>
        function ordenarNomes() {

            
            var nomes = new Array();
            var nData = <?php echo $nData ?>;
            for (let i = 0 ; i < nData ; i++){
                nomes.push(document.getElementById("nome"+i).innerHTML);
            }


            inicio = window.performance.now();


            // INSERTION SORT

            for (let i = 1; i < nomes.length; i++) {
                let atual = nomes[i];
                let j;

                for (j = i - 1; j >= 0 && nomes[j] > atual; j--) {
                    nomes[j + 1] = nomes[j];
                }

                nomes[j + 1] = atual;
            }
            var fim = window.performance.now();
            var tempo = fim - inicio;

            for (let i = 0 ; i < nomes.length; i++) {
                document.getElementById("nome"+i).innerHTML = nomes[i];
            }
            document.getElementById("tempo").innerHTML = "Tempo de execução: "+tempo;
        }

        function baguncarNomes(){
            location.reload();
        }


    </script>
    
</body>

</html>