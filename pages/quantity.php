<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <script src="../assets/fruits.js"></script>
    <title>UniFruit</title>
</head>
<body class="body-fruit-90 flexColumn">
    <header class="flexCenter headerTitle">
    <div class="containerLink">
            <a href="viewFruits.php?user=<?php echo $_GET["user"]?>&&password=<?php echo $_GET['password']?>&&id_client=<?php echo $_GET['id_client']?>">Voltar</a>
        </div>
        <h1 class="title">Selecione a quantidade:</h1>
    </header>
    
    <section id="sectionQuantity">
        <div id="containerQuantity">
            <span class="textQuantity" id="nomeFruta">Nome da fruta: Banana</span>
            <span class="textQuantity" id="valorUnitario">Valor unitário: R$16,50</span>
            <span class="textQuantity">Quantidade:</span>
            <div id="containerBotoes">
                <button onclick="decreaseQuantity()" class="textQuantity buttonArrow"><</button>
                <span id="quantityText" class="textQuantity">1</span>
                <button onclick="increaseQuantity()" class="textQuantity buttonArrow">></button>
            </div>
            <span class="textQuantity" id="totalValue">Valor Total:</span>
            <button onclick="insertTransaction()" class="buttonQuantity">Comprar</button>
        </div>
    </section>

</body>
<script>
    var id_fruit = "<?php echo $_GET["id_fruit"]?>"
    var valor = dataFruits[id_fruit].value
    var quantidade = 1
    var user = "<?php echo $_GET['user']?>"
    var password = "<?php echo $_GET['password']?>"
    var id_client = "<?php echo $_GET['id_client']?>"
    var nome = id_fruit.charAt(0).toUpperCase() + id_fruit.slice(1);
    document.getElementById("nomeFruta").textContent = `Nome da fruta: ${nome}`
    document.getElementById("valorUnitario").textContent = `Valor unitário: R$${valor}`
    document.getElementById("quantityText").textContent = `${quantidade}`
    document.getElementById("totalValue").textContent = `Valor Total: R$${valor * quantidade}`

    function decreaseQuantity(){
        if(quantidade > 1){
            quantidade -= 1
            document.getElementById("quantityText").textContent = `${quantidade}`
            newValue = valor * quantidade
            document.getElementById("totalValue").textContent = `Valor Total: R$${newValue.toFixed(2)}`
        }
    }

    function increaseQuantity(){

        quantidade += 1
        document.getElementById("quantityText").textContent = `${quantidade}`
        newValue = valor * quantidade
        document.getElementById("totalValue").textContent = `Valor Total: R$${newValue.toFixed(2)}`

    }

    async function insertTransaction(){

        var data = {
            "user": "<?php echo $_GET['user']?>",
            "password": "<?php echo $_GET['password']?>",
            "id_fruit": dataFruits[id_fruit].id,
            "id_client": "<?php echo $_GET['id_client']?>",
            "quantityFruit": quantidade,
            "token": "d2f8a1e0b7c3c9e4b6a5"
        }

        data = JSON.stringify(data)

        try {
            const request = await fetch('http://localhost/projeto_web/api/insertTransactions.php', {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: data
            })

            const response = await request.json();
            if(response.success){
                alert("Compra realizada com sucesso")
                window.location.href = `myShopping.php?user=${user}&&password=${password}&&id_client=${id_client}`
                
            }else{
                alert(response.message)
            };

        } catch (error) {
            console.log("Ocorreu um erro na sua requisição: " + error)
        } 
    }
</script>
</html>