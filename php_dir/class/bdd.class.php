<?php

class bdd {

	//-------------------------------------//
	//---------------ATTRIBUTS-------------//
	//-------------------------------------//

	private $bdd;

	private $login;
	private $mdp;
	private $instance;
	private $type;

	private $host;
	private $port;
	//-------------------------------------//
	//----------CONSTRUCTEURS--------------//
	//-------------------------------------//

	public function __construct	($p_login="root",$p_mdp="azerty",
		$p_instance = "tdf",$p_type="mysql",$p_host="localhost",$p_port="3306") {

			$this->login = $p_login;
			$this->mdp   = $p_mdp;
			$this->instance = $p_instance;
			$this->host =$p_host;
			$this->port =$p_port;

			$this->type =$p_type;
			$this->connexion();

		}


	//------------------------------------//
	//--------------GETTERS---------------//
	//------------------------------------//
	public function get_bdd() {
		return $this->bdd;
	}

	public function get_login() {
		return $this->login;
	}

	public function get_type() {
		return $this->type;
	}
	public function get_mdp() {
		return $this->mdp;
	}
	public function get_host() {
		return $this->host;
	}
	public function get_port() {
		return $this->port;
	}
	//-------------------------------------//
	//---------------SETTERS---------------//
	//-------------------------------------//

	public function set_bdd($p_bdd) {
		$this->bdd = $p_bdd;
	}

	public function set_login($p_login) {
		$this->login = $p_login;
	}

	public function set_type($p_type) {
		$this->type = $p_type;
	}
	public function set_mdp($p_mdp) {
		$this->mdp = $p_mdp;
	}
	public function set_host($p_host) {
		$this->host = $p_host;
	}
	public function set_port($p_port) {
		$this->port = $p_port;
	}
	//-------------------------------------//
	//---------------METHODS---------------//
	//-------------------------------------//

	//----------------PUBLIC---------------//

	//---------------PRIVATE---------------//

	private function connexion() {

		try {

			$this->bdd = new PDO ($this->type.":host=".$this->host.";dbname=".$this->instance.";port=".$this->port, $this->login, $this->mdp);

		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}

?>
