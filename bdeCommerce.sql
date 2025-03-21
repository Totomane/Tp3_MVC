create database if not exists ecommerce;
use ecommerce;

drop table if exists produits;

create table produits (
  id_produit integer primary key auto_increment,
  titre varchar(254) not null,
  descriptif text not null,
  stock int not null,
  prix decimal not null,
  fabricant varchar(254) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

insert into produits(titre, descriptif, stock, prix, fabricant) values
  ('The 7th Continent Classic Edition', 'L’élément indispensable pour jouer au jeu. Elle vous propose d’affronter 3 malédictions – « La Déesse Vorace », « L’offrande aux Gardiens », « La traque sanguinaire ».', 145, 59.0, 'Serious Poulp'),
  ('7 Wonders', 'Prenez la tête de l’une des sept grandes cités du monde Antique. Exploitez les ressources naturelles de vos terres, participez à la marche en avant du progrès, développez vos relations commerciales et affirmez votre suprématie militaire. Laissez votre empreinte dans l’histoire des civilisations en bâtissant une merveille architecturale qui transcendera les temps futurs.', 54, 43.0, 'Repos Production'),
   ('Titles' , 'Un jeu d’ambiance et de culture générale pour tous les amateurs de cinéma',10, 25,'Vinca'),
  ('Skull & Roses','Jeu d’ambiance, bluff, déduction : réussir deux défis', 5, 16,'Asmodee');

