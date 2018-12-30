<?php
  class cmembres
  {
     //   objet de connexion a la base de donnees
     var $db;

     //
     //   Constructeur de la classe
     //
     function cmembres($sqlConn)   {
        $this->db = $sqlConn;
     }

     //
     //   fonction permettant de verifier le login et le mot de passe
     //
     function verifLogin($nick, $pass)   {
        //   on s'assure que le nick ne contient pas de balises html et de caracteres qui peuvent
        //    etre utilisés requête de base de données
        $nick   = strip_tags(trim($nick));

        //   la requete sql
        $sql    = "select mdp from utilisateurs where pseudo='$nick'";
        //   execution de la requete
        $res   = mysql_query($sql,$this->db) or die( mysql_error() );

        //   si pas de resultat on retourne false car ce utilisateur n'existe pas
        if ( !mysql_num_rows($res) )   {   return false;   }

        //   sinon on continu en verifiant le mot de passe
        $temp   = mysql_fetch_array($res);
        //   le mot de passe crypté dans la base de donnees
        $password = $temp['mdp'];
        //   md5 du mot de passe soumis
        $pass   = md5( $pass );

        //   strcmp compare les deux mots de passe et retourne 0 en cas d'égalité
        if ( !strcmp($pass,$password) )   {
           return true;
        }

        //   si on arrive ici c'est que le mot de passe  etait invalide
        return false;

     }



     //
     //   fonction permettant de  creer une session
     //
     function creerSession($nick)   {
        //   necessaire lorsqu'on desire utiliser les sessions
        session_start();

        //   Enregistrement du nom d'utilisateur comme variable de session
        $_SESSION['user_name']       = $nick;

        //   Enregistrement de l'heure du dernier acces
        //   permet de supprimer une session au bout de x minutes d'inactivité sur le site
        $_SESSION['last_access']   = time();

        //   une securite de plus, on associe l'adresse ip à la variable de session
        $_SESSION['user_ip']      = $_SERVER['REMOTE_ADDR'];

     }



     //
     //   fonction permettant de supprimer une session
     //
     function finSession()   {
        //   supression de toutes les variables de session
        $_SESSION   = array();
        //   destruction de la session
        session_destroy();
     }


     //
     //   fonction permettant de verifier si l'utilisateur est identifié
     //
     function verifAcces()   {

        //
        //   Si utilisateur pas du tout identifié, donc aucune variable n'existe
        //
        if(!isset($_SESSION['last_access']) || !isset($_SESSION['user_ip']) || !isset($_SESSION['user_name']))
        {
             $_SESSION      =   array();
           return false;
        }

        //
        //   Si non actif depuis 15 minutes
        //
        if( (time() - $_SESSION['last_access']) > 900)
        {
           $_SESSION      =   array();
           return false;
        }

        //
        //   Si adresse IP différente
        //
        if($_SERVER['REMOTE_ADDR']   !=   $_SESSION['user_ip'])
        {
           $_SESSION      =   array();
           return false;
        }

        //
        //   Sinon tout va bien
        //
        $_SESSION['last_access']   =   time();
        return true;
     }

  }
?>
