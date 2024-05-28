<?php

function language_list(...$items)
{
    return $items;
}

function add_to_language_list($lang_list , $st){
    $lang_list[] = $st;
    return $lang_list;
}

function prune_language_list($lang_list){
    array_splice($lang_list,0,1);
    return $lang_list;
}

function current_language($lang_list){
    return $lang_list[0];
}

function language_list_length($lang_list){
    return sizeof($lang_list);
}
