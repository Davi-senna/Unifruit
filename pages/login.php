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
        <h1 class="title">Fazer Login:</h1>
    </header>
    
    <form class="formLogin" id="login" action="#">
        <input id="email" placeholder="Digite seu Email" type="e-mail" class="inputLogin flexCenter">
        <input id="password" placeholder="Digite sua senha" type="password" class="inputLogin flexCenter">
        <button type="submit" class="button-empty" id="button-login-page">Enviar</button>
        <span class="linkLogin"><a href="register.php" class="fruitLink">Criar uma nova conta</a></span>
    </form>

</body>
<script>
    document.getElementById("login").addEventListener('submit', (event) => {
        event.preventDefault();
        if(document.getElementById("email").value != '' && document.getElementById("password").value != ''){
            var data = {
                "user": document.getElementById("email").value,
                "password": document.getElementById("password").value,
                "token": "d2f8a1e0b7c3c9e4b6a5"
            }

            authenticate(JSON.stringify(data))

        }else{
            alert('Algum parâmetro obrigatório não foi preenchido')
        }
    })

    async function authenticate(data){
        try {
            const request = await fetch('http://localhost/projeto_web/api/authenticate.php', {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: data
            })

            const response = await request.json();
            if(response.success){
                console.log('Login realizado com sucesso')
                var user = response.data[0]['user'];
                var password = response.data[0]['password'];
                var id_client = response.data[0]['id'];
                window.location.href = `viewFruits.php?user=${user}&&password=${password}&&id_client=${id_client}`;
            }else{
                alert(response.message)
            };

        } catch (error) {
            console.log("Ocorreu um erro na sua requisição: " + error)
        }
    }
</script>
</html>