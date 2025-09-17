<!DOCTYPE html>
<html lang="fr">

<head>
  <!--
    /*
    ###################################################################
    ###################################################################
    ##                                                               ##
    ##                           Bel-CMS                             ##
    ##                      Bel-CMS Version 4.0.0                    ##
    ##                  Systeme de gestion de contenue               ##
    ##                            PHP 8.4                            ##
    ##                  Copyright 2014-2025 by Bel-CMS               ##
    ##                 Développement par : Determe Stive             ##
    ##                                                               ##
    ###################################################################
    ###################################################################
    */
    -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Récupération de compte</title>
  <script type="text/javascript" src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="/pages/user/js/javascript.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #6c5ce7, #00b894);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #444;
    }

    input[type="email"],
    input[type="text"] {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 0.5rem;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #6c5ce7;
      outline: none;
    }

    .token-button {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #6c5ce7;
      color: white;
      border: none;
      padding: 0.6rem;
      border-radius: 0.5rem;
      font-size: 0.95rem;
      cursor: pointer;
      margin-bottom: 1rem;
      transition: background-color 0.3s ease;
      position: relative;
      width: 100%;
      min-height: 42px;
    }

    .token-button:hover {
      background-color: #5a4bcf;
    }

    .spinner {
      height: 18px;
      border: 3px solid #fff;
      border-top-width: 3px;
      border-top-style: solid;
      border-top-color: rgb(255, 255, 255);
      border-top: 3px solid transparent;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      position: absolute;
      top: 14px;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    .submit-btn {
      width: 100%;
      padding: 0.75rem;
      background-color: #6c5ce7;
      color: white;
      border: none;
      border-radius: 0.5rem;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .submit-btn:hover {
      background-color: #5a4bcf;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>🔐 Récupérer votre compte</h2>
    <form id="Login" action="/User/sendLostPassword" method="post">
      <label for="email">Adresse e-mail</label>
      <input type="email" id="email" name="mail" value="" placeholder="exemple@domaine.com" required>
      <?php
      if (isset($_GET['token']) and strlen($_GET['token']) == 32) {
        $token = $_GET['token'];
      ?>
      <?php
      } else {
        $token = null;
      ?>
        <button type="button" class="token-button" id="requestTokenBt">
          <span>📩 Demander ici votre token</span>
        </button>
      <?php
      }
      ?>
      <label for="token">Token de récupération</label>
      <input type="text" id="token" value="<?= $token; ?>" name="token" placeholder="Entrez votre token" required>

      <button type="submit" class="submit-btn">Valider</button>
    </form>
  </div>
</body>

</html>