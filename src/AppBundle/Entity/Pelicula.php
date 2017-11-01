<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelicula
 *
 * @ORM\Table(name="pelicula")
 * @ORM\Entity
 */
class Pelicula
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
     * @var string
     *
     * @ORM\Column(name="resumen", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="url_trailer", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url_trailer;

    /**
     * @var \AppBundle\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pais", inversedBy="peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pelicula_pais_id", referencedColumnName="id")
     * })
     */
    private $pelicula_pais;

    /**
     * @var \AppBundle\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria", inversedBy="peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pelicula_categoria_id", referencedColumnName="id")
     * })
     */
    private $pelicula_categoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Idioma", inversedBy="peliculas")
     * @ORM\JoinTable(name="pelicula_idioma",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pelicula_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idioma_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $pelicula_idioma;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pelicula_idioma = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Pelicula
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
     * Set resumen
     *
     * @param string $resumen
     *
     * @return Pelicula
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set urlTrailer
     *
     * @param string $urlTrailer
     *
     * @return Pelicula
     */
    public function setUrlTrailer($urlTrailer)
    {
        $this->url_trailer = $urlTrailer;

        return $this;
    }

    /**
     * Get urlTrailer
     *
     * @return string
     */
    public function getUrlTrailer()
    {
        return $this->url_trailer;
    }

    /**
     * Set peliculaPais
     *
     * @param \AppBundle\Entity\Pais $peliculaPais
     *
     * @return Pelicula
     */
    public function setPeliculaPais(\AppBundle\Entity\Pais $peliculaPais = null)
    {
        $this->pelicula_pais = $peliculaPais;

        return $this;
    }

    /**
     * Get peliculaPais
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPeliculaPais()
    {
        return $this->pelicula_pais;
    }

    /**
     * Set peliculaCategoria
     *
     * @param \AppBundle\Entity\Categoria $peliculaCategoria
     *
     * @return Pelicula
     */
    public function setPeliculaCategoria(\AppBundle\Entity\Categoria $peliculaCategoria = null)
    {
        $this->pelicula_categoria = $peliculaCategoria;

        return $this;
    }

    /**
     * Get peliculaCategoria
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getPeliculaCategoria()
    {
        return $this->pelicula_categoria;
    }

    /**
     * Add peliculaIdioma
     *
     * @param \AppBundle\Entity\Idioma $peliculaIdioma
     *
     * @return Pelicula
     */
    public function addPeliculaIdioma(\AppBundle\Entity\Idioma $peliculaIdioma)
    {
        $this->pelicula_idioma[] = $peliculaIdioma;

        return $this;
    }

    /**
     * Remove peliculaIdioma
     *
     * @param \AppBundle\Entity\Idioma $peliculaIdioma
     */
    public function removePeliculaIdioma(\AppBundle\Entity\Idioma $peliculaIdioma)
    {
        $this->pelicula_idioma->removeElement($peliculaIdioma);
    }

    /**
     * Get peliculaIdioma
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeliculaIdioma()
    {
        return $this->pelicula_idioma;
    }
}

