<?php

/**
 * Description of Taakpunt
 *
 * @author Yi Ling
 */
/** @Entity @Table(name="Taakpunt")* */
class Taakpunt {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string", nullable=false)* */
    protected $Begindatum;

    /** @Column(type="string", nullable=false)* */
    protected $Einddatum;

    /** @Column(type="string", length=150, nullable=true)* */
    protected $Beschrijving;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Taak;

        /** @Column(type="string", length=45, nullable=false)* */
    protected $Categorie;
    
    /** @Column(type="boolean", nullable=false)* */
    protected $Voltooiing;

    /** @ManyToOne(targetEntity="Persoon", inversedBy="id" ) @Column(type="integer",  nullable=false)**/
    protected $Persoon_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBegindatum() {
        return $this->Begindatum;
    }

    public function setBegindatum($Begindatum) {
        $this->Begindatum = $Begindatum;
    }

    public function getEinddatum() {
        return $this->Einddatum;
    }

    public function setEinddatum($Einddatum) {
        $this->Einddatum = $Einddatum;
    }

    public function getBeschrijving() {
        return $this->Beschrijving;
    }

    public function setBeschrijving($Beschrijving) {
        $this->Beschrijving = $Beschrijving;
    }

    public function getTaak() {
        return $this->Taak;
    }

    public function setTaak($Taak) {
        $this->Taak = $Taak;
    }

    public function getVoltooiing() {
        return $this->Voltooiing;
    }

    public function setVoltooiing($Voltooiing) {
        $this->Voltooiing = $Voltooiing;
    }

    public function getPersoon_id() {
        return $this->Persoon_id;
    }

    public function setPersoon_id($Persoon_id) {
        $this->Persoon_id = $Persoon_id;
    }

    public function getCategorie() {
        return $this->Categorie;
    }

    public function setCategorie($Categorie) {
        $this->Categorie = $Categorie;
    }


}

?>
