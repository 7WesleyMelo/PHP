<?php

Class Conta
{   
    //O nome de uma classe tem como padrão ser um substantivo, já o nome dos métodos são verbos.

    //Abstração
    //Propriedades privadas e métodos públicos
    private Titular $titular;//Composição de objetos, instanciando a classe Titular.
    private float $saldo;
    private static float $numeroDeContas = 0;

    // Entendemos o que são membros estáticos. São membros da classe em si, e não de cada instância (objeto).

    //readonly

    //Inicializar a instância
    //$this acessa a instância.
    public function __construct(Titular $titular)
    {   
        $this->titular = $titular;
        $this->saldo = 0;
        
        self::$numeroDeContas++;
    }

    //Função dentro de uma classe é chamado de métodos
    public function sacar(float $valorAsacar): void
    {
        if($valorAsacar > $this->saldo){

            echo "Saldo indisponível";
            return;
        }
            
        $this->saldo -= $valorAsacar;
        
    }

    public function depositar(float $valorAdpositar) : void
    {
        if($valorAdpositar < 0){
            echo "Valor precisa ser positivo";
            return;
        } 
            
        $this->saldo += $valorAdpositar;
        
    }

    public function transferir(float $valorATransferir, conta $contaDestino): void
    {
        if($valorATransferir > $this->saldo){
            echo "Saldo indispinível";
            return;
        }
            
        $this->sacar($valorATransferir);
     
        $contaDestino->depositar($valorATransferir);
        
    }

    // public function defineCpfTitular(string $cpf)
    // {
    //     $this->cpfTitular = $cpf;
    // }

    // public function defineNomeTitular(string $nome)
    // {
    //     $this->nomeTitular = $nome;
    // }

    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperarCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public function recuperarNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

    public function recuperaEndereco(): string
    {
        return $this->titular->recuperaEndereco();
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
}

