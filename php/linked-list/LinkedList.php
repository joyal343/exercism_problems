<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class LinkedList {
    public $head = null;
    public function __construct()
    {
        $this->head = null;
    }
    public function unshift($data){
        $newNode = new Node($data);
        $newNode->next = null; 
        $newNode->prev = null;
        if($this->head === null) {
          $this->head = $newNode;
        } else {
          $temp = new Node(0);
          $temp = $this->head;
          $newNode->next = $temp;
          $temp->prev = $newNode;
          $this->head = $newNode;
        } 
    }
    public function shift(){
        $temp = new Node(0);
        $temp2 = new Node(0);
        $temp = $this->head;
        if ($temp->next === null) {
            $num = $temp->data;
            unset($temp);
            $this->head = null;
            return $num;
        } else {
            $num = $temp->data;
            $this->head = $temp->next;
            $temp2 = $temp->next;
            if (!($temp2->prev === null)) {
                $temp2->prev = null;
            }
            unset($temp);
            return $num;
        }
    }
    public function pop() {
        $temp = new Node(0);
        $temp2 = new Node(0);
        $temp = $this->head;
        while($temp->next != null) {
          $temp = $temp->next;
        }
        $temp2 = $temp->prev;
        if ($temp2 === null) {
            $num = $temp->data;
            unset($temp);
            $this->head = null;
            return $num; 
        } else {
            $temp2->next = null;
            $num = $temp->data;
            unset($temp);
            return $num;
        }
        
    }
    public function push($num) {
        $newNode = new Node($num);
        $newNode->next = null; 
        $newNode->prev = null;
        if ($this->head === null) {
            $this->head = $newNode;

        } else {
        $temp = new Node(0);
        $temp = $this->head;
        while($temp->next != null) {
          $temp = $temp->next;
        }
        $temp->next = $newNode;
        $newNode->prev = $temp;
        }
        
    }


}
class Node {
    public $prev;
    public $next;
    public $data;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}
