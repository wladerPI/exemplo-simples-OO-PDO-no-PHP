<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// UFC LUTADORES = relacionamento entre class

// UFC LUTADORES 

class Lutador {
	// atributos 
	private $nome;
	private $nacionalidade;
	private $idade;
	private $altura;
	private $peso;
	private $categoria;
	private $vitorias;
	private $derrotas;
	private $empates;
	
	// METADOS 
	public function __construct($no, $na, $id, $al, $pe, $vi, $de, $em) {
		$this->nome = $no;		
		$this->nacionalidade = $na;
		$this->idade = $id;
		$this->altura = $al;
		$this->setPeso($pe);
		$this->peso = $pe;
		$this->vitorias = $vi;
		$this->derrotas = $de;
		$this->empates = $em;
	}
	
	// criando Gets
	public function getNome() {
		return $this->nome;
	}
	public function getNacionalidade() {
		return $this->nacionalidade;
	}
	public function getIdade() {
		return $this->idade;
	}
	public function getAltura() {
		return $this->altura;
	}
	public function getPeso() {
		return $this->peso;
	}
	public function getCategoria() {
		return $this->categoria;
	}
	public function getVitorias() {
		return $this->vitorias;
	}
	public function getDerrotas() {
		return $this->derrotas;
	}
	public function getEmpates() {
		return $this->empates;
	}
	
	// criando Sets
	public function setNome($no) {
		$this->nome = $no;
	}
	public function setNacionalidade($na) {
		$this->nacionalidade = $na;
	}
	public function setIdade($id) {
		$this->idade = $id;
	}
	public function setAltura($al) {
		$this->altura = $al;
	} 
	public function setPeso($pe) {
		$this->peso = $pe;
		$this->setCategoria();
	} 
	private function setCategoria() {
		if($this->peso < 52.2){
			$this->categoria = "Invalido";
		} elseif  ($this->peso <= 70.3) {
			$this->categoria = "leve";
		} elseif ($this->peso <= 83.9) {
			$this->categoria = "medio";
		} elseif ($this->peso <= 120.2) {
			$this->categoria = "Pesado";
		} else {
			$this->categoria = "Invalido";
		}
	}
	public function setVitorias($vi) {
		$this->vitorias = $vi;
	}
	public function setDerrotas($de) {
		$this->derrotas = $de;
	}
	public function setEmpates($em) {
		$this->empates = $em;
	}
	
	
	
	public function apresentar() {
		echo "<p>-----------------------------------------</p>";
		echo "Lutador: ".$this->getNome() . "<br>";
		echo "Origem: ".$this->getNacionalidade() . "<br>";
		echo $this->getIdade() . " anos <br>";
		echo $this->getAltura() . "m de altura<br>";
		echo "Pesando: ".$this->getPeso() . "kg <br>";
		echo "Ganhou: ".$this->getVitorias() . "<br>";
		echo "Perdeu: ".$this->getDerrotas() . "<br>";
		echo "Empate: ".$this->getEmpates() . "<br>";
	}
	public function status() {
		echo "<p>-----------------------------------------</p>";
		echo $this->getNome() . "<br>";	
		echo "É um peso ". $this->getCategoria() . "<br>";	
		echo $this->getVitorias() . "<br>";	
		echo $this->getDerrotas() . "<br>";	
		echo $this->getEmpates() . "<br>";	
	}
	public function ganharLuta() {
		$this->setVitorias($this->getVitorias() +1);
	}
	public function perderLuta() {
		$this->setDerrotas($this->getDerrotas() +1);
	}
	public function empatarLuta() {
		$this->setEmpates($this->getEmpates() +1);
	} 
}
  
 
// Relacionamento de Agregação

class Luta {
	// atributos 
	private $desafiado; 
	private $desafiante;
	private $rounds;
	private $aprovada;
	
	
	// metados publicos
	public function marcarLuta($l1, $l2) {
		if ($l1->getCategoria() === $l2->getCategoria() &&  $l1 != $l2  ) { // se ambos lutadores forem da msm categoria && não forem o mesmo lutador
			$this->aprovada = true; // aprovado
			$this->desafiado = $l1;
			$this->desafiante = $l2; 
		} else {
			$this->aprovada = false; // reprovado não havera luta
			$this->desafiado = null;
			$this->desafiante = null;
		
		}
	}
	public function lutar() { 
		if ($this->aprovada) { 
			$this->desafiado->apresentar();
			$this->desafiante->apresentar();
			$vencedor = rand(0,2); // selecionar um vencedor aleatorio entre 1 e 2
			switch($vencedor){
				case 0: // empate 
					echo "<p>Empate!</p>";
					$this->desafiado->empatarLuta();
					$this->desafiante->empatarLuta();
					
				break;
				case 1: // desafiado vence 
					echo "<p> " . $this->desafiado->getNome() . " venceu </p>";
					$this->desafiado->ganharLuta();
					$this->desafiado->perderLuta();
					
				break;
				case 2: // desafiante vence 
					echo "<p> " . $this->desafiante->getNome() . " venceu </p>";
					$this->desafiante->ganharLuta();
					$this->desafiante->perderLuta();
				break;
			}
		} else {
			echo "<p>Luta não pode acontecer</p>";
		}
	}
	
	// metados especiais 
	// gets
	function getDesafiado() {
		return $this->desafiado;
	}
	function getDesafiante() {
		return $this->desafiante;
	}
	function getRounds() {
		return $this->rounds;
	}
	function getAprovado() {
		return $this->aprovada;
	}
	// sets
	function setDesafiado($desafiado) {
		$this->desafiado = $desafiado;
	}
	function setDesafiante($desafiante) {
		$this->desafiante = $desafiante;
	}
	function setRounds($rounds) {
		$this->rounds = $rounds;
	}
	function setAprovado($aprovada) {
		$this->aprovada = $aprovada;
	}
}
?> 

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body >
	  
		<?php
		
		
			$l = array();
			// lutadores
			$l[0] = new Lutador("Pretty Boy", "França", 30, 1.75, 68.9, 11, 2, 1); 
			$l[1] = new Lutador("Putscript", "Brasil", 29, 1.68, 57.8, 14, 2, 3);
			$l[2] = new Lutador("SnapShadow", "EUA", 35, 1.65, 80.9, 12, 2, 1);
			$l[3] = new Lutador("Dead Code", "Australia", 28, 1.93, 81.6, 13, 0, 2);
			$l[4] = new Lutador("UFOCobol", "Brasil", 37, 1.70, 119.3, 5, 4, 3);
			$l[5] = new Lutador("Nerdaart", "EUA", 30, 1.81, 105.7, 12, 2, 4);
		 /*	
			// chama funções
			$l[0]->perderLuta();
			$l[0]->status();
			$l[0]->apresentar();
			
		*/
		
			$ufc1 = new Luta();
			$ufc1->marcarLuta($l[1], $l[0]);
			$ufc1->lutar();
			
			//$l[0]->status();
			//$l[1]->status();
		?> 
    </body>
</html> 