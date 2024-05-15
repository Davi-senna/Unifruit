<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>UniFruit</title>
</head>
<body class="bodyCenter body-fruit-70">
    <section class="sectionCenter">
        <h1 class="title">
            <p>Venha já comprar</p>
            <p>suas frutas</p>
        </h1>
        <button class="button-empty" id="button-initial-page">Ver frutas</button>
    </section>

</body>

<script>
    document.getElementById("button-initial-page").addEventListener('click', () => {
        window.location.href = 'pages/login.php'
    })
</script>

</html>