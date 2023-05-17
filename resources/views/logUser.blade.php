<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page de login</title>
    <link rel="stylesheet" href="../css/style.css">
    @vite(['resources/css/app.css'])
</head>

<body>
    <header>

        <div id="logo"><img src="../image/logo.webp" alt="Logo 2ISA"></div>
        <div id="Titre_Header">
            <h1>Maintenance du Parc Informatique</h1>
        </div>

        <div id="textAvatar">User : <img id="avatar" src="../image/profile.png" alt="avatar">
        </div>

    </header>
    <div>
        <h2>Vos tickets :</h2>
        <p>
        <ul id="ulTicket">
            <li>
                <span id="titreTicket">Ticket 1 :</span>
            </li>
            <ul id="ulTicket">
                <li>
                    <strong>Numero :</strong>2458ah47
                </li>
                <li>
                    <strong>Date :</strong>11/03/23
                </li>
                <li>
                    <strong>Intervenant :</strong>Sylvain
                </li>
                <li><a href="creationMessage"><button>Nouveau message</button></a></li>
            </ul>
            <li>
                <span id="titreTicket">Ticket 2 :</span>
            </li>
            <ul id="ulTicket">
                <li>
                    <strong>Numero :</strong>48re564d
                </li>
                <li>
                    <strong>Date :</strong>11/04/23
                </li>
                <li>
                    <strong>Intervenant :</strong>Sylvain
                </li>
                <li><a href="creationMessage"><button>Nouveau message</button></a></li>
            </ul>
        </ul>
        </p>
    </div>
    <footer>
        <div>Torrenti Sylvain</div>
        <div>Projet Fil Rouge</div>
    </footer>
    <a href="acceuil">Retour a enlever</a>
</body>
