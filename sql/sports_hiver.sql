-- Active: 1722413444756@@127.0.0.1@3306@hotel

/*1 - Afficher la liste des hôtels. Le résultat doit faire apparaître le nom de l’hôtel et la ville*/
SELECT hot_nom, hot_ville
FROM hotel;

/*2 - Afficher la ville de résidence de Mr White Le résultat doit faire apparaître le nom, le prénom, et l'adresse du client*/
SELECT cli_nom, cli_prenom, cli_adresse
from client
where cli_nom = 'White';

/*3 - Afficher la liste des stations dont l’altitude < 1000 Le résultat doit faire apparaître le nom de la station et l'altitude*/
select sta_nom, sta_altitude
from station
where sta_altitude < 1000;

/*4 - Afficher la liste des chambres ayant une capacité > 1 Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité*/
select cha_numero, cha_capacite
from chambre
where cha_capacite > 1;

/* - Afficher les clients n’habitant pas à Londre Le résultat doit faire apparaître le nom du client et la ville*/
select cli_nom, cli_ville
from client
where cli_ville != 'Londre';

/*6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3 Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie*/
select hot_nom, hot_ville, hot_categorie
from hotel
where hot_ville = 'Bretou' and hot_categorie = 3;

/*7 - Afficher la liste des hôtels avec leur station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville)*/
select h.hot_nom, h.hot_categorie, h.hot_ville, s.sta_nom
from hotel h
join station s;

/*8 - Afficher la liste des chambres et leur hôtel Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre)*/
select h.hot_nom, h.hot_categorie, h.hot_ville, c.cha_numero
from hotel h
join chambre c;

/*9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de 
Bretou Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre et sa capacité)*/
select h.hot_nom, h.hot_categorie, h.hot_ville, c.cha_numero, c.cha_capacite
from hotel h
join chambre c on h.hot_id = c.cha_hot_id
where h.hot_ville = 'Bretou' 
and c.cha_capacite > 1;

/*10 - Afficher la liste des réservations avec le nom des clients Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation*/
select c.cli_nom, h.hot_nom, r.res_date
from client c
join reservation r on r.res_cli_id = cli_id
join hotel h;

/* 11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station Le résultat doit 
faire apparaître le nom de la station, le nom de l’hôtel, le numéro de la chambre et sa capacité)*/
select s.sta_nom, h.hot_nom, c.cha_numero, c.cha_capacite
from station s
join hotel h on h.hot_sta_id = s.sta_id
join chambre c on c.cha_hot_id = h.hot_id;

/*12 - Afficher les réservations avec le nom du client et le nom de l’hôtel 
Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de début du séjour et la durée du séjour*/
select c.cli_nom, h.hot_nom, r.res_date_debut, DATEDIFF(r.res_date_fin, r.res_date_debut)  duree_sejour
from client c
join hotel h
join reservation r on r.res_cli_id = c.cli_id;

/*13 - Compter le nombre d’hôtel par station*/
select s.sta_nom, count(h.hot_id)  nombre_hotels
from station s
join hotel h on h.hot_sta_id = s.sta_id
group by s.sta_nom;

/*Compter le nombre de chambre par station*/
 select s.sta_nom, count(c.cha_capacite) nombre_de_chambre
 from station s
 join hotel h on h.hot_sta_id = s.sta_id
 join chambre c on c.cha_hot_id = hot_id
 group by s.sta_nom;

 /*15 - Compter le nombre de chambre par station ayant une capacité > 1*/
 select s.sta_nom, count(c.cha_capacite) nombre_de_chambre
 from station s
 join hotel h on h.hot_sta_id = s.sta_id
 join chambre c on c.cha_hot_id = hot_id
 where c.cha_capacite > 1
 group by s.sta_nom;

/*16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation*/
select h.hot_nom
from client c
join reservation r on c.cli_id = r.res_cli_id
join hotel h
where c.cli_nom = 'Squire';

/*17 - Afficher la durée moyenne des réservations par station*/
SELECT s.sta_nom  station_nom,avg(datediff(r.res_date_fin, r.res_date_debut))  moyenne_duree_reservation
from station s
join hotel h on s.sta_id = h.hot_sta_id
join chambre c on h.hot_id = c.cha_hot_id
join reservation r on c.cha_id = r.res_cha_id 
group by s.sta_nom;


                                                   --VUE--

--Afficher la liste des hôtels avec leur station--
select * from hotel_station;

--Afficher la liste des chambres et leur hôtel--
select * from chambre_hotel;

--Afficher la liste des réservations avec le nom des clients--
select * from res_cli;

--Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station--
select * from chs;

--Afficher les réservations avec le nom du client et le nom de l’hôtel--
select * from rch;