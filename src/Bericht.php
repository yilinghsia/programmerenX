<?php

/**
 * Description of Bericht
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="Bericht")* */
class Bericht {

    /** @Id @Column(type="integer") @GeneratedValue* */
    protected $id;

    /** @Column(type="datetime",nullable=false)* */
    protected $Datum;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Onderwerp;

    /** @Column(type="text", length=500, nullable=false)* */
    protected $Bericht;

    /** @ManyToOne(targetEntity="Persoon",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Verzender_id;

    /** @ManyToOne(targetEntity="Persoon",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Ontvanger_id;
    
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

    public function getBericht() {
        return $this->Bericht;
    }

    public function setBericht($Bericht) {
        $this->Bericht = $Bericht;
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
