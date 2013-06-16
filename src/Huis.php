<?php

/**
 * Description of Huis
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="Huis") * */
class Huis {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Naam;

    /** @Column(type="string", length=150, nullable=false)* */
    protected $Adres;

    /** @Column(type="date",nullable=false)* */
    protected $Huurdatum;

    /** @OneToMany(targetEntity="Persoon",  mappedBy="Huis_Id")@Column(type="integer",  nullable=false) **/
    protected $Bewoner=null;

    //getters and setters
    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->Naam;
    }

    public function setNaam($Naam) {
        $this->Naam = $Naam;
    }

    public function getAdres() {
        return $this->Adres;
    }

    public function setAdres($Adres) {
        $this->Adres = $Adres;
    }

    public function getHuurdatum() {
        return $this->Huurdatum;
    }

    public function setHuurdatum($Huurdatum) {
        $this->Huurdatum = $Huurdatum;
    }
    public function addBewoner($bewoner) {
        $this->Bewoner = $bewoner;
    }
}

?>
