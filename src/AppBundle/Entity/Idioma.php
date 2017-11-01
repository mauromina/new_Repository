<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 *
 * @ORM\Table(name="idioma")
 * @ORM\Entity
 */
class Idioma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pelicula", mappedBy="idiomas")
     */
    private $idiomas_peliculas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idiomas_peliculas = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Idioma
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add idiomasPelicula
     *
     * @param \AppBundle\Entity\Pelicula $idiomasPelicula
     *
     * @return Idioma
     */
    public function addIdiomasPelicula(\AppBundle\Entity\Pelicula $idiomasPelicula)
    {
        $this->idiomas_peliculas[] = $idiomasPelicula;

        return $this;
    }

    /**
     * Remove idiomasPelicula
     *
     * @param \AppBundle\Entity\Pelicula $idiomasPelicula
     */
    public function removeIdiomasPelicula(\AppBundle\Entity\Pelicula $idiomasPelicula)
    {
        $this->idiomas_peliculas->removeElement($idiomasPelicula);
    }

    /**
     * Get idiomasPeliculas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdiomasPeliculas()
    {
        return $this->idiomas_peliculas;
    }
}

