<?php   

    namespace App\Service;

    abstract class RouterService
    {
        /**
         * prise en charge des parametres d'une requête GET
         * 
         * @param array $params Les paramètres de l'uri ($params)
         * @return array la réponse correspondante au return d'un contrôleur
         */
        public static function handleRequest($params) :array
        {
                    /*-----APPEL DU CONTROLEUR-----*/
            $class ="Store";//contrôleur par défaut

            if(isset($params['ctrl'])) {//ctrl = admin
                $uri_class = ucfirst($params['ctrl']);//Admin
                //on vérifie que App\Controller\AdminController existe !
                if(class_exists("App\Controller\\".$uri_class."Controller")){
                    //Le contrôler à appeler devient celle contenue dans l'uri
                    $class = $uri_class;
            }
        }

        //App\Controller\StoreController => Fully Qualified Class Name (FQCN)
        $classname = "App\Controller\\".$class."Controller";   
        $controller = new $classname();

        /*-----APPEL DE LA METHODE DANS LE CONTROLEUR-----*/
            $method = "indexAction";//la méthode par défaut

            if(isset($params['action'])){//action = list 
                $uri_method = $params['action']."Action";//$uri_method = "ListAction"
                //on vérifie si la methode listAction est une méthode du contrôleur
                if(method_exists($controller, $uri_method)){
                    //la methode à appeler est celle provenant de l'uri
                    $method = $uri_method;
            }
        }

        /*----PRISE EN CHARGE DU PARAMETRE OPTIONNEL $params -----*/
            $id = null;//pas d'id par défaut
            
            if(isset($params['id'])){
                $id = $params['id'];
            }
            //StoreController::listAction()
            return $controller->$method($id);//appel de la methode du contrôleur

            }
        } 

    