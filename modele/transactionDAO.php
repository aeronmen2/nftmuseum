<?php

include_once('connexionDAO.php');
include_once('transaction.php');

class transactionDAO{
    public static function getTransactioDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from transaction");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectiontransaction= new transaction($value['idtransaction'],$value['datetransaction'],$value['certificat'],$value['idutilisateur']);
            $res[]=$collectiontransaction;
        }
         return $res;
    }

    public static function getUneTransactionDAO($idtransaction)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from transaction where idtransaction = :idtransaction");
        $request->bindValue(':idtransaction', $idtransaction, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unetransaction = new transaction($ligne['idtransaction'],$ligne['datetransaction'],$ligne['idutilisateur']);
            return $unetransaction;
        }
    }


    public static function addTransactionDAO($idtransaction, $datetransaction, $idutilisateur)
    {

        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into transaction (idtransaction, datetransaction, idutilisateur) values (:idtransaction, :datetransaction, :idutilisateur)");
        $request->bindValue(':iidtransaction', $idtransaction, PDO::PARAM_INT);
        $request->bindValue(':datetransaction', $datetransaction, PDO::PARAM_STR);
        $request->bindValue(':idutilisateur', $idutilisateur, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }


    public static function suppUneTransactionDAO($idtransaction)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from transaction where idtransaction = :idtransaction");
        $request->bindValue(':idtransaction', $idtransaction, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }

}

