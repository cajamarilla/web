<?php

namespace Trabajo\bdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dte
 */
class Dte
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var date
     */
    private $fecha_vencimiento;

    /**
     * @var string
     */
    private $cliente;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Dte
     */
    public function settipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function gettipo()
    {
        return $this->tipo;
    }

    /**
     * Set fecha_vencimiento
     *
     * @param date $fecha_vencimiento
     * @return Dte
     */
    public function setfecha_vencimiento($fecha_vencimiento)
    {
        $this->fecha_vencimiento = $fecha_vencimiento;

        return $this;
    }

    /**
     * Get fecha_vencimiento
     *
     * @return date 
     */
    public function getfecha_vencimiento()
    {
        return $this->fecha_vencimiento;
    }
//
/**
     * Set cliente
     *
     * @param string $cliente
     * @return Dte
     */
    public function setcliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getcliente()
    {
        return $this->cliente;
    }
    
   
}