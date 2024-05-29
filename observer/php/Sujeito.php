<?php

namespace Observer\Php;

use SplObjectStorage;
use SplObserver;
use SplSubject;

/**
 * O Sujeito possui um estado importante e notifica os observadores quando o estado muda.
 */
class Sujeito implements SplSubject
{
    /**
     * @var int Para simplificar, o estado do Sujeito, essencial para todos os assinantes, é armazenado nesta variável.
     */
    public $estado;

    /**
     * @var SplObjectStorage Lista de assinantes. Na vida real, a lista de assinantes pode ser armazenada de maneira mais abrangente (categorizada por tipo de evento, etc.).
     */
    private $observadores;


    public function __construct()
    {
        $this->observadores = new SplObjectStorage();
    }

    
    /**
     * Métodos de gerenciamento de assinaturas.
     */
    public function attach(SplObserver $observer): void
    {
        echo "Sujeito: Anexou um observador.\n";
        $this->observadores->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observadores->detach($observer);
        echo "Sujeito: Desanexou um observador.\n";
    }

    /**
     * Dispara uma atualização em cada assinante.
     */
    public function notify(): void
    {
        echo "Sujeito: Notificando observadores...\n";
        foreach ($this->observadores as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Normalmente, a lógica de assinatura é apenas uma fração do que um Sujeito pode realmente fazer. 
     * Os Sujeitos geralmente possuem alguma lógica de negócios importante, que aciona um método de notificação 
     * sempre que algo importante está prestes a acontecer (ou depois disso).
     */
    public function algumaLogicaDeNegocio(): void
    {
        echo "\nSujeito: Estou fazendo algo importante.\n";
        $this->estado = rand(0, 10);

        echo "Sujeito: Meu estado acabou de mudar para: {$this->estado}\n";
        $this->notify();
    }
}
