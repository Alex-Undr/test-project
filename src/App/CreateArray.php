<?php

namespace App;

class CreateArray
{
	public function genOneDimArray($n){
		$oneDimArray=array();
		$i=0;
		while ($i<$n*$n) {
			$randNum=rand(1,$n*$n);
			if(!in_array($randNum, $oneDimArray, true)) {
				$oneDimArray[]=$randNum;
				$i++;
			}
		}
		return $oneDimArray;
	}

	public function genTwoDimArray($n=3)
	{
		$oneDimArray=$this->genOneDimArray($n);

		$k=0;
		for ($i=0; $i < $n; $i++) { 
			for ($j=0; $j < $n; $j++) {						
				$twoDimArray[$i][$j] = $oneDimArray[$k];
				$k++;		
			}
			
		}		
		return $twoDimArray; 

	}
}

