<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SMiami\SiteBundle\Entity\Comentario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SMiami\SiteBundle\Entity\ComentarioRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Comentario
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $comentario
     *
     * @ORM\Column(name="comentario", type="text")
     */
    private $comentario;

    /**
     * @var Anuncio $autor
     *
     * @ORM\ManyToOne(targetEntity="Anuncio", inversedBy="comentarios")
     * @ORM\JoinColumn(name="anuncio_id", referencedColumnName="id")
     */
    private $anuncio;

    /**
     * @var Usuario $autor
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="comentarios")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $autor;

    /**
     * @var string $ip
     *
     * @ORM\Column(name="ip", type="string", length=16)
     */
    private $ip;

    /**
     * @var \DateTime $fecha
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;


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
     * Set comentario
     *
     * @param string $comentario
     * @return Comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Comentario
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Comentario
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set perfil
     *
     * @param SMiami\SiteBundle\Entity\Anuncio $anuncio
     * @return Comentario
     */
    public function setAnuncio(\SMiami\SiteBundle\Entity\Anuncio $anuncio = null)
    {
        $this->anuncio = $anuncio;
    
        return $this;
    }

    /**
     * Get anuncio
     *
     * @return SMiami\SiteBundle\Entity\Anuncio 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }

    /**
     * Set autor
     *
     * @param SMiami\SiteBundle\Entity\Usuario $autor
     * @return Comentario
     */
    public function setAutor(\SMiami\SiteBundle\Entity\Usuario $autor = null)
    {
        $this->autor = $autor;
    
        return $this;
    }

    /**
     * Get autor
     *
     * @return SMiami\SiteBundle\Entity\Usuario 
     */
    public function getAutor()
    {
        return $this->autor;
    }
    
    /**
     * @ORM\PrePersist()
     */
    public function fechaActual()
    {
        $this->fecha = new \DateTime();
    }
}