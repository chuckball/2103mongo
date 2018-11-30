<?php 
//phpinfo();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//create mongoDB connection here
require 'phpmongodb/vendor/autoload.php';//composer require "mongodb/mongodb=^1.0.0.0"
$mongo = new MongoDB\Client('mongodb://root:SITict2103@dds-gs59a54ce1ee30b41635-pub.mongodb.singapore.rds.aliyuncs.com:3717,dds-gs59a54ce1ee30b42181-pub.mongodb.singapore.rds.aliyuncs.com:3717/admin?authSource=admin&replicaSet=mgset-300212625');
$db = $mongo->db_team_l4m;
// $collection = $db->school;
// // find everything in the collection
// $cursor = $collection->find();
// // iterate through the results
// foreach ($cursor as $document) {
//     echo $document["school_name"] ;
// }
// try {
//     $mongoDbClient = new Client('mongodb://root:SITict2103@dds-gs59a54ce1ee30b41635-pub.mongodb.singapore.rds.aliyuncs.com:3717,dds-gs59a54ce1ee30b42181-pub.mongodb.singapore.rds.aliyuncs.com:3717/admin?authSource=admin&replicaSet=mgset-300212625');
// // select a database
//    $db = $m->mydb;
//    echo "Database mydb selected";
//    $collection = $db->createCollection("mycol");
//    echo "Collection created succsessfully";
// } catch (Exception $error) {
//     echo $error->getMessage(); die(1);
// }