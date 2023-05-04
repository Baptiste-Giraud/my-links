
# My-links

Projet avec mise en prod automatique au PUSH


## Load project

Pour dev en local:

STEP 1 -> passer sur la branch dev
```bash
  git checkout dev
```

STEP 2 -> passer sur la branch dev

```bash
  git add .
  git commit -am "votre commit"
  git push origin dev
```

STEP 3 -> install de la base de données

```bash
  dans votre phpmyadmin import du my-links.sql
```

STEP 4 -> Setup de l'environnement

```bash
  dans /config copier les information du .env.example
  puis coller les dans un .env dans le /config 
  puis remplacer vos information de connexion du .env
  supprimer pour un environnement de dev local le contenue du .htaccess et le remettre avant le push (le contenue est dans le .htaccess.exemple)
```



__ Si scss npm run sass pour compiler__

gulp en cours :

gulp sass : compile les fichiers SCSS en CSS et les place dans le dossier dist/css.
gulp js : concatène et minifie les fichiers JavaScript en un seul fichier nommé bundle.js et le place dans le dossier dist/js.
gulp css : concatène et minifie les fichiers CSS en un seul fichier nommé bundle.css et le place dans le dossier dist/css.
gulp watch : surveille les fichiers source pour les modifications et exécute automatiquement les tâches appropriées lorsque des modifications sont détectées.
gulp ou gulp default : exécute les tâches par défaut (sass, js, css, images, watch) en parallèle.
