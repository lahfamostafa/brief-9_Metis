<?php
    require_once "../commandes/comMembre.php";
    require_once "../commandes/comActivite.php";
    require_once "../commandes/comProjet.php";
    require_once "../Activité.php";

    $repoMembre = new MembreCommande();
    $repoActivite = new ActiviteCommande();
    $repoProjet = new ProjetCommande();

    while(true){
        echo "===== CRUDs =====\n";
        echo "1. CRUD membre\n";
        echo "2. CRUD activité\n";
        echo "3. CRUD projet\n";
        echo "0. Quitter\n";
        echo "Choix : ";
    
        $choix1 = trim(fgets(STDIN));
        

        switch($choix1){
            case 1:
                while(true){
                    echo "\n\n\n===== GESTION DES MEMBRES =====\n";
                    echo "1. Ajouter un membre\n";
                    echo "2. Lister les membres\n";
                    echo "3. Modifier un membre\n";
                    echo "4. Supprimer un membre\n";
                    echo "0. Retour\n";
                    echo "Choix : ";
                    $choix2 = trim(fgets(STDIN));
    
                    switch($choix2){
                        case 1:
                            echo "Nom : ";
                            $nom = trim(fgets(STDIN));
                            
                            echo "Email : ";
                            $email = trim(fgets(STDIN));
                            
                            $membre = new Membre($nom , $email);
                            $repoMembre->create($membre);
                            echo "Membre ajouté avec succès\n";
                            break;
                            
                        case 2:
                            $membre = $repoMembre->read();
                            foreach($membre as $m){
                                echo "Id : {$m['id']} | Nom : {$m['nom']} | Email : {$m['email']}\n";
                            }
                            break;
                            
                        case 3:
                            echo "ID du membre : ";
                            $id = trim(fgets(STDIN));
                            
                            echo "Nouveau nom : ";
                            $nom = trim(fgets(STDIN));
                            
                            echo "Nouveau email : ";
                            $email = trim(fgets(STDIN));
                            
                            $repoMembre->update($id , $nom , $email);
                            echo "Membre modifié\n";
                            break;
                            
                        case 4:
                            echo "ID du membre a supprimer : ";
                            $id = trim(fgets(STDIN));
                            $repoMembre->delete($id);
                            echo "Membre supprimé\n";
                            break;
    
                        case 0:
                            return;
                        default:
                        echo "choix invalide\n";
                    }
                }
                break;
            case 2:
                while(true){
                    echo "\n\n\n===== GESTION DES ACTIVITES =====\n";
                    echo "1. Ajouter un activité\n";
                    echo "2. Lister les activités\n";
                    echo "3. Modifier un activité\n";
                    echo "4. Supprimer un activité\n";
                    echo "0. Retour\n";
                    echo "Choix : ";
                    $choix3 = trim(fgets(STDIN));
    
                    switch($choix3){
                        case 1:
                            echo "Description : ";
                            $description = trim(fgets(STDIN));
                            
                            echo "Statut : ";
                            $statut = trim(fgets(STDIN));
                            
                            echo "Id Projet : ";
                            $idProjet = trim(fgets(STDIN));
                            
                            $activite = new Activite($description , $statut , new DateTime() , $idProjet);
                            $repoActivite->create($activite);
                            echo "activité ajouté avec succès\n";
                            break;
                            
                        case 2:
                            $activite = $repoActivite->read();
                            foreach($activite as $a){
                                echo "Id : {$a['id']} | Description : {$a['descriptionAc']} | Statut : {$a['statut']} | Id de projet : {$a['id_projet']}\n";
                            }
                            break;
                            
                        case 3:
                            echo "ID d'activité : ";
                            $id = trim(fgets(STDIN));
                            
                            echo "Nouvelle description : ";
                            $description = trim(fgets(STDIN));
                            
                            echo "Nouveau statut : ";
                            $statut = trim(fgets(STDIN));
                            
                            echo "Nouveau id de projet : ";
                            $idProjet = trim(fgets(STDIN));
                            
                            $repoActivite->update($id , $description , $statut , $idProjet);
                            echo "Activité modifié\n";
                            break;
                            
                        case 4:
                            echo "ID d'activité a supprimer : ";
                            $id = trim(fgets(STDIN));
                            $repoActivite->delete($id);
                            echo "Activité supprimé\n";
                            break;
    
                        case 0:
                            return;
                        default:
                        echo "choix invalide\n";
                    }
                }
                break;
            case 3:
                while(true){

                    echo "\n\n\n===== GESTION DES ProjetS =====\n";
                    echo "1. Ajouter un Projet\n";
                    echo "2. Lister tous les Projets\n";
                    echo "3. Lister Projets d'un membre\n";
                    echo "4. Modifier un Projet\n";
                    echo "5. Supprimer un Projet\n";
                    echo "0. Retour\n";
                    echo "Choix : ";
                    $choix4 = trim(fgets(STDIN));
    
                    switch($choix4){
                        case 1:
                            echo "Titre : ";
                            $titre = trim(fgets(STDIN));
                            
                            echo "Description : ";
                            $description = trim(fgets(STDIN));
                            
                            echo "type (court / long) : ";
                            $type = trim(fgets(STDIN));
                            
                            echo "Id membre : ";
                            $idMembre = trim(fgets(STDIN));
    
                            if($repoActivite->ifMembreExist($idMembre) == 0){
                                echo "Cet id est invalide\n";
                                break;
                            }
    
                            if($type === "court"){
                                $Projet = new ProjetCourt($titre , $description , $idMembre);
                            }else if($type === "long"){
                                $Projet = new ProjetLong($titre , $description , $idMembre);
                            }else{
                                echo "!! Type invalide !!\n";
                                break;
                            }
                            
                            $repoProjet->create($Projet);
                            echo "Projet ajouté avec succès\n";
                            break;
                            
                        case 2:
                            $Projet = $repoProjet->read();
                            foreach($Projet as $a){
                                echo "Id : {$a['id']} | Titre : {$a['titre']} | Description : {$a['descriptionPr']} | Type : {$a['typeProjet']} | Membre : {$a['membreId']}\n";
                            }
                            break;
    
                        case 3:
                            echo "Id membre : ";
                            $idMembre = trim(fgets(STDIN));
                            $projets = $repoProjet->readByMembre($idMembre);
                            foreach($projets as $p){
                                echo "Id : {$p['id']} | Titre : {$p['titre']} | Description : {$p['descriptionPr']} | Type : {$p['typeProjet']} | Membre : {$p['membreId']}\n";
                            }
                            break;
                            
                        case 4:
                            echo "ID de projet : ";
                            $id = trim(fgets(STDIN));
                            
                            echo "Nouvelle titre : ";
                            $titre = trim(fgets(STDIN));
                            
                            echo "Nouveau description : ";
                            $description = trim(fgets(STDIN));
                            
                            echo "Nouveau type de projet : ";
                            $type = trim(fgets(STDIN));
                            
                            echo "Nouveau id membre : ";
                            $idMembre = trim(fgets(STDIN));
                            
                            $repoProjet->update($id , $titre , $description , $type , $idMembre);
                            echo "Projet modifié\n";
                            break;
    
                        case 5:
                            echo "ID de projet a supprimer : ";
                            $id = trim(fgets(STDIN));
                            if($repoActivite->countProjet($id)!=0){
                                echo "Impossible de supprimer ce projet : il contient des activités\n";
                                break;
                            }
                            $repoProjet->delete($id);
                            echo "Projet supprimé\n";
                            break;
                        case 0:
                            return;
                        default:
                        echo "choix invalide\n";
                    }
                }
                break;
            case 0:
                echo "Byee\n";
                exit;
            default:
                echo "choix invalide\n";
        }
        
    }
?>