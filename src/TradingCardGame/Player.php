<?php

namespace TradingCardGame;

class Player {
	private $health;
	private $mana;

	public function __construct() {
		$this->health = 30;
		$this->mana = 0;
	}

	public function getHealth() {
		return $this->health;
	}

	public function getMana() {
		return $this->mana;
	}
}