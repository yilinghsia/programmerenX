<?php

/**
 * Description of Transacties
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="Transactie")* */
class Transactie {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="decimal", nullable=false)* */
    protected $Bedrag;

    /** @Column(type="datetime", length=45, nullable=false)* */
    protected $Datum;

    /** @ManyToOne(targetEntity="Persoon", inversedBy="id")@Column(type="integer",  nullable=false) */
    protected $Verzender_id;
    
        /** @ManyToOne(targetEntity="Persoon", inversedBy="id")@Column(type="integer",  nullable=false) */
    protected $Ontvanger_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBedrag() {
        return $this->Bedrag;
    }

    public function setBedrag($Bedrag) {
        $this->Bedrag = $Bedrag;
    }

    public function getDatum() {
        return $this->Datum;
    }

    public function setDatum($Datum) {
        $this->Datum = $Datum;
    }
    public function getVerzender_id() {
        return $this->Verzender_id;
    }

    public function setVerzender_id($Verzender_id) {
        $this->Verzender_id = $Verzender_id;
    }

    public function getOntvanger_id() {
        return $this->Ontvanger_id;
    }

    public function setOntvanger_id($Ontvanger_id) {
        $this->Ontvanger_id = $Ontvanger_id;
    }



}

?>
