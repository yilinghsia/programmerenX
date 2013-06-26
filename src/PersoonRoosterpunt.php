<?php

/**
 * Description of PersoonRoosterpunt
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="PersoonRoosterpunt")* */
class PersoonRoosterpunt {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string", nullable=false)* */
    protected $Datum;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Onderwerp;

    /** @Column(type="string", length=150, nullable=true)* */
    protected $Beschrijving;

    /** @Column(type="smallint", length=1, nullable=true)* */
    protected $Aanwezig;

    /** @OneToMany(targetEntity="Persoon", mappedBy="id") @Column(type="integer",  nullable=false)**/
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

    public function getOnderwerp() {
        return $this->Onderwerp;
    }

    public function setOnderwerp($Onderwerp) {
        $this->Onderwerp = $Onderwerp;
    }

    public function getBeschrijving() {
        return $this->Beschrijving;
    }

    public function setBeschrijving($Beschrijving) {
        $this->Beschrijving = $Beschrijving;
    }

    public function getAanwezig() {
        return $this->Aanwezig;
    }

    public function setAanwezig($Aanwezig) {
        $this->Aanwezig = $Aanwezig;
    }

    public function getPersoon_id() {
        return $this->Persoon_id;
    }

    public function setPersoon_id($Persoon_id) {
        $this->Persoon_id = $Persoon_id;
    }


}

?>
