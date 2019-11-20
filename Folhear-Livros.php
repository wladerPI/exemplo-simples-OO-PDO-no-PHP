<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Folheando Livros 

class Pessoa {
	// atributos 
	private $nome;
	private $idade;
	private $sexo;
	   
	// METODOS 
	public function fazerAniver() {
		//$this->setIdade($this->getIdade() +1);
		//ou 
		$this->idade ++;
	} 
	
	public function __construct($nome, $idade, $sexo) {
		$this->nome = $nome;
		$this->idade = $idade;
		$this->sexo = $sexo;
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
	public function setIdade($idade){
		$this->idade = $idade;
	}
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
}

interface Publicacao {
	public function abrir();
	public function fechar();
	public function folhear($p);
	public function avancarPag();
	public function voltarPag(); 
}


class Livro implements Publicacao { 
	
	// atributos 
	private $titulo;
	private $autor;
	private $totPagina;
	private $pagAtual;
	private $aberto;
	private $leitor; 
	
	// METODOS 
	public function detalhes() {
		echo "<p>-----------------------------------------</p>";
		echo "Titulo: ".$this->titulo . "<br>";
		echo "Autor: ".$this->autor . "<br>"; 
		echo "Total de Paginas: ".$this->totPagina . " <br>";
		echo "Pagina Atual: ".$this->pagAtual . "<br>";
		echo "Aberto: ".$this->aberto . "<br>";
		echo "Leitor: ". $this->leitor->getNome() ."<br>"; 
		echo "<p>-----------------------------------------</p>";
		
		
	}
	
	public function __construct($titulo, $autor, $totPagina, $leitor) {
		$this->titulo = $titulo;
		$this->autor = $autor;
		$this->totPagina = $totPagina; 
		$this->pagAtual = 0; 
		$this->aberto = false; 
		$this->leitor = $leitor;  
	}
	
	
	
	
	
	// criando Gets
	public function getTitulo() {
		return $this->titulo;
	}
	public function getAutor() {
		return $this->autor;
	}
	public function getTotPagina() {
		return $this->totPagina;
	}
	public function getPagAtual() {
		return $this->pagAtual;
	}
	public function getAberto() {
		return $this->aberto;
	}
	public function getLeitor() {
		return $this->leitor;
	}
	 
	// criando Sets
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	public function setAutor($autor) {
		$this->autor = $autor;
	}
	public function setTotPagina($totPagina){
		$this->totPagina = $totPagina;
	}
	public function setPagAtual($pagAtual) {
		$this->PagAtual = $pagAtual;
	}
	public function setAberto($aberto) {
		$this->aberto = $aberto;
	}
	public function setLeitor($leitor) {
		$this->leitor = $leitor;
	}
	
	
	public function abrir() {
		$this->aberto(true);
	}
	
	public function fechar() {
		$this->fechar(false);
	}
	
	public function folhear($p) {
		if ($p > $this->totPagina){
			$this->pagAtual = 0;
		} else {
			$this->pagAtual = $p;
		}
	}
	
	public function avancarPag() {
		$this->pagAtual ++; 
	}
	
	public function voltarPag() {
		$this->pagAtual --;
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
			$p[0] = new Pessoa("Pedro", "22", "M");
			$p[1] = new Pessoa("Maria", "31", "F");
			
			$l[0] = new Livro("PHP Basico", "Jose da Silva", 300, $p[0]);
			$l[1] = new Livro("PDO com PHP", "Maria de Sousa", 500, $p[0]);
			$l[2] = new Livro("PHP Avançado", "Ana paula", 800, $p[1]);
			
			$l[0]->folhear(15);
			$l[0]->avancarPag();
			$l[0]->voltarPag(); 
			$l[0]->detalhes();
			
		?> 
		</pre>
    </body>
</html> 
