<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// funcionamento de um controle remoto da TV

interface Controlador {
	// metodo abstratos 
	public function ligar();
	public function desligar();
	public function abrirMenu();
	public function fecharMenu();
	public function maisVolume();
	public function menosVolume();
	public function ligarMudo();
	public function desligarMudo();
	public function play();
	public function pause(); 
}

class ControleRemoto implements Controlador {
	
	// atributos
	private $volume;
	private $ligado;
	private $tocando; 
	
	// Metodo Especiais 
	public function __construct() {
		$this->volume = 5;
		$this->ligado = false;
		$this->tocando = false; 
	} 
	
	private function getVolume() {
		return $this->volume;
	}
	private function getligado() {
		return $this->volume;
	}
	private function getTocando() {
		return $this->volume;
	}
	private function setVolume($v) {
		$this->volume = $v;
	}
	private function setLigado($l) {
		$this->ligado = $l;
	}
	private function setTocando($t) {
		$this->tocando = $t;
	} 
	
	 
	public function ligar() {
		$this->setLigado(true);
	} 
	public function desligar() {
		$this->setLigado(false);
	} 
	public function abrirMenu() {
		echo "<br> Está ligado? " . ($this->getLigado() ? "SIM" : "NAO"); // if ligado = sim else = nao
		echo "<br> Está tocando?" . ($this->getTocando() ? "SIM" : "NAO"); // if tocando = sim else = nao
		echo "<br> Volume: " . $this->getVolume();
		for ($i=0; $i <= $this->getVolume(); $i+=10) {
			echo "|||||"; 
		}
		echo "<br>"; 
	} 
	public function fecharMenu() {
		echo "fechando menu";
	} 
	public function maisVolume() {
		if($this->getLigado()){
			$this->setVolume($this->getVolume() +1);
		} else {
			echo "<p>Erro: não posso aumentar volume</p>";
		}
	} 
	public function menosVolume() {
		if($this->getLigado()) {
			$this->setVolume($this->getVolume() -1);
		} else {
			echo "<p>Erro: não posso diminuir volume</p>";
		}
	} 
	public function ligarMudo() {
		if($this->getLigado() && $this->getVolume() > 0) {
			$this->setVolume(0);
		}
	} 
	public function desligarMudo() {
		if($this->getLigado() && $this->getVolume() == 0) {
			$this->setVolume(5);
		}
	}  
	 
	public function pause() {
		if ($this->getLigado() && !($this->getTocando())) { // se ligado e não tocando
			$this->setTocando(true);
		}
	} 
	public function play() {
		if($this->getLigado() && $this->getTocando()){
			$this->setTocando(false);
		}
	} 
}
 
?> 

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body >
	  
		<?php
			$c = new controleRemoto();
			$c->ligar();
			//$c->setVolume(10); // não da para usar aqui o setVolume() pq ele está como private
			
			$c->maisVolume();
			$c->maisVolume();
			$c->ligarMudo();
			 
			$c->abrirMenu();
			 
	
	
		?> 
    </body>
</html> 
