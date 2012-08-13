<?php

interface iMCQ{
    function toArray();
    function fromArray($assocArray);
    function toJson();
    function fromJson($jsonString);
    function loadFromDB();
    function saveAsNode();
    
}
?>
