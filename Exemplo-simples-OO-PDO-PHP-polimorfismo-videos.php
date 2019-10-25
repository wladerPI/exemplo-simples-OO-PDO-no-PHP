<?php
//   Exemplo Simples de orientação a objetos e PDO em php 
// Funcionamento de Polimorfismo
// exemplo de class com Polimorfismo(class videos)
// para deixar o codigo mais organizado é melhor separar as class em outra pagina e busca-las via require()


interface AcoesVideos {
	public function play();
	public function pause();
	public function like();
}

class Video implements AcoesVideos {
	private $titulo;
	private $avaliacao;
	private $views;
	private $curtidas;
	private $reproduzindo;
	
	public function __construct ($titulo) {
		$this->titulo = $titulo;
		$this->avaliacao = 1;
		$this->views = 0;
		$this->curtidas = 0;
		$this->reproduzindo = false;
	}
	
	
	public function play() {
		$this->reproduzindo = true;
	}
	public function pause() {
		$this->reproduzindo = false;
	}
	public function like() {
		$this->curtidas ++;
	}
	
	// Gets
	public function getTitulo() {
		return $this->titulo;
	}
	public function getAvaliacao() {
		return $this->avaliacao;
	}
	public function getViews() {
		return $this->views;
	}
	public function getCurtidas() {
		return $this->curtidas;
	}
	public function getReproduzindo() {
		return $this->reproduzindo;
	}
	
	// Sets 
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	public function setAvaliacao($avaliacao) {
		$this->avaliacao = $avaliacao;
	}
	public function setViews($views) {
		$this->views = $views;
	}
	public function setCurtidas($curtidas) {
		$this->curtidas = $curtidas;
	}
	public function setReproduzindo($reproduzindo) {
		$this->reproduzindo = $reproduzindo;
	}
}
 

abstract class Pessoa {
	protected $nome;
	protected $idade;
	protected $sexo;
	protected $experiencia;
	
	
	public function __construct($nome, $idade, $sexo) {
		$this->nome = $nome;
		$this->idade = $nome;
		$this->sexo = $sexo;
		$this->experiencia = 0;
	}
	 
	protected function ganharExp($n)  {
		$this->experiencia += $n;
	}
	 
	// Gets
	public function getNome() {
		return $this->nome;
	}
	public function getIdade() {
		return $this->idade;
	}
	public function getSexo() {
		return $this->sexo;
	}
	public function getExperiencia() {
		return $this->experiencia;
	}
	
	// Sets 
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setIdade($idade) {
		$this->idade = $idade;
	}
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	public function setExperiencia($experiencia) {
		$this->experiencia = $experiencia;
	} 
}

class Gafanhoto extends Pessoa {
	private $login;
	private $totAssistido;
	 
	public function __construct($nome, $idade, $sexo, $login) {
		parent::__construct($nome, $idade, $sexo);
		$this->login = $login;
		$this->totAssistido = 0;
	}
	
	public function assistirMaisUm() {
		$this->totAssistido ++;
	}
	
	// Gets
	public function getLogin() {
		return $this->login;
	}
	public function getTotAssistido() {
		return $this->totAssistido;
	}
	
	// Sets 
	public function setLogin($login) {
		$this->login = $login;
	}
	public function setTotAssistido($totAssistido) {
		$this->totAssistido = $totAssistido;
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
		
			$v[0] = new Video("Aula 1 de PDO"); 
			$v[1] = new Video("Aula 12 de PHP"); 
			$v[2] = new Video("Aula 15 de HTML5"); 
			
			$g[0] = new Gafanhoto("Jubileu", 22, "M", "juba");
			$g[1] = new Gafanhoto("Creuza", 12, "F", "creuz");
			
			
			print_r($v);
			 print_r($g);
			
		?> 
		</pre>
    </body>
</html> 
