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
        <h1 class="title">Minhas compras:</h1>
    </header>
    
    <section id="infoShopping">
    <div id="containerShopping">
        
    </div>
    <span id="shoppingTotalValue" class="textQuantity">Valor total: R$000.00</span>
    </section>


</body>
<script>
    var user = "<?php echo $_GET["user"]?>"
    var id_client = "<?php echo $_GET['id_client']?>"
    var password = "<?php echo $_GET['password']?>"

    selectTransaction()


    async function selectTransaction(){

        var data = {
            "user":user,
            "password":password,
            "id_client":id_client,
            "token": "d2f8a1e0b7c3c9e4b6a5"
        }


        data = JSON.stringify(data)

        try {
            const request = await fetch('http://localhost/projeto_web/api/selectTransactions.php', {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: data
            })

            const response = await request.json();
            if(response.success){
                
                var transactions = response.data
                for(var i = 0; i < transactions.length; i++){

                    var containerTransaction = document.createElement("div")
                    containerTransaction.classList.add("containerTransaction")

                    var spanFruit = document.createElement("span")
                    spanFruit.classList.add("textInfoTransaction")
                    spanFruit.classList.add("flexCenter")
                    var textFruit = document.createTextNode(transactions[i].name.charAt(0).toUpperCase() + transactions[i].name.slice(1));
                    spanFruit.appendChild(textFruit)

                    var spanValue = document.createElement("span")
                    spanValue.classList.add("textInfoTransaction")
                    spanValue.classList.add("flexCenter")
                    var textValue = document.createTextNode("Valor: R$" + transactions[i].value);
                    spanValue.appendChild(textValue)


                    var spanQuantity = document.createElement("span")
                    spanQuantity.classList.add("textInfoTransaction")
                    spanQuantity.classList.add("flexCenter")
                    var textQuantity = document.createTextNode("Quantidade: " + transactions[i].quantityFruits);
                    spanQuantity.appendChild(textQuantity)

                    var buttonDump = document.createElement("button")
                    buttonDump.classList.add("buttonDump")
                    buttonDump.classList.add("flexCenter")
                    buttonDump.setAttribute("id", transactions[i].id);

                    var dumpImage = document.createElement("img");
                    dumpImage.src = "../assets/img/lixo.png";
                    dumpImage.alt = "Excluir compra";
                    dumpImage.classList.add("imageDump")
                    buttonDump.appendChild(dumpImage)

                    containerTransaction.appendChild(spanFruit)
                    containerTransaction.appendChild(spanValue)
                    containerTransaction.appendChild(spanQuantity)
                    containerTransaction.appendChild(buttonDump)
                    document.getElementById("containerShopping").appendChild(containerTransaction)
                }

                var buttons = document.getElementsByClassName("buttonDump");
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].addEventListener("click", function() {
                        deleteTransaction(this.id)
                    });
                }

                var totalValue = 0
                for(var i = 0; i < transactions.length; i++ ){
                    totalValue += parseFloat(transactions[i].value) * parseInt(transactions[i].quantityFruits)
                }

                document.getElementById("shoppingTotalValue").textContent = `Valor Total: R$${totalValue.toFixed(2)}`
                
            }else{
                alert(response.message)
            };

        } catch (error) {
            console.log("Ocorreu um erro na sua requisição: " + error)
        } 
    }

    async function deleteTransaction(id_transaction){

        var data = {
            "user":user,
            "password":password,
            "id_transaction": id_transaction,
            "token": "d2f8a1e0b7c3c9e4b6a5"
        }


        data = JSON.stringify(data)

        try {
            const request = await fetch('http://localhost/projeto_web/api/deleteTransaction.php', {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: data
            })

            const response = await request.json();
            if(response.success){
                
                alert("Compra deletada com sucesso")
                window.location.reload();
                
            }else{
                alert(response.message)
            };

        } catch (error) {
            console.log("Ocorreu um erro na sua requisição: " + error)
        } 
    }
</script>
</html>