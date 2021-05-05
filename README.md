# API GAMING

Une API présentant la base de donnée du site GamingParadize avec API Platform

Par Hicham, Daho et Mikhail

## Environnement de développement

* PHP 7.4.1
* Composer
* Symfony CLI
* Docker (optionel)
* Docker-compose(Optionel)

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony) :

```bash
symfony check:requirements
```
### Lancer l'environnement de développement

```bash
docker compose up -d
symfony serve -d
```

### Créer la base de donnée

```bash
symfony console d:d:c
```

### Mettre à jour le cache

```bash
symfony console c:c
```

## Lancer des test

```bash
php bin/phpunit --testdox
```