
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
```

Pour merge sur le serveur validation de la merge request par un membre du groupe.