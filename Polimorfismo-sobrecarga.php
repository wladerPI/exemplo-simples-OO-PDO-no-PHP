<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Funcionamento de Polimorfismo adptação de Sobrecarga
// exemplo de class com Polimorfismo(Animais) adptação de Sobrecarga
// para deixar o codigo mais organizado é melhor separar as class em outra pagina e busca-las via require()


abstract class Animal {
	protected $peso;
	protected $idade;
	protected $membros;
	
	// as function abstract sobrepoe em qualquer outra class abaixo, podendo gerar um resultado diferente em cada class 
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
	protected $corPelo;
	
	// Sobrepor
	public function emitirSom() {
		echo "<p>som Mamifero</p>";
	} 
}

class Lobo extends Mamifero {
	
	// Sobrepor
	public function emitirSom() {
		echo "<p>Auuuuuuuuuuuuuuu!</p>";
	} 
}

class Cachorro extends Lobo {
	
	// Sobrepor
	public function emitirSom() {
		echo "<p>Au! Au! Au!</p>";
	} 
	
	
	// PHP não suporta Sobrecarga, portanto podemos criar um metodo(function) para cada ação 
	public function reagirFrase($frase) {
		if ($frase == "Coma Comida" || $frase == "Ola"){
			echo "<p>Abanar e latir</p>";
		} else {
			echo "<p>Rosnar</p>";
		}
	}
	
	public function reagirHora($hora, $min) {
		if ($hora < 12) {
			echo "<p>Abanar</p>";
		} elseif ($hora >= 18) {
			echo "<p>Ignorar</p>";
		} else {
			echo "<p>Rosnar e latir</p>";
		}
	}
	
	public function reagirDono($dono) {
		if ($dono == true) {
			echo "<p>Abanar</p>";
		} else {
			echo "<p>Rosnar e latir</p>";
		}
	}
	
	public function reagirIdadePeso($idade, $peso) {
		if ($idade < 5) {
			if ($peso < 10){
				echo "<p>Abanar</p>";
			} else {
				echo "<p>latir</p>";
			}
		} else {
			if ($peso < 10){
				echo "<p>Rosnar</p>";
			} else {
				echo "<p>Ignorar</p>";
			}
		}
	}
}
 
 
?> 

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body >
		<pre>
		<?php
			$c = new Cachorro();
			$l = new Lobo();
			$m = new Mamifero();
			$c->emitirSom(); // Au! Au! Au!
			 
			$c->reagirFrase("Ola");
			$c->reagirFrase("fora");
			$c->reagirHora(11, 45);
			$c->reagirHora(21, 00);
			$c->reagirDono(true);
			$c->reagirDono(false);
			$c->reagirIdadePeso(2, 12.5);
			$c->reagirIdadePeso(17, 4.5);
			
			
			
		?> 
		</pre>
    </body>
</html> 
