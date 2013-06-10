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

    /** @Column(type="datetime", nullable=false)* */
    protected $Loginnaam;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Naam;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Beschrijving;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Soort;

    /** @OneToMany(targetEntity="Persoon", mappedBy="id")@Column(type="integer",  nullable=false) */
    protected $Persoon_id;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLoginnaam() {
        return $this->Loginnaam;
    }

    public function setLoginnaam($Loginnaam) {
        $this->Loginnaam = $Loginnaam;
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


}

?>
