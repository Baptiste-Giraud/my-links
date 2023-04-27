<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un lien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./dist/css/bundle.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="">
        <header>
            <h1>Ajouter un établissement</h1>
        </header>

        <main>
            <form id="myForm" method="post" action="../function.php">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom"><br>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse"><br>

            <label for="complement_adresse">Complément d'adresse :</label>
            <input type="text" id="complement_adresse" name="complement_adresse"><br>

            <label for="code_postal">Code postal :</label>
            <input type="text" id="code_postal" name="code_postal"><br>

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville"><br>

            <label for="num_tel">Numéro de téléphone portable :</label>
            <input type="text" id="num_tel" name="num_tel"><br>

            <label for="num_fixe">Numéro de téléphone fixe :</label>
            <input type="text" id="num_fixe" name="num_fixe"><br>

			<input type="hidden" name="function" value="insert_etablissement">


			<input type="submit" name="function" value="insert_etablissement">
            </form>
        </main>
    </body>
</html>

<script>
    // Récupérer le formulaire
    var form = document.getElementById("myForm");

    // Empêcher le comportement par défaut du formulaire
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        // Envoyer la requête au serveur
        var xhr = new XMLHttpRequest({responseType: 'text'});
        xhr.open(form.method, form.action);
        xhr.onload = function() {
            if (xhr.status === 201) {
                alert("L'établissement a été inséré avec succès !");
            } else {
                alert("Une erreur s'est produite lors de l'ajout de l'établissement");
            }
        };
        xhr.send(new FormData(form));
    });

</script>