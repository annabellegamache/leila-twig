<?php
// Inclure les espaces de nom (namespace) pour les classes requises dans la librairie Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HtmlGabarit
{
    protected $variables = array();
    protected $module;
    protected $action;
    private $twig; 

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;

        $chargeurTmpl = new FilesystemLoader(["vues/"]);//indique a twig ou se trouve les templates
        $this->twig = new Environment($chargeurTmpl, []); // objet qui permet de complier les templates
    }

    /*rempli en tableau avec valeur indexxer */
    public function affecter($nom, $valeur)
    {
        $this->variables[$nom] = $valeur; //rempli le sac
    }

    public function affecterActionDefaut($nomAction){ //pour gerer methode /tout /i
        $this->action = $nomAction;
    }

    public function genererVue()
    {
       $this->twig->display("$this->module.$this->action.twig", $this->variables);

       //$this->variables contient : 
        /* extract($this->variables);// deballe le sac...methode qui extrait les variables clé du tableau associatif...voir doc peut etre dangeureux
        include("vues/entete.inc.php");
        // inclure module et action... 
        include("vues/$this->module.$this->action.php"); /// ex: plat.tout.php....//eneleve sitch du mvc procedurale tp2 session2
        include("vues/pied2page.inc.php");*/
    }
}