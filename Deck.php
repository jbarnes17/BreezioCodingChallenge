<?php

include_once('Card.php');

/**
 * The Deck class represents an standard 52 Card playing Deck. The class constructor
 * instantiates a new Deck of Card based on a standard 52 Card Deck.
 * 
 * This class contains getters and setters to access and modify the Cards in the Deck.
 * This class also contains utility methods to get the Deck length, completely empty
 * the Deck, reset the Deck to a standard 52 Card Deck, and return a string value
 * representing the entirety of the deck. Lastly, there is a method to shuffle the
 * Deck, randomizing its arrangement, and a dealOneCard method to remove and return
 * a single Card from the end of the Deck.
 */
class Deck {

  private $cards;

  /**
   * Constructs a full deck of 52 Card objects by calling the resetDeck method.
   */
  public function __construct() {
    $this->resetDeck();
  }

  /**
   * Sets the Cards of the deck
   * @param $cards the Cards to set as the Cards of the Deck
   */
  private function setCards($cards) {
    $this->cards = $cards;
  }

  /**
   * Returns the Cards of the Deck
   * @return array the Cards of the Deck
   */
  private function getCards() {
    return $this->cards;
  }

  /**
   * Returns the number of Cards in the Deck
   * @return int the number of Cards in the Deck
   */
  public function getDeckLength() {
    return count($this->getCards());
  }

  /**
   * Empties the Deck by setting cards to empty array
   */
  public function emptyDeck() {
    $this->setCards([]);
  }

  /**
   * Resets the Card Deck to a standard 52 Card Deck by looping through each
   * suit and rank possibility and instantiating a Card for each. Used in Deck
   * class construction.
   */
  public function resetDeck() {
    $suits = ['Hearts', 'Diamonds', 'Spades', 'Clubs'];
    $ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    $cards = [];
    for ($i = 0; $i < count($suits); $i++) {
      for ($j = 0; $j < count($ranks); $j++) {
        $card = new Card();
        $card->setSuit($suits[$i]);
        $card->setRank($ranks[$j]);
        array_push($cards, $card);
      }
    }

    $this->setCards($cards);
  }

  /**
   * Shuffles the Card Deck, generating a random permutation of Cards.
   * For each Card, starting with the last, swaps the selected Card with
   * a Card in a random place in the Deck.
   */
  public function shuffle() {
    $cards = $this->getCards();
    for($i = count($cards) - 1; $i >= 0; $i--) {
        $j = rand(0, $i + 1);
        $tmp = $cards[$i];
        $cards[$i] = $cards[$j];
        $cards[$j] = $tmp;
    }
    $this->setCards($cards);
  }

  /**
   * Deals a single Card from the end of the Deck, thus removing it from the
   * Deck and returning it.
   * @return Card|null the Card at the end of the Deck or null if no Cards
   */
  public function dealOneCard() {
    $dealtCard = null;
    $cards = $this->getCards();
    if (!empty($cards)) {
      $dealtCard = array_pop($cards);
      $this->setCards($cards);
    }
    return $dealtCard;
  }

  /**
   * Returns a string containing every Card in the Deck with new lines between
   * each Card for readability.
   * @return string string containing every Card in the Deck
   */
  public function toString() {
    $cardString = '';
    $cards = $this->getCards();
    foreach ($cards as $card) {
      $cardString .= $card->toString() . "\n";
    }
    return $cardString;
  }
}