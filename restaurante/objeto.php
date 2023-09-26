<?php
/*class restaurante{
    tipo:caractere(string)
    delivery:boleano(true/false)
    nota:float(real)
    bairro:caractere(string)
    horario:numeral(inteiro)
}

spedini:new restaurante("italiana","true",0.0,"rebouças",18:30 - 23:00)
*/
class Restaurante {
    private $nota;
    private $horario;
    private $tipoComida;
    private $temRodizio;
    private $temDelivery;
    private $bairro;

    public function __construct($nota, $horario, $tipoComida, $temRodizio, $temDelivery, $bairro) {
        $this->nota = $nota;
        $this->horario = $horario;
        $this->tipoComida = $tipoComida;
        $this->temRodizio = $temRodizio;
        $this->temDelivery = $temDelivery;
        $this->bairro = $bairro;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getTipoComida() {
        return $this->tipoComida;
    }

    public function temRodizio() {
        return $this->temRodizio;
    }

    public function temDelivery() {
        return $this->temDelivery;
    }

    public function getBairro() {
        return $this->bairro;
    }
}

$restaurante1 = new Restaurante(4.5, "12:00 - 23:00", "Japonesa", true, true, "Ipanema");
echo "Nota: " . $restaurante1->getNota() . "<br>";
echo "Horário de Funcionamento: " . $restaurante1->getHorario() . "<br>";
echo "Tipo de Comida: " . $restaurante1->getTipoComida() . "<br>";
echo "Tem Rodízio? " . ($restaurante1->temRodizio() ? "Sim" : "Não") . "<br>";
echo "Tem Delivery? " . ($restaurante1->temDelivery() ? "Sim" : "Não") . "<br>";
echo "Bairro: " . $restaurante1->getBairro() . "<br>";
?>
