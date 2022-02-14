<?php

include_once('connexionDAO.php');
include_once('categorie.php');


//récupérer les catégories
class categorieDAO{
    public static function getCategoriesDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from categorie");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectioncategorie = new categorie($value['idcategorie'],$value['libellecategorie']);
            $res[]=$collectioncategorie;
        }
         return $res;
    }

//récupérer une catégorie
    public static function getUneCategorieDAO($idcategorie)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from categorie where idcategorie = :idcategorie");
        $request->bindValue(':idcategorie', $idcategorie, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unecategorie = new categorie($ligne['idcategorie'],$ligne['libellecategorie']);
            return $unecategorie;
        }
    }

//ajouter une catégorie
    public static function addCategorieDAO($idcategorie, $libellecategorie)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into categorie (idcategorie, libellecategorie) values (:idcategorie, :libellecategorie)");
        $request->bindValue(':idcategorie', $idcategorie, PDO::PARAM_INT);
        $request->bindValue(':libellecategorie', $libellecategorie, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

//supprimmer une catégorie
    public static function suppUneCategorieDAO($idcategorie)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from categorie where idcategorie = :idcategorie");
        $request->bindValue(':idcategorie', $idcategorie, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }


}
