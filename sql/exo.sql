/*Afficher toutes les informations concernant les employés*/
Select * from employe;

/*Afficher toutes les informations concernant les départements.*/
Select * from dept;
 
 /*Afficher le nom, la date d'embauche, le numéro du supérieur, le
numéro de département et le salaire de tous les employés.*/
SELECT nom, dateemb, nosup, nodep, salaire
FROM employe;

/*Afficher le titre de tous les employés*/
SELECT DISTINCT titre 
FROM employe;

/*Afficher le nom, le numéro d'employé et le numéro du
département des employés dont le titre est « Secrétaire ».*/
SELECT nom, noemp, nodep
FROM employe
WHERE titre = "secrétaire";

/*Afficher le nom et le numéro de département dont le numéro de
département est supérieur à 40.*/
SELECT nom, nodep
FROM employe
WHERE nodep > 40;

/*Afficher le nom et le prénom des employés dont le nom est
alphabétiquement antérieur au prénom.*/
SELECT nom, prenom
FROM employe
WHERE nom < prenom;

/*Afficher le nom, le salaire et le numéro du département des employés
dont le titre est « Représentant », le numéro de département est 35 et
le salaire est supérieur à 20000.*/
SELECT nom, salaire, nodep 
FROM employe
WHERE titre = "représentant" 
AND nodep = 35 
AND salaire > 20000;

/*Afficher le nom, le titre et le salaire des employés dont le titre est
« Représentant » ou dont le titre est « Président ».*/
SELECT nom, titre, salaire 
FROM employe
WHERE titre = "représentant" 
OR titre = "président";

/*Afficher le nom, le titre, le numéro de département, le salaire des
employés du département 34, dont le titre est « Représentant » ou
« Secrétaire ».*/
SELECT nom, titre, nodep, salaire 
FROM employe
WHERE nodep = 34  
AND titre IN ("représentant", "secrétaire");

/*Afficher le nom, le titre, le numéro de département, le salaire des
employés dont le titre est Représentant, ou dont le titre est Secrétaire
dans le département numéro 34.*/
SELECT nom, titre, nodep, salaire 
FROM employe
WHERE titre = "représentaant"
OR (titre = "représentant" OR titre = "secrétaire")
AND nodep = 34;

/*Afficher le nom, et le salaire des employés dont le salaire est compris
entre 20000 et 30000.*/
SELECT nom, salaire 
FROM employe
WHERE salaire BETWEEN 20000 AND 30000;

/*Afficher le nom des employés commençant par la lettre « H ».*/
SELECT nom 
FROM employe
WHERE nom LIKE "H%";

/*Afficher le nom des employés se terminant par la lettre « n ».*/
SELECT nom 
FROM employe
WHERE nom LIKE "%N";

/*Afficher le nom des employés contenant la lettre « u » en 3ème
position.*/
SELECT nom 
FROM employe
WHERE nom LIKE "__N%";

/*Afficher le salaire et le nom des employés du service 41 classés par
salaire croissant*/
SELECT salaire, nom
FROM employe
WHERE nodep = 41
ORDER BY salaire ASC;   /*ASC = tri en ordre croissant*/

/*Afficher le salaire et le nom des employés du service 41 classés par
salaire décroissant.*/
SELECT salaire, nom  
FROM employe
WHERE nodep = 41
ORDER BY salaire DESC;

/*Afficher le titre, le salaire et le nom des employés classés par titre
croissant et par salaire décroissant.*/
SELECT titre, salaire, nom
FROM employe
ORDER BY titre ASC, salaire DESC;

/*Afficher le taux de commission, le salaire et le nom des employés
classés par taux de commission croissante.*/
SELECT tauxcom, salaire, nom
FROM employe
ORDER BY tauxcom ASC;

/*Afficher le nom, le salaire, le taux de commission et le titre des
employés dont le taux de commission n'est pas renseigné*/
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom IS NULL;

/*Afficher le nom, le salaire, le taux de commission et le titre des
employés dont le taux de commission est renseigné.*/
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom IS NOT NULL;

/*Afficher le nom, le salaire, le taux de commission, le titre des
employés dont le taux de commission est inférieur à 15.*/
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom < 15;

/*Afficher le nom, le salaire, le taux de commission, le titre des
employés dont le taux de commission est supérieur à 15*/
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom > 15;

/*Afficher le nom, le salaire, le taux de commission et la commission des
employés dont le taux de commission n'est pas nul. (la commission
est calculée en multipliant le salaire par le taux de commission*/
SELECT nom, salaire, tauxcom, (salaire * tauxcom) AS commission
FROM employe
WHERE tauxcom IS NOT NULL;

/*Afficher le nom, le salaire, le taux de commission, la commission des
employés dont le taux de commission n'est pas nul, classé par taux de
commission croissant.*/
SELECT nom, salaire, tauxcom, (salaire * tauxcom) AS commission
FROM employe
WHERE tauxcom IS NOT NULL
ORDER BY tauxcom ASC;

/*Afficher le nom et le prénom (concaténés) des employés. Renommer
les colonnes*/
SELECT CONCAT(nom, " ", prenom) AS nom_entier
FROM employe;

/* Afficher les 5 premières lettres du nom des employés.*/
SELECT SUBSTRING(nom,1,5) AS surnom
FROM employe;

/*Afficher le nom et le rang de la lettre « r » dans le nom des
employés*/
SELECT nom, LOCATE('r', nom) AS r
FROM employe;

/*Afficher le nom, le nom en majuscule et le nom en minuscule de
l'employé dont le nom est Vrante.*/
SELECT nom,
       UPPER(nom) AS nom_upper,
       LOWER(nom) AS nom_lower
FROM employe
WHERE nom = 'Vrante';

