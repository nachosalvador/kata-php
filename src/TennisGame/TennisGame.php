<?php

namespace TennisGame;

class TennisGame {
	private $player1;
	private $player2;

	public function __construct($player1, $player2) {
		$this->player1 = $player1;
		$this->player2 = $player2;
	}

	public function getPlayer1() {
		return $this->player1;
	}

	public function getPlayer2() {
		return $this->player2;
	}

	public function hasPlayers() {
		return (isset($this->player1) && isset($this->player2));
	}
}