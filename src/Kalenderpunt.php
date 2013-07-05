<?php

/**
 * Description of Kalenderpunt
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="Kalenderpunt")* */
class Kalenderpunt {

    /** @Id @Column(type="integer") @GeneratedValue  * */
    protected $id;

    /** @Column(type="string", nullable=false)* */
    protected $Datum;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Naam;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Beschrijving;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Soort;

    /** @ManyToOne(targetEntity="Persoon", inversedBy="id")@Column(type="integer",  nullable=false) */
    protected $Persoon_id;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDatum() {
        return $this->Datum;
    }

    public function setDatum($Datum) {
        $this->Datum = $Datum;
    }

        public function getNaam() {
        return $this->Naam;
    }

    public function setNaam($Naam) {
        $this->Naam = $Naam;
    }

    public function getBeschrijving() {
        return $this->Beschrijving;
    }

    public function setBeschrijving($Beschrijving) {
        $this->Beschrijving = $Beschrijving;
    }

    public function getSoort() {
        return $this->Soort;
    }

    public function setSoort($Soort) {
        $this->Soort = $Soort;
    }
    public function getPersoon_id() {
        return $this->Persoon_id;
    }

    public function setPersoon_id($Persoon_id) {
        $this->Persoon_id = $Persoon_id;
    }



}

?>
