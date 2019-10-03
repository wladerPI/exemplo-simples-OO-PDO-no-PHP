<?php
// Curso POO Teoria #05 - Exemplo Prático com Objetos

class ContaBanco {
	public $numConta;
	protected $tipo;
	private $dono;
	private $saldo;
	private $status;
	
 
	public function abrirConta($t) {
		$this->setTipo($t);
		$this->setStatus(true);
		if ($t == "CC") {
			$this->setSaldo(50);
		} elseif ($t == "CP"){
			$this->setSaldo(150);	
		} 
	} 
	public function fecharConta() {
		if ($this->getSaldo() > 0 ){
			echo "Essa conta ainda tem dinheiro<br>";
		} elseif($this->getSaldo() < 0) {
			echo "Essa conta está em debito, impossivel encerrar!<br>";
		} else {
			$this->setStatus(false);
			echo "Conta de ".$this->getDono()." foi fechada<br>";			
		}
	} 
	public function depositar($v) {
		if ($this->getStatus()) {
			$this->setSaldo($this->getSaldo() + $v); 
			echo "deposito de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
		} else {
			echo "Conta fechada, não consigo depositar<br>";
		}
	} 
	public function sacar($v) {
		if ($this->getStatus()) {
			if ($this->getSaldo() >= $v) {
				$this->setSaldo($this->getSaldo() - $v); 
				echo "saque de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
			} else {
				echo "Saldo insuficiente para saque<br>";
			}
		} else {
			echo "não posso sacar de uma conta fechada<br>";
		}
	}
	public function pagarMensal() {
		if ($this->getTipo() == "CC"){
			$v = 12;
		} else if ($this->getTipo() == "CP") {
			$v = 20;
		}
		if ($this->getStatus()) {
			$this->setSaldo($this->getSaldo() - $v); 
			echo "Mensalidade de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
		} else {
			echo "Problemas com a conta, não posso cobrar<br>";
		}
	}
	
	
	
	public function __construct() {
		$this->setSaldo(0);
		$this->setStatus(false);
	}
	public function getNumConta() {
		return $this->numConta;
	}
	public function getTipo() {
		return $this->tipo;
	}
	public function getDono() {
		return $this->dono;
	}
	public function getSaldo() {
		return $this->saldo;
	}
	public function getStatus() {
		return $this->status;
	}
	
	
	
	public function setNumConta($numConta) {
		$this->numConta = $numConta;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	public function setDono($dono) {
		$this->dono = $dono;
	}
	public function setSaldo($saldo) {
		$this->saldo = $saldo;
	}
	public function setStatus($status) {
		$this->status = $status;
	}
}

 
 
?> 

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body >
		<?php
			$p1 = new ContaBanco(); // Jubileu 
			$p1->abrirConta("CC");
			$p1->setDono("Jubileu");
			$p1->setNumConta("1111");
			$p1->depositar("300");
			$p1->pagarMensal();
			$p1->sacar(338);
			$p1->fecharConta();
			
			
			$p2 = new ContaBanco(); //Creuza
			$p2->abrirConta("CP");
			$p2->setDono("Creuza");
			$p2->setNumConta("2222");
			$p2->depositar("500");
			$p2->sacar("100");
			$p2->pagarMensal();
			
			
			print_r($p1); echo "<br><br>";
			print_r($p2);
		?> 
    </body>
</html> 