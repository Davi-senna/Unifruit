<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>UniFruit</title>
</head>
<body class="body-fruit-90 flexColumn">
    <header class="flexCenter headerTitle">
        <h1 class="title">Frutas disponíveis:</h1>
    </header>
    <div id="searchFruitsContainer" class="flexCenter">
        <div id="searchFruitsGroup">
            <button onclick="searchFruits()" id="searchFruitsButton">
                <img src="../assets/img/lupa.png" alt="Pesquisar">
            </button>
            <input placeholder="Ex: Banana" type="text" id="searchFruitsInput" class="flexCenter">
        </div>
    </div>
    <div id="containerFuits">
        <div class="boxFruit" id="banana">
            <div class="imageFruit" id="image-banana">
            </div>
            <button class="boxBuyButton" onclick="quantity('banana','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
            
        </div>
        <div class="boxFruit" id="kiwi">
            <div class="imageFruit" id="image-kiwi"></div>
            <button class="boxBuyButton" onclick="quantity('kiwi','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="jabuticaba">
            <div class="imageFruit" id="image-jabuticaba"></div>
            <button class="boxBuyButton" onclick="quantity('jabuticaba','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="melao">
            <div class="imageFruit" id="image-melao"></div>
            <button class="boxBuyButton" onclick="quantity('melao','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="abacaxi">
            <div class="imageFruit" id="image-abacaxi"></div>
            <button class="boxBuyButton" onclick="quantity('abacaxi','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="goiaba">
            <div class="imageFruit" id="image-goiaba"></div>
            <button class="boxBuyButton" onclick="quantity('goiaba','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="melancia">
            <div class="imageFruit" id="image-melancia"></div>
            <button class="boxBuyButton" onclick="quantity('melancia','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="morango">
            <div class="imageFruit" id="image-morango"></div>
            <button class="boxBuyButton" onclick="quantity('morango','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        <div class="boxFruit" id="uva">
            <div class="imageFruit" id="image-uva"></div>
            <button class="boxBuyButton" onclick="quantity('uva','<?php echo $_GET['user']?>','<?php echo $_GET['password']?>','<?php echo $_GET['id_client']?>')">Comprar</button>
        </div>
        
    </div>

</body>
<script>
    function searchFruits(){
        var input = document.getElementById("searchFruitsInput").value.replace(/[^a-zA-Z]/g, '').toLowerCase();
        var boxFruits = document.getElementsByClassName("boxFruit")
        for(var i = 0; i < boxFruits.length; i++){
            document.getElementById(boxFruits[i].id).classList.add('displayNone');
        }
        if(input != ""){
            document.getElementById(input).classList.remove('displayNone')
        }else{
            for(var i = 0; i < boxFruits.length; i++){
                document.getElementById(boxFruits[i].id).classList.remove('displayNone');
            }
        }
    }

    function quantity(id_fruit,user,password,id_client){
        window.location.href = `quantity.php?id_fruit=${id_fruit}&&user=${user}&&password=${password}&&id_client=${id_client}`
    }

    document.getElementById("searchFruitsInput").addEventListener('keyup', function(event) {
    if (event.key === 'Enter' || event.keyCode === 13) {
        searchFruits()
    }

});
</script>
</html>