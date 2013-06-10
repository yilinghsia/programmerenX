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

    /** @OneToMany(targetEntity="Persoon",  mappedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Verzender_id;

    /** @OneToMany(targetEntity="Persoon",  mappedBy="id")@Column(type="integer",  nullable=false) * */
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


}

?>
