<?php
//   Exemplo Prático com Objetos

class ContaBanco {
	public $numConta;
	protected $tipo;
	private $dono;
	private $saldo;
	private $status;
	
	// Abriando contas no banco 
	public function abrirConta($t) {
		$this->setTipo($t); // altera o Tipo da Conta (Array)
		$this->setStatus(true); // altera o Status da para Verdadeiro = Aberta
		if ($t == "CC") { // verifica se (array) == Conta Corrente 
			$this->setSaldo(50); // adciona +R$50 na conta de bonus 
		} elseif ($t == "CP"){ // verifica se (array) == Conta Poupança 
			$this->setSaldo(150); // adciona +R$150 na conta de bonus 	
		} 
	} 
	
	// Fechando contas no banco 
	public function fecharConta() {
		if ($this->getSaldo() > 0 ){ // verifica se tem saldo na conta 
			echo "Essa conta ainda tem dinheiro<br>";
		} elseif($this->getSaldo() < 0) { // verifica se o saldo da conta está negativo
			echo "Essa conta está em debito, impossivel encerrar!<br>";
		} else { 
			$this->setStatus(false); // conta fechada, altera o status = false = conta fechada
			echo "Conta de ".$this->getDono()." foi fechada<br>";			
		}
	} 
	
	// Efetuando Depositos
	public function depositar($v) {
		if ($this->getStatus()) { // verifica se status da conta = verdadeiro
			$this->setSaldo($this->getSaldo() + $v);  // altera saldo da conta para (saldo + (array) )
			echo "deposito de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
		} else {
			echo "Conta fechada, não consigo depositar<br>";
		}
	} 
	
	// Efetuando Saques
	public function sacar($v) {
		if ($this->getStatus()) { // verifica se status da conta = verdadeiro
			if ($this->getSaldo() >= $v) { // verifica se saldo >= (array)
				$this->setSaldo($this->getSaldo() - $v);  // altera saldo da conta para (saldo - (array) )
				echo "saque de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
			} else {
				echo "Saldo insuficiente para saque<br>";
			}
		} else {
			echo "não posso sacar de uma conta fechada<br>";
		}
	}
	
	// Pagamento de Mesalidades
	public function pagarMensal() {
		if ($this->getTipo() == "CC"){ // verifica se tipo da conta = Conta Corrente
			$v = 12;
		} else if ($this->getTipo() == "CP") { // verifica se tipo da conta = Conta Poupança
			$v = 20;
		}
		if ($this->getStatus()) { // verifica se status da conta = verdadeiro
			$this->setSaldo($this->getSaldo() - $v); // altera saldo da conta para (saldo - (array) )
			echo "Mensalidade de $v efetuado com sucesso, na conta do(a)".$this->getDono()."<br>";
		} else {
			echo "Problemas com a conta, não posso cobrar<br>";
		}
	}
	
	
	// Contas Padrão
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
			$p1->abrirConta("CC");  //Abriu Conta Corrente
			$p1->setDono("Jubileu"); // Nome do Cliente
			$p1->setNumConta("1111"); // Numero da conta do Cliente
			$p1->depositar("300"); // Novo deposito
			$p1->pagarMensal(); // Pagamento da mensalidade
			$p1->sacar(338); // Novo Saque
			$p1->fecharConta(); // Fechando Conta 
			 
			$p2 = new ContaBanco(); //Creuza
			$p2->abrirConta("CP"); //Abriu Conta Poupança
			$p2->setDono("Creuza");  // Nome do Cliente
			$p2->setNumConta("2222");// Numero da conta do Cliente
			$p2->depositar("500"); // Novo deposito
			$p2->sacar("100"); // Novo Saque
			$p2->pagarMensal(); // Pagamento da mensalidade
			 
			print_r($p1); echo "<br><br>";
			print_r($p2);
		?> 
    </body>
</html> 