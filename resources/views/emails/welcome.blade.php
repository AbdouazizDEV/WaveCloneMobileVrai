<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenue sur Wave</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2a5298;
        }
        .content {
            margin-bottom: 30px;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .qr-code img {
            max-width: 200px;
        }
        .info-list {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue {{ $user->prenom }} {{ $user->nom }}</h1>
    </div>

    <div class="content">
        <p>Nous sommes ravis de vous accueillir sur notre plateforme de transfert d'argent.</p>
        
        <div class="qr-code">
            <p>Voici votre code QR personnel :</p>
            <img src="{{ $qrUrl }}" alt="QR Code">
        </div>

        <div class="info-list">
            <h3>Informations importantes :</h3>
            <ul>
                <li>Votre email : {{ $user->email }}</li>
                <li>Votre téléphone : {{ $user->telephone }}</li>
                <li>Code de vérification : {{ $user->code }}</li>
            </ul>
        </div>

        <p>Pour des raisons de sécurité, veuillez garder ces informations confidentielles.</p>
    </div>

    <div class="footer">
        <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    </div>
</body>
</html>