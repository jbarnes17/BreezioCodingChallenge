<?php

/**
 * The Card class represents an individual playing card. The class constructor instantiates a new
 * playing card. If valid suit and rank are provided to the constructor, it will instantiate based
 * on these values. If not, the suit and rank instance variables will be set to null.
 * 
 * This class contains basic getters and setters to access and modify suit and rank as well as a
 * toString method to display the Card's suit and rank. Finally, this class also contains methods
 * to determine if provided suits and ranks are valid by forcing them to conform to a given standard.
 */
class Card {

  private $suit;
  private $rank;

  /**
   * Constructs a Card. If valid suit and rank are provided, constructs a card with them.
   * Otherwise, it assigns null to suit and rank.
   * @param $suit the suit to assign to the card
   * @param $rank the rank to assign to the card
   */
  public function __construct($suit = null, $rank = null) {
    if ($suit == null || $rank == null ||
    !$this->suitIsValid($suit) || !$this->rankIsValid($rank)) {
      $this->suit = null;
      $this->rank = null;
    } else {
      $this->suit = $suit;
      $this->rank = $rank;
    }
  }

  /**
   * Returns the card's suit
   * @return string|null the card's suit 
   */
  public function getSuit() {
    return $this->suit;
  }

  /**
   * Returns the card's rank
   * @return string|null the card's rank 
   */
  public function getRank() {
    return $this->rank;
  }

  /**
   * Sets the card's suit
   * @param $suit the suit to assign to the card
   */
  public function setSuit($suit) {
    if ($this->suitIsValid($suit)) {
      $this->suit = $suit;
    }
  }

  /**
   * Sets the card's rank
   * @param $rank the rank to assign to the card
   */
  public function setRank($rank) {
    if ($this->rankIsValid($rank)) {
      $this->rank = $rank;
    }
  }

  /**
   * Returns a string value of the card, represented by rank and suit.
   * Example: "2 of Spades"
   * @return string the string value of the card's rank and suit
   */
  public function toString() {
    $cardString = '';
    if ($this->suitIsValid($this->getSuit()) && $this->rankIsValid($this->getRank())) {
      $cardString = $this->getRank() . ' of ' . $this->getSuit();
    }
    return $cardString;
  }

  /**
   * Returns true if the suit is valid
   * @param $suit the suit to validate
   * @return bool boolean value of the validity of the suit
   */
  private function suitIsValid($suit) {
    $validSuits = ['Hearts', 'Diamonds', 'Spades', 'Clubs'];
    return in_array($suit, $validSuits);
  }
  
  /**
   * Returns true if the rank is valid
   * @param $rank the rank to validate
   * @return bool boolean value of the validity of the rank
   */
  private function rankIsValid($rank) {
    $validRanks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    return in_array($rank, $validRanks);
  }
}
