<?php

namespace App;

class SortArray
{
    private static $countDimArray;

    private function even($var) {
        return ($var & 1);
    }

    private function twoToneArray($twoDimArray) {
        foreach ($twoDimArray as $arKey => $arNumbers) {
            foreach ($arNumbers as $key => $numbers) {
                $oneDimArray[] = $numbers;
            }
        }
        array_multisort($oneDimArray, SORT_ASC, SORT_NUMERIC);

        return $oneDimArray;
    }

    public function sortByHorizontal($twoDimArray){
        self::$countDimArray = count($twoDimArray);
        $oneDimArray=$this->twoToneArray($twoDimArray);
        
        $k=0;
        for ($i=0; $i < self::$countDimArray = count($twoDimArray); $i++) { 
            for ($j=0; $j < self::$countDimArray = count($twoDimArray); $j++) {                      
                $sortTwoDimArray[$i][$j] = $oneDimArray[$k];
                $k++;       
            }           
        }       
        return $sortTwoDimArray; 
    }

    public function sortByVertical($twoDimArray){
        self::$countDimArray = count($twoDimArray);
        $oneDimArray=$this->twoToneArray($twoDimArray);
        
        $k=0;
        for ($i=0; $i < self::$countDimArray; $i++) { 
            for ($j=0; $j < self::$countDimArray; $j++) {                  
                $sortTwoDimArray[$j][$i] = $oneDimArray[$k];
                $k++;
            }           
        }     
        return $sortTwoDimArray; 
    }

    public function sortBySnake($twoDimArray){
        self::$countDimArray = count($twoDimArray);
        $oneDimArray=$this->twoToneArray($twoDimArray);
                
        $k=0;
        for ($i=0; $i < self::$countDimArray; $i++) { 
            for ($j=0; $j < self::$countDimArray; $j++) {
                $sortTwoDimArray[$i][$j] = $oneDimArray[$k];
                $k++;
            }           
        }

        foreach ($sortTwoDimArray as $key => $arNums) {
            if ($this->even($key)) {
                rsort($sortTwoDimArray[$key]);
            }
        }

        return $sortTwoDimArray; 
    }

    public function sortByDiagonal($twoDimArray){
        self::$countDimArray = count($twoDimArray);
        $oneDimArray=$this->twoToneArray($twoDimArray);
                
        $k=0;
        $s=0;
        while ($s < self::$countDimArray * 2 - 1) {
            for ($i=0; $i < self::$countDimArray; $i++) { 
                for ($j=0; $j < self::$countDimArray; $j++) {
                    if ($i + $j == $s) {
                        $sortTwoDimArray[$j][$i] = $oneDimArray[$k];
                        $k++;
                    }                    
                }          
            }
            $s++;
        }

        return $sortTwoDimArray;
    }

    public function sortBySnail($twoDimArray){
        self::$countDimArray = count($twoDimArray);
        $oneDimArray=$this->twoToneArray($twoDimArray);
        
        for ($i=0; $i < self::$countDimArray; $i++) { 
            for ($j=0; $j < self::$countDimArray; $j++) {
                $sortTwoDimArray[$i][$j] = 0;                
            }           
        }
        
        $k=0;
        for ($i=0; $i < self::$countDimArray; $i++) {            
            $sortTwoDimArray[0][$i] = $oneDimArray[$k];
            $k++;                       
        }

        
        for ($j=1; $j < self::$countDimArray; $j++) {            
            $sortTwoDimArray[$j][self::$countDimArray - 1] = $oneDimArray[$k];
            $k++;                       
        }

        
        for ($m=self::$countDimArray-1; $m >= 1; $m--) {           
            $sortTwoDimArray[self::$countDimArray - 1][$m-1] = $oneDimArray[$k];

            $k++;                       
        }

   
        for ($l=self::$countDimArray-2; $l > 0; $l--) {
            $sortTwoDimArray[$l][0] = $oneDimArray[$k];
            $k++;                       
        }
             
        $c = 1;
        $d = 1;


        while ($k + 1 < self::$countDimArray * self::$countDimArray) {
            while ($sortTwoDimArray[$c][$d] === 0) {
                $sortTwoDimArray[$c][$d] = $oneDimArray[$k];
                $k++;
                $d++;                
            }

            while ($sortTwoDimArray[$c + 1][$d - 1] === 0) {
                $sortTwoDimArray[$c + 1][$d - 1] = $oneDimArray[$k];
                $k++;
                $c++;                
            }

            while ($sortTwoDimArray[$c][$d - 2] === 0) {
                $sortTwoDimArray[$c][$d - 2] = $oneDimArray[$k];
                $k++;
                $d--;
            }

            while ($sortTwoDimArray[$c - 1][$d] === 0) {
                $sortTwoDimArray[$c - 1][$d] = $oneDimArray[$k];
                $k++;
                $c--;
            }
      
        }
 
        for ($x=0; $x < self::$countDimArray; $x++) { 
            for ($y=0; $y < self::$countDimArray; $y++) { 
                if ($sortTwoDimArray[$x][$y] === 0) {
                    $sortTwoDimArray[$x][$y] = $oneDimArray[$k];
                }
            }
        }
       
        return $sortTwoDimArray; 
    }

}