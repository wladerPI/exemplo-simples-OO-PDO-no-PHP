<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Funcionamento de Heranças parte 2 - Varias  Class  
// exemplo de class com (Heranças) Pessoas 'Visitante', 'Aluno', 'Bolsista' 
 
abstract class Pessoa {
	protected $nome;
	protected $idade;
	protected $sexo;
	
	// esse metodo é um metodo 'final' portanto não poderá sobrepor em outras class
	public final function fazerAniversario() {
		$this->idade ++;
	}
	
	// gets
	public function getNome() {
		return $this->nome;
	}
	public function getIdade() {
		return $this->idade;
	}
	public function getSexo() {
		return $this->sexo;
	}
	
	//sets
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setIdade($idade) {
		$this->idade = $idade;
	}
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	
} 

class Visitante extends Pessoa {
	//o visitante pode utilizar todos atributos e metodos da class Pessoa
	
}

class Aluno extends Pessoa {
	//o Aluno pode utilizar todos atributos e metodos da class Pessoa e + seus próprios atributos e metodos
	
	private $matricula; 
	private $curso; 
	
	public function pagarMensalidade() {
		echo "<p>Pagando mensalidade do aluno ". $this->nome ." </p>"; //para usar aqui a tag "$this->nome da class Pessoa" ela não pode ser private
	}
	
	// gets
	public function getMatricula() {
		return $this->matricula;
	}
	public function getCurso() {
		return $this->curso;
	} 
	
	//sets
	public function setMatricula($matricula) {
		$this->matricula = $matricula;
	}
	public function setCurso($curso) {
		$this->curso = $curso;
	} 
}
 
class Bolsista extends Aluno {
	//o Bolsista  pode utilizar todos atributos e metodos das class Aluno e Pessoa e + seus próprios atributos e metodos
	
	private $bolsa;
	
	public function renovarBolsa() {
		echo "<p>Bolsa renovada</p>";
	}
	
	public function pagarMensalidade() {
		echo "<p>". $this->nome ." é Bolsista! Então paga com desconto</p>"; //para usar aqui a tag "$this->nome da class Pessoa" ela não pode ser private
	}
	
	// gets 
	public function getBolsa() {
		return $this->bolsa;
	} 
	// sets 
	public function setBolsa($bolsa) {
		$this->bolsa = $bolsa;
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
			$a1 = new Aluno();
			$a1->setNome("Pedro");
			$a1->setMatricula(1111);
			$a1->setIdade(16);
			$a1->setSexo("M");
			$a1->setCurso("Informatica");
			$a1->pagarMensalidade();
			print_r($a1);
			 
			 
			$v1 = new Visitante();
			$v1-> setNome("Luiz");
			$v1-> setIdade(28);
			$v1-> setSexo("M"); 
			print_r($v1);
			   
			$b1 = new Bolsista();
			$b1-> setMatricula(1234);
			$b1-> setNome("Jubileu");
			$b1-> setBolsa(12.5);
			$b1-> setCurso("Administração");
			$b1-> setIdade(35);
			$b1->pagarMensalidade();
			$b1->fazerAniversario(); 
			print_r($b1);
		?> 
		</pre>
    </body>
</html> 
