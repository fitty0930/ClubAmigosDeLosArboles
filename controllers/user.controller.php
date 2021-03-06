<?php
    require_once "./models/tree.model.php";
    require_once "./models/species.model.php";
    require_once "./views/visitor.view.php";
    require_once "./views/user.view.php";
    
    class UserController{
        private $treeModel; 
        private $speciesModel; 
        private $visitorView;
        private $userView;

        public function __construct(){
            $this->treeModel = new TreeModel();
            $this->speciesModel = new SpeciesModel();
            $especies=$this->speciesModel->getSpecies();
            $this->visitorView = new VisitorView($especies);
            $this->userView = new UserView($especies);
        }

        // FUNCIONALIDADES DE LOS ARBOLES
        public function addTree(){
            $id_especie = $_POST['especie']; 
            $descripcion = $_POST['descripcion']; 
            $latitud = $_POST['latitud']; 
            $longitud = $_POST['longitud']; 
            $anio_plantado = $_POST['anio_plantado'];
            $senializado = $_POST['senializado']; 

            if((!empty($id_especie))&&(!empty($descripcion))&&(!empty($latitud))&&(!empty($longitud))&&(!empty($anio_plantado))){
                $this->treeModel->addTree($id_especie, $descripcion, $latitud, $longitud, $anio_plantado, $senializado);
                header("Location: arboles"); // lo pateo a arboles
            }else{
                echo 'eres una grandisima mrd';
            }; 
        }

        public function deleteTree($params=NULL){
            $id_arbol=$params[':ID'];
            $this->treeModel->deleteTree($id_arbol);
            header("Location: ../arboles");
        }

        public function treeEditor($params=NULL){
            $id_arbol=$params[':ID'];
            $arbol = $this->treeModel->getTree($id_arbol);
            $this->visitorView->showTreeEditor($arbol);
        }

        public function editTree($params=NULL){
            $id_arbol=$params[':ID'];
            $id_especie = $_POST['especie']; 
            $descripcion = $_POST['descripcion']; 
            $latitud = $_POST['latitud']; 
            $longitud = $_POST['longitud']; 
            $anio_plantado = $_POST['anio_plantado'];
            $senializado = $_POST['senializado'];
            if((!empty($id_especie))&&(!empty($descripcion))&&(!empty($latitud))&&(!empty($longitud))&&(!empty($anio_plantado))){
                $this->treeModel->updateTree($id_arbol, $id_especie, $descripcion, $latitud, $longitud, $anio_plantado, $senializado);
                header("Location: ../arboles"); // lo pateo a arboles
            }else{
                echo 'eres una grandisima mrd';
            }; 
        }

        // FUNCIONALIDADES DE LAS ESPECIES
        
        public function showSpecies($especies){
            $this->userView->showSpecies($especies);
        }

        public function addSpecie(){
            $nombre = $_POST['nombre']; 
            $descripcion = $_POST['descripcion']; 
            if((!empty($nombre))&&(!empty($descripcion))){
                $this->speciesModel->addSpecie($nombre,$descripcion);
                header("Location: especies"); // lo pateo a arboles
            }else{
                echo 'eres una grandisima mrd';
            }; 
        }

        public function deleteSpecie($params=NULL){
            $id_especie = $params[':ID'];
            $this->speciesModel->deleteSpecie($id_especie);
            header("Location: ../especies");
        }

        public function specieEditor($params=NULL){
            $id_especie=$params[':ID'];
            $especie = $this->speciesModel->getSpecie($id_especie);
            $this->userView->showSpecieEditor($especie);
        }

        public function editSpecie($params=NULL){
            $id_especie = $params[':ID']; 
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            
            if((!empty($id_especie))&&(!empty($descripcion))&&(!empty($nombre))){
                $this->speciesModel->updateSpecie($id_especie, $nombre, $descripcion);
                header("Location: ../especies"); // lo pateo a especies
            }else{
                echo 'eres una grandisima mrd';
            }; 
        }
    }