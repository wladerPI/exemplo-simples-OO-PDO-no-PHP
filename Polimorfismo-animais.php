<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Funcionamento de Polimorfismo
// exemplo de class com Polimorfismo(Animais)
// para deixar o codigo mais organizado é melhor separar as class em outra pagina e busca-las via require()


abstract class Animal {
	protected $peso;
	protected $idade;
	protected $membros;
	
	// as function abstract sobrepoe em qualquer outra class abaixo, podendo gerar um resultado diferente em cada class
	abstract function  locomover();
	abstract function  alimentar();
	abstract function  emitirSom();
	
	
	//Gets 
	public function getPeso() {
		return $this->peso;
	} 
	public function getIdade() {
		return $this->idade;
	} 
	public function getMembros() {
		return $this->membros;
	} 
	
	//Sets
	public function setPeso($peso) {
		$this->peso = $peso;
	}
	public function setIdade($idade) {
		$this->idade = $idade;
	}
	public function setMembros($membros) {
		$this->membros = $membros;
	}
}

class Mamifero extends Animal {
	private $corPelo;
	
	//SobrePor
	public function locomover() {
		echo "<p>Correndo</p>";
	}
	//SobrePor
	public function alimentar() {
		echo "<p>Mamando</p>";
	}
	//SobrePor
	public function emitirSom() {
		echo "<p>Som de Mamifero</p>";
	}
	
	
	//Gets 
	public function getCorPelo() {
		return $this->corPelo;
	}   
	//Sets
	public function setCorPelo($corPelo) {
		$this->corPelo = $corPelo;
	}
}


class Reptil extends Animal {
	private $corEscama;
	
	//SobrePor
	public function locomover() {
		echo "<p>Rastejando</p>";
	}
	//SobrePor
	public function alimentar() {
		echo "<p>Comendo Vejetais</p>";
	}
	//SobrePor
	public function emitirSom() {
		echo "<p>som de Repeil</p>";
	}
	
	
	//Gets 
	public function getCorEscama() {
		return $this->corEscama;
	}   
	//Sets
	public function setCorPelo($corEscama) {
		$this->corEscama = $corEscama;
	}
}

class Peixe extends Animal {
	private $corEscama;
	
	//SobrePor
	public function locomover() {
		echo "<p>Nandando</p>";
	}
	//SobrePor
	public function alimentar() {
		echo "<p>Comendo Substancias</p>";
	}
	//SobrePor
	public function emitirSom() {
		echo "<p>peixes não faz som</p>";
	}
	
	
	public function soltarBolhas() {
		echo "<p>Soltou uma bolha</p>";
	}
	
	
	//Gets 
	public function getCorEscama() {
		return $this->corEscama;
	}   
	//Sets
	public function setCorPelo($corEscama) {
		$this->corEscama = $corEscama;
	}
}
 

class Ave extends Animal {
	private $corPena;
	
	//SobrePor
	public function locomover() {
		echo "<p>Voando</p>";
	}
	//SobrePor
	public function alimentar() {
		echo "<p>Comendo Frutas</p>";
	}
	//SobrePor
	public function emitirSom() {
		echo "<p>som de ave</p>";
	}
	
	
	public function fazerNinho() {
		echo "<p>Construiu um ninho</p>";
	}
	
	
	//Gets 
	public function getCorPena() {
		return $this->corPena;
	}   
	//Sets
	public function setCorPelo($corPena) {
		$this->corPena = $corPena;
	}
}



class Canguro extends Mamifero {
	
	//SobrePor
	public function locomover() {
		echo "<p>Saltando</p>";
	}	
}

class Cachorro extends Mamifero {
	
	//SobrePor
	public function emitirSom() {
		echo "<p>Latindo</p>";
	}
}

class Cobra extends Reptil {
	 
	 
}

class Tartaruga extends Reptil {
	
	//SobrePor
	public function locomover() {
		echo "<p>Andando Bemmm devagar</p>";
	}
}

class GoldFish extends Peixe {
	 
}

class Arara extends Ave {
	 
}
	 
	 
?> 

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body >
		<pre>
		<?php
			$m = new Mamifero(); 
			$a = new Ave(); 
			$r = new Reptil(); 
			$c = new Canguro();
			$k = new Cachorro();
			$t = new Tartaruga();
			
			$m->setPeso(33.5);
			$m->locomover();
			$a->locomover();
			$r->locomover();
			$c->locomover(); 
			$k->locomover();
			$t->locomover();
			
			$m->emitirSom();
			$a->emitirSom();
			$r->emitirSom();
			$c->emitirSom();
			$k->emitirSom();
			$t->emitirSom();
			 
			 
			
		?> 
		</pre>
    </body>
</html> 
