<?php   
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializamos una nueva sesión de curl con ch = curl handler
$sesionDeCurl = curl_init(API_URL);
# Indicamos que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($sesionDeCurl, CURLOPT_RETURNTRANSFER, true);
# Ejecutar la petición y guardar el resultado
$resultadoSesion = curl_exec($sesionDeCurl);
$datosApi = json_decode($resultadoSesion, true);
curl_close($sesionDeCurl);
# proyecto basado en repo de MiduDev https://youtu.be/BcGAPkjt_IE?feature=shared
# <pre><?= var_dump($datosApi) </pre>
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descubre las últimas películas de Marvel y sus fechas de estreno.">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Próximos estrenos de Marvel">
    <meta property="og:description" content="Descubre las últimas películas de Marvel y sus fechas de estreno.">
    <meta property="og:image" content="<?= $datosApi['poster_url']; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <title>Próximos estrenos de Marvel</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <img src="./assets/uploads/marvel.svg" alt="Logo marvel">
                </li>
                <li>
                    <h1>Próximos estrenos del universo Marvel</h1>
                </li>
            </ul>
        </nav>
    </header>
    <main role="main">
        <article>
            <figure>
                <img src="<?= $datosApi["poster_url"]; ?>" 
                alt="Poster de <?= $datosApi["title"]; ?>">
            </figure>
            <div>
                <h2><?= $datosApi["title"]; ?></h2>
                <p>Se estrena el: <?= $datosApi["release_date"]; ?></p>
                <p>Quedan: <?= $datosApi["days_until"]; ?> días</p>
                <p>Tipo: <?= $datosApi["type"]; ?></p>
                <p>Resumen: <?= $datosApi["overview"]; ?></p>
            </div>
        </article>

        <article>
            <figure>
                <img src="<?= $datosApi["following_production"]["poster_url"]; ?>" 
                alt="Poster de <?= $datosApi["following_production"]["title"]; ?>">
            </figure>
            <div>
                <h2><?= $datosApi["following_production"]["title"]; ?></h2>
                <p>Se estrena el: <?= $datosApi["following_production"]["release_date"]; ?></p>
                <p>Quedan: <?= $datosApi["following_production"]["days_until"]; ?> días</p>
                <p>Tipo: <?= $datosApi["following_production"]["type"]; ?></p>
                <p>Resumen: <?= $datosApi["following_production"]["overview"]; ?></p>
            </div>
        </article>
    </main>

    <footer>
        <p>&copy; 2024 Próximos estrenos del universo Marvel. Basado en un proyecto de 
            <a href="https://youtu.be/BcGAPkjt_IE?feature=shared">MiduDev</a> y en datos de la 
            <a href="https://whenisthenextmcufilm.com/api">API de estrenos MCU</a>
        </p>
    </footer>
</body>
</html>
