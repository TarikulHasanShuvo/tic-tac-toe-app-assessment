<?php

namespace App\Http\Services;

class GameService
{
    /**
     * @param int $boardLength
     * @return array
     */
    public function makeConditionCheakingArray(int $boardLength) : array
    {
         /***************  Horizontal & vertical arrays creation **********/
        $horizontalCount = 0;
        $verticalCount = 0;
        for ($row = 0; $row < $boardLength; $row++) {
            $newRow = [];
            $newCol = [];
            for ($col = 0; $col < $boardLength; $col++) {
                $newRow[] = $horizontalCount + $col;
                $newCol[] = $verticalCount;
                $verticalCount += $boardLength;
            }
            $horizontalCount += $boardLength;
            $verticalCount = $row + 1;
            $array[] = $newRow;
            $array[] = $newCol;
        }

        /**********    diagonal array creation ************/
        $newDiagonal = [];
        $newDiagonal2 = [];
        for ($i = 0; $i < $boardLength; $i++) {
            $newDiagonal[] = $i * $boardLength + $i;
            $newDiagonal2[] = $i * $boardLength + ($boardLength - 1 - $i);
        }
        $array[] = $newDiagonal;
        $array[] = $newDiagonal2;

        return $array;
    }

    /**
     * @param array $conditionalArray
     * @param array $board
     * @return int|mixed|null
     */
    public function conditionChecking(array $conditionalArray, array $board)
    {
        for ($i = 0; $i < count($conditionalArray); $i++) {
            $result = 0;
            for ($j = 0; $j < count($conditionalArray[$i]); $j++) {
                if ($board[$conditionalArray[$i][0]] == $board[$conditionalArray[$i][$j]]) {
                    $result = $board[$conditionalArray[$i][0]];
                } else {
                    $result = 0;
                    break;
                }
            }
            if ($result) return $result ;
        }
        return null;
    }
}
