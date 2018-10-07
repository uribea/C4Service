<?php
function isWin($row, $col)
{
    $player = detectVertical($row, $col);
    if($player != 0) {
        return $player;
    };
    $player =  detectHorizontal($row, $col);
    if($player != 0){
        return $player;
    }
    $player = detectDiagonal($row, $col);
    if($player !=0){
        return $player;
    }
    return 0;
}

function detectHorizontal($row, $col)
{
    $player = $this->Board[$row][$col];
    $horizontal = 0;
    for ($i = $col; $i >= 0; $i--) {
        if ($this->Board[$row][$i] != $player) {
            break;
        }
        $horizontal++;
    }
    for ($row = $i + 1; $row < $this->Boardcolumns; $row++) {
        if ($this->Board[$row][$i] != $player) {
            break;
        }
        $horizontal++;
    }
    if ($horizontal == 4) {
        return $player;
    }
    return 0;
}

function detectVertical($row, $col,$board)
{
    $player = $this->Board[$row][$col];
    $vertical = 0;
    for ($i = $row; $i >= 0; $i++) {
        if ($this->Board[$i][$col] != $player) {
            break;
        }
        $vertical++;
    }
    for ($i = $row + 1; $i < $this->boardRow; $i++) {
        if ($this->Board[$i][$col] != $player) {
            break;
        }
        $vertical++;
    }
    if ($vertical == 4) {
        return $player;
    }
    return 0;
}

function detectDiagonal($row, $col)
{
    $tempRow = $row;
    $tempCol = $col;
    $diagonal = 0;
    $player = $this->Board[$row][$col];

    for ($i = $tempRow; $i >= 0; $i++) {
        if ($this->Board[$i][$col]) {
            if ($this->Board[$tempCol][$tempRow] != $player) {
                break;
            }
        }
        $tempCol++;
        $diagonal++;
    }
    for ($i = $tempRow; $i < $this->boardRow; $i++) {
        if ($tempCol >= $this->Boardcolumns) {
            break;
        }
        if ($this->Board[$i][$tempCol] != $player) {
            break;
        }
        $tempCol++;
        $diagonal++;
    }
    if ($diagonal == 4) {
        return $player;
    }
    return 0;
}