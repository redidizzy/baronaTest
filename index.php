<?php
    include 'config.php';
    //Classes
    class Card{
        private $type;
        private $number;
        public function __construct($type, $number){
            $this->type = $type;
            $this->number = $number;
        }
        public function getType(){
            return $this->type;
        }
        public function getNumber(){
            return $this->number;
        }
    }
    class Deck {
        private $cards;
        public function __construct(){
            global $available_types, $available_numbers;
            $this->cards = array();
            foreach($available_types as $type){
                foreach($available_numbers as $number){
                    $this->cards[] = new Card($type, $number);
                }
            }
        }
        public function printCards(){
            $result ="";
            foreach ($this->cards as $card){
                $result .= $card->getType()."-".$card->getNumber()."\n";
            }
            return $result;
        }
        
    }

    //Main Code 
    $deck = new Deck();
    
    
    

