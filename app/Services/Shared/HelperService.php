<?php

class HelperService
{

    public function mapServiceColorToHex(string $color)
    {

        if ($color == "red") {
            return "FF0000";
        }

        if ($color == "amber") {
            return "FFC107";
        }

        if ($color == "green") {
            return "41C359";
        }

    }
}
