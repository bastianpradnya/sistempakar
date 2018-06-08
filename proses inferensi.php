<?php
 
$data=array(
	array('FC,ND,FT',0.9),
	array('FC,FT, ',0.8)
	
	);

    $all=array();
    foreach($data as $d) $all[]=$d[0];
    $unique=array_unique(explode(',',implode(',',$all)));
    $fod=implode(',',$unique);
    echo "<pre>";
    echo $fod;
    $rst=array();

    while(!empty($data)){
    	$result=array();
    	$symptom[0]=array_shift($data);
    	$symptom[1]=array($fod,1-$symptom[0][1]);
    		if(empty($rst))
    			$result[0]=array_shift($data);
    		else
    			foreach($rst as $k=>$r)
    				if($k!="&theta;")
    					$result[]=array($k,$r);
    	$theta=1;
    	foreach($result as $r) $theta-=$r[1];
    	$result[]=array($fod,$theta);
    	$m=count($result);
    	$rst=array();

    	for($x=0;$x<$m;$x++){
    		for($y=0;$y<2;$y++){
    			if(!($x==$m-1 && $y==1)){
    				$v=explode(',',$symptom[$y][0]);
    				$w=explode(',',$result[$x][0]);
    				sort($v);sort($w);
    				$vw=array_intersect($v,$w);
    				if(empty($vw)) $v="&theta;";else $v=implode(',',$vw);
    				if(!isset($rst[$v])) $rst[$v]=$result[$x][1]*$symptom[$y][1];
    				else $rst[$v]+=$result[$x][1]*$symptom[$y][1];
    			}
    		}
    	}
    	foreach($rst as $k=>$r) if($k!="&theta;") $rst[$k]=$r/(1-(isset($rst["&theta;"])?$rst["&theta;"]:0));
    	print_r($rst);
    }
    unset($rst["&theta;"]);
    arsort($rst);
    print_r($rst);
?>
