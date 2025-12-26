<?php
    require_once "../commandes/comMembre.php";

    $repoMembre = new MembreCommande();
    $repoActivite = new ActiviteCommande();

    echo "===== CRUDs =====\n";
    echo "1. CRUD membre\n";
    echo "2. CRUD activité\n";
    echo "Choix : ";

    
    $choix1 = trim(fgets(STDIN));
    
    try{
        switch($choix1){
            case 1:
                echo "\n\n\n===== GESTION DES MEMBRES =====\n";
                echo "1. Ajouter un membre\n";
                echo "2. Lister les membres\n";
                echo "3. Modifier un membre\n";
                echo "4. Supprimer un membre\n";
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
                            echo "{$m['id']} | {$m['nom']} | {$m['email']}\n";
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

                    default:
                    echo "choix invalide\n";
                }


            case 2:
                echo "\n\n\n===== GESTION DES ACTIVITES =====\n";
                echo "1. Ajouter un activité\n";
                echo "2. Lister les activités\n";
                echo "3. Modifier un activité\n";
                echo "4. Supprimer un activité\n";
                echo "Choix : ";
                $choix2 = trim(fgets(STDIN));

                switch($choix2){
                    case 1:
                        echo "Description : ";
                        $description = trim(fgets(STDIN));
                        
                        echo "Statut : ";
                        $statut = trim(fgets(STDIN));
                        
                        echo "Id Projet : ";
                        $idProjet = trim(fgets(STDIN));
                        
                        $activite = new Activité($description , $statut , $idProjet);
                        $repoActivite->create($activite);
                        echo "activité ajouté avec succès\n";
                        break;
                        
                    case 2:
                        $activite = $repoActivite->read();
                        foreach($activite as $a){
                            echo "{$a['id']} | {$a['nom']} | {$a['email']}\n";
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

                    default:
                    echo "choix invalide\n";
                }
            
            default:
            echo "choix invalide\n";
        }
    }catch(Exception $e){
        echo "Error : ". $e->getMessage();
    }
?>