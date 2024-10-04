-- Active: 1722413444756@@127.0.0.1@3306@works

--1. Afficher la liste des personnes (nom, prénom, poste) qui sont des employés de l’entreprise AdventureWorks

select JobTitle, FirstName, LastName
from HumanResources_Employee e
join Person_Person p on p.BusinessEntityID = e.BusinessEntityID;

--2. Afficher la liste des employés (nom, prénom, service dans lequel ils se trouvent et depuis quelle date ils s’y trouvent)
select p.LastName, p.FirstName, d.Name, h.StartDate
from HumanResources_Employee e
join Person_Person p on p.BusinessEntityID = e.BusinessEntityID
join HumanResources_EmployeeDepartmentHistory h on h.BusinessEntityID = e.BusinessEntityID
join HumanResources_Department d on d.DepartmentID = h.DepartmentID;

--3. Afficher la liste des personnes (nom, prénom, numéro de téléphone) disposant d’un numérode téléphone cellulaire
select
from Person_Person pp
join Person_PersonPhone ppp on ppp.BusinessEntityID = pp.BusinessEntityID

