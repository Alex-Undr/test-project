<?php

namespace App;

class File
{
	public static function writeInFile($sortedArray, $mode = "a+") {
		$fileSortedArr = fopen($_SERVER['DOCUMENT_ROOT']."/upload/sorted_arrays.txt", $mode);
		foreach ($sortedArray as $arNums) {
			foreach ($arNums as $nums) {
				fwrite($fileSortedArr, $nums . " | ");
			}
		}		
		fclose($fileSortedArr);

		return;
	}
}