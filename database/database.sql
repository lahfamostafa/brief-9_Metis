create DATABASE Metis ;

use Metis ;

create TABLE Membre(
    id int primary key AUTO_INCREMENT,
    nom varchar(50),
    email varchar(50)
);

create table Activite(
    id int primary key AUTO_INCREMENT,
    descriptionn varchar(255),
    statut varchar(255),
    date_creation date,
    id_projet int,
    foreign key (id_projet) references Projet(id)
)ENGINE=InnoDB;

create table Projet(
    id int primary key AUTO_INCREMENT,
    titre varchar(100),
    membreId int,
    foreign key (membreId) references Membre(id),
    typeProjet varchar(10),
    constraint check_type check (typeProjet in ("court" , "long"))
)ENGINE=InnoDB;