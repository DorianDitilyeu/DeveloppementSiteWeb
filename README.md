Code de DORIAN DITILYEU LPDIM CALAIS
PHP Evaluation
Installation de la Base de données :
 - Création de la base de données nommés "micro blog"
 - Création de la table "messages"
 - Création de la table "utilisateur"
 
CREATE DATABASE micro blog;
 
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`));
