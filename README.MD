# Projet de ING1 G1

## Instructions d'instalation

1. Cloner le repository github (`git clone https://github.com/lucley64/SuperProjetSite.git`)
2. Initialiser le sous-module API (`git submodule update`)
3. Creer l'itilisateur de la base de données en executant le fichier creerutilisateurbdd.php (`php php/creerutilisateurbdd.php`)
4. Importer la base de données data.sql (`sudo source data/data.sql`)
5. Demarer le serveur de l'api en executant la commande `mvn compile exec:java -Dexec.mainClass="com.example.projet.Serveur"` depuis le repertoire api
6. Demarer le serveur du site en executant la commande `php -S localhost:8081` depuis le même repertoire que le fichier index.php
7. Acceder au site depuis le lien [site](http://localhost:8081/)

### Creer un admin

Executer le fichier creer1compteadmin.php (`php php/creer1compteadmin.php`)
