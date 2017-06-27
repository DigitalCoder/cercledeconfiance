<?php

require("phpMQTT.php");
require("config.php");
	
$mqtt = new phpMQTT("consometre.fr", 1883, "Cercle1"); //Change client name to something unique

if(!$mqtt->connect()){
	exit(1);
}

$topics['CercleConfiance'] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);

while($mqtt->proc()){
		
}


$mqtt->close();

function procmsg($topic,$msg){
    $db = new \PDO(DSN, USER, PASS);
    $req = "INSERT INTO ";
    $prep = $db->prepare($req);
    $prep->bindValue(':id', $id, \PDO::PARAM_INT);
    $prep->execute();
	echo "Msg Recieved: ".date("r")."\nTopic:{$topic}\n$msg\n";
}
	


?>
