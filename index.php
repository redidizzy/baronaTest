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
        public function searchCard($position, $card){
            if($position >= count($this->cards)){
                return  "There is no such card in the deck";
            }
            if($card == $this->cards[$position]){
                return $position;
            }else{
                return $this->searchCard(++$position, $card);
            }
            
        }
    }

    //Main Code 
    $deck = new Deck();
    echo $deck->searchCard(0, new Card('Spade', 1))."\n";
    echo $deck->searchCard(0, new Card('Diamond', 1))."\n";
    echo $deck->searchCard(0, new Card('Spade', 7))."\n";
    echo $deck->searchCard(0, new Card('Heart', 12))."\n";
    echo $deck->searchCard(0, new Card('Diamond', 12))."\n";
    
    

