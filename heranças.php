<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Funcionamento de Heranças 
// exemplo de class com Pessoas  / Aluno, Professor e Funcionarios

class Pessoa {
	// atributos 
	private $nome;  
	private $idade;
	private $sexo;
	
	// METODOS  
	public function fazerAniv() {
		$this->idade ++;
	}
	 
	// criando Gets
	public function getNome() {
		return $this->nome;
	} 
	public function getIdade() {
		return $this->idade;
	} 
	public function getSexo() {
		return $this->sexo;
	} 
	
	// criando Sets
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
class Aluno extends Pessoa {
	
	// atributos 
	private $matr;  
	private $curso;
	
	// METODOS  
	public function cancelarMatr() {
		echo "<p>Matricula cancelada!</p>";
	}
	 
	// criando Gets 
	public function getMatr() {
		return $this->matr;
	} 
	public function getCurso() {
		return $this->curso;
	}
	
	// criando Sets
	public function setMatr($matr) {
		$this->matr = $matr;
	} 
	public function setCurso($curso) {
		$this->curso = $curso;
	} 
	
} 
class Professor extends Pessoa {
	
	// atributos 
	private $especialidade;  
	private $salario;
	
	// METODOS  
	public function receberAum($aum) {
		$this->salario += $aum;
	}
	 
	
	// criando Gets 
	public function getEspecialidade() {
		return $this->especialidade;
	} 
	public function getSalario() {
		return $this->salario;
	}
	
	// criando Sets
	public function setEspecialidade($especialidade) {
		$this->especialidade = $especialidade;
	} 
	public function setSalario($salario) {
		$this->salario = $salario;
	} 
	
} 
class Funcionario extends Pessoa {
	// atributos 
	private $setor;  
	private $trabalhando;
	
	// METODOS  
	public function MudarTrabalho($aum) {
		$this->trabalhando = ! $this->trabalhando; 
	}
	 
	// criando Gets 
	public function getSetor() {
		return $this->setor;
	} 
	public function getTrabalhando() {
		return $this->trabalhando;
	}
	
	// criando Sets
	public function setSetor($setor) {
		$this->setor = $setor;
	} 
	public function setTrabalhando($trabalhando) {
		$this->trabalhando = $trabalhando;
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
			$p1 = new Pessoa();
			$p2 = new Aluno();
			$p3 = new Professor();
			$p4 = new Funcionario();
			
			$p1->setNome("Pedro");
			$p2->setNome("Maria");
			$p3->setNome("Claudio");
			$p4->setNome("Faniana");
			
			$p2->setCurso("Informatica");
			$p3->setSalario(2500.75);
			$p4->setSetor("Estoque");
			
			 
			
			print_r($p1);
			print_r($p2);
			print_r($p3);
			print_r($p4);
			
		?> 
		</pre>
    </body>
</html> 