/*Afficher le nom et le nombre de caractères du nom des employés.*/
SELECT nom,
       LENGTH(nom) AS nombre_caractere
FROM employe;

/*Rechercher le prénom des employés et le numéro de la région de leur
département.*/
SELECT employe.prenom, dept.noregion
FROM employe
JOIN dept ON employe.nodep = dept.nodept;

/*Rechercher le numéro du département, le nom du département, le
nom des employés classés par numéro de département (renommer les
tables utilisées).*/
SELECT employe.nodept, dept.nom, employe.nom
FROM employe
JOIN dept ON employe.nom = dept.nodept
ORDER BY employe.nom = dept.nodept ASC;

/*Rechercher le nom des employés du département Distribution.*/
SELECT e.nom AS Nom_employe
FROM employe AS e
JOIN dept AS d ON e.nodep = d.nodept
WHERE d.nom = 'distribution';

/*Rechercher le nom et le salaire des employés qui gagnent plus que
leur patron, et le nom et le salaire de leur patron.*/
SELECT e.nom AS Nom_employe, e.salaire AS Salaire_employe,
       p.nom AS nom_patron, p.salaire AS Salaire_patron
FROM employe AS e
JOIN employe AS p ON e.nosup = p.noemp
WHERE e.salaire > p.salaire;

/*Rechercher le nom et le titre des employés qui ont le même titre que
Amartakaldire.*/
SELECT e.nom AS Nom_employe, e.titre AS titre_employe
FROM employe AS e
WHERE e.titre = (SELECT titre FROM employe WHERE nom ='amartakaldire');

/*Rechercher le nom, le salaire et le numéro de département des employés qui 
gagnent plus qu'un seul employé du département 31, classés par numéro de département et salaire*/
SELECT e.nom AS Nom_employe, e.salaire AS Salaire_employe, e.nodep AS Num_departement
FROM employe AS e
WHERE e.salaire > (SELECT MIN(salaire) FROM employe WHERE nodep = '31')
ORDER BY e.nodep ASC, e.salaire ASC;

/*Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus que tous les employés du département 31,
classés par numéro de département et salaire.*/
SELECT e.nom AS nom_employe, e.salaire AS nom_employe, e.nodep AS num_departement
FROM employe AS e
WHERE e.salaire > ALL (SELECT salaire FROM employe WHERE nodep = '31')
ORDER BY e.nodep ASC, e.salaire ASC;

/*Rechercher le nom et le titre des employés du service 31 qui ont un
titre que l'on trouve dans le département 32.*/
SELECT e.nom AS nom_employe, e.titre AS titre_employe
FROM employe AS e
WHERE e.nodep = '31'
AND e.titre IN (SELECT titre FROM employe WHERE nodep = '32');

/*Rechercher le nom et le titre des employés du services 31 qui ont un 
titre l'on trouve ne trouve pas dans le département 32*/
SELECT e.nom AS nom_employe, e.titre AS titre_employe
FROM employe AS e 
WHERE e.nodep = '31'
AND e.titre NOT IN (SELECT titre FROM employe WHERE nodep = '32');

/*Rechercher le nom, le titre et le salaire des employés qui ont 
le même titre et le même salaire que fairant*/
SELECT e.nom AS nom_employe, e.titre AS titre_employe, e.salaire AS salaire_employe
FROM employe AS e 
WHERE e.salaire = (SELECT salaire FROM employe WHERE nom = 'Fairant')
AND e.titre = (SELECT titre FROM employe WHERE nom = 'Fairant');

/*Rechercher le numéro de département, le nom du département, le nom des employés, 
en affichant aussi les département dans lequels il n'y a personne, classés par numéro de département*/
SELECT d.nodept AS num_departement, d.nom AS nom_departement, e.nom AS nom_employe
FROM dept AS d
LEFT JOIN employe AS e ON d.nodept = e.nodep
ORDER BY d.nodept;

/*Calculer le nombre d'employés de chaque titre.*/
SELECT titre, COUNT(*) AS nombre_employes
FROM employe
GROUP BY titre;

/*Calculer la moyenne des salaires et leur sommen par region.*/
SELECT d.noregion, AVG(e.salaire), SUM(e.salaire)
FROM employe e
JOIN dept d ON e.nodep = d.nodept
GROUP BY d.noregion;

/*Afficher les numéros des département ayant au moins 3 employés*/
SELECT e.nodep
FROM employe e
GROUP BY e.nodep
HAVING COUNT(e.noemp) >= 3;

/*Afficher les lettres qui sont l'initiale d'au moins trois employés*/
SELECT LEFT(e.nom, 1) AS initiale
FROM employe e
GROUP BY LEFT(e.nom, 1)
HAVING COUNT(e.noemp) >= 3;

/*Rechercher le salaire maximum et le slaire minimum parmi tous les salariés et l'écart entre les deux */
SELECT 
    MAX(salaire) AS salaire_maximum,
    MIN(salaire) AS salaire_minimum,
    (MAX(salaire) - MIN(salaire)) AS ecart_salaires
FROM employe;

/*Rechercher le nombre de titres différents*/
SELECT COUNT(DISTINCT titre) AS titre_different
FROM employe;

/*Pour chaque titre, compter le nombre d'employés possédant ce titre*/
SELECT titre, COUNT(*) AS nombre_employes
FROM employe
GROUP BY titre;

/*Pour chauqe nom de département, afficher le nom du département et le nombre d'employés*/
SELECT d.nom AS nom_departement, COUNT(e.noemp) AS nombre_employes
FROM dept d
LEFT JOIN employe e ON d.nodept = e.nodep
GROUP BY d.nom;

/*REchercher le nombre de salaires renseignés et le nombre de taux de commission renseignés*/









