<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../dist/css/bundle.css">  </head>
  <body id="user_login">
    <div class="wrapper">
      <div class="card">
        <div class="card-header">Connexion</div>
        <form id="connexion-form">
          <div class="form-group">
            <label for="email-input">Adresse e-mail ou nom d'utilisateur</label>
            <input type="text" id="email-input" name="email" required />
          </div>
          <div class="form-group">
            <label for="password-input">Mot de passe</label>
            <input type="password" id="password-input" name="password" required />
          </div>
          <div class="form-group">
            <button type="submit" class="btn">Se connecter</button>
          </div>
          <div class="form-group">
            <div id="messages"></div>
          </div>
        </form>
      </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      const form = document.getElementById('connexion-form');
      const messages = document.getElementById('messages');
      const countdown = document.getElementById('countdown');

      form.addEventListener('submit', (event) => {
        event.preventDefault();

        const email = document.getElementById('email-input').value;
        const password = document.getElementById('password-input').value;

        fetch('../function.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        })
                    .then(response => {
            if (response.status == 200) {
                let count = 3;
                messages.innerHTML = `<div class="alert alert-success">Connexion réussie. Redirection dans ${count} secondes...</div>`;
                const intervalId = setInterval(() => {
                count--;
                if (count > 0) {
                    messages.innerHTML = `<div class="alert alert-success">Connexion réussie. Redirection dans ${count} secondes...</div>`;
                } else {
                    clearInterval(intervalId);
                    window.location.href = "link";
                }
                }, 1000);
            } else {
                throw response.status;
            }
            })

          .catch(error => {
            if (error === 403) {
              messages.innerHTML = `<div class="alert alert-danger">${error} - Forbidden</div>`;
            } else {
              messages.innerHTML = `<div class="alert alert-danger">${error} - Something went wrong</div>`;
            }
          });
      });
    </script>
  </body>
</html>
