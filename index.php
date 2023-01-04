<?php

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use App\CreateArray;
use App\SortArray;

$arResult = new CreateArray;

$twoDimArray = $arResult->genTwoDimArray();

echo '<pre>';
	print_r($twoDimArray);
echo '</pre>';

$arSort = new SortArray;

$sortedArHorizontal = $arSort->sortByHorizontal($twoDimArray);
File::writeInFile($sortedArHorizontal, "w+");

$sortedArVertical = $arSort->sortByVertical($twoDimArray);
File::writeInFile($sortedArVertical);

$sortedArSnake = $arSort->sortBySnake($twoDimArray);
File::writeInFile($sortedArSnake);

$sortedArDiagonal = $arSort->sortByDiagonal($twoDimArray);
File::writeInFile($sortedArDiagonal);

$sortedArSnail = $arSort->sortBySnail($twoDimArray);
File::writeInFile($sortedArSnail);

