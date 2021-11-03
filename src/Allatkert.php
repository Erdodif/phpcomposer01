<?php

namespace Phil\Htmlpdf;

use \DateTime;
use \PDO;

require "../vendor/autoload.php";
class Allatkert{
    static private $conn;
    private $allatok = [];
    static public function init(){
        Allatkert::$conn = new PDO("mysql:host=localhost;dbname=tiger;charset=utf8","root","");
    }

    public function __construct(){
        $sql = "SELECT * FROM tigers";
        $stmt = Allatkert::$conn->prepare($sql);
        $this->allatok = $stmt->fetchAll();
    }
    public function getAllatok(){
        $ki = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=0, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>';
        foreach($this->allatok as $ertek){
            foreach($ertek as $key){
                $ki.="
                <div class='kulcs'>";
                    $ki.=$key;
                $ki .="</div>
                <div class='ertek'>
                    $?value
                </div>
                ";
            }
        }
        $ki .= '
        </body>
        </html>';
        return $ki;
    }

}
Allatkert::init();