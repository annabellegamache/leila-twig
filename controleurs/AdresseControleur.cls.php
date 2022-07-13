<?php
class AdresseControleur extends Controleur  
{

   /* pour corriger qu'il n'y a pas de accueil.tout..... */
    public function index($params)
    {
        $this->gabarit->affecterActionDefaut('tout');
        $this->tout($params);
        
    }

    public function tout($params)
    {
       
        /*Chercher les adresses dans la BD et les affecter dans le tableau $variables du gabarit */
        $this->gabarit->affecter('succursales', $this->modele->tout());  //menu = etiquette... $menu dans vue plats

    }

    public function ajouter()
    {
       // $_POST;  Superglobal tableau à l aportée de toute l'application

    }
}