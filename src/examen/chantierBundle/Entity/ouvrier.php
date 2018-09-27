<?php

namespace examen\chantierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ouvrier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="examen\chantierBundle\Entity\ouvrierRepository")
 */
class ouvrier
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var float
     *
     * @ORM\Column(name="prixjour", type="float")
     */
    private $prixjour;
    
     /**
     * @ORM\ManyToOne(targetEntity="chantier", cascade={"persist", "remove"})
     *
     * @ORM\JoinColumn(name="chantier_id", referencedColumnName="id")
     */
    private $chantier;


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
     * Set nom
     *
     * @param string $nom
     * @return ouvrier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return ouvrier
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set prixjour
     *
     * @param float $prixjour
     * @return ouvrier
     */
    public function setPrixjour($prixjour)
    {
        $this->prixjour = $prixjour;

        return $this;
    }

    /**
     * Get prixjour
     *
     * @return float 
     */
    public function getPrixjour()
    {
        return $this->prixjour;
    }
    
        /**
     * Set chantier
     *
     * @param integer $chantier
     * @return ouvrier
     */
    public function setChantier($chantier)
    {
        $this->chantier = $chantier;

        return $this;
    }

    /**
     * Get chantier
     *
     * @return integer 
     */
    public function getChantier()
    {
        return $this->chantier;
    }
    
}
