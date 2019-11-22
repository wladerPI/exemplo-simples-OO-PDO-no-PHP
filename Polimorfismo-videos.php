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
		$media = 0;
		$media = ($this->avaliacao + $avaliacao)/$this->views; 
		$this->avaliacao = $media;
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


class visualizacao {
	private $espectador;
	private $filme;
	
	public function __construct($espectador, $filme) {
		$this->espectador = $espectador;
		$this->filme = $filme;
		$this->filme->setViews($this->filme->getViews() +1);
		$this->espectador->setTotAssistido($this->espectador->getTotAssistido() +1);
	}
	
	public function avaliar() {
		$this->filme->setAvaliacao(5);
	}
	public function avaliarNota($nota) {
		$this->filme->setAvaliacao($nota);
	}
	public function avaliarPorc($porc) {
		$nova = 0;
		if ($porc <= 20){
			$nova = 3;
		} elseif($porc <= 50) {
			$nova = 5;
		} elseif($porc <= 90) {
			$nova = 8;
		} else {
			$nova = 10;
		}
		$this->filme->setAvaliacao($nova);
	}
	
	// Gets
	public function getEspectador() {
		return $this->espectador;
	}
	public function getFilme() {
		return $this->filme;
	}
	
	// Sets 
	public function setEspectador($espectador) {
		$this->espectador = $espectador;
	}
	public function setFilme($filme) {
		$this->filme = $filme;
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
			
			$vis[0] = new Visualizacao($g[1], $v[2]);
			$vis[1] = new Visualizacao($g[1], $v[1]);
			
			$vis[1]->avaliar();
			$vis[0]->avaliarPorc(85);
			
			print_r($vis); print_r($vis2); 
			
		?> 
		</pre>
    </body>
</html> 
