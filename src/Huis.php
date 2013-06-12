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

    /** @OneToMany(targetEntity="Persoon",  mappedBy="id")@Column(type="integer",  nullable=false) **/
    protected $Persoon_id;

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
    public function getPersoon_id() {
        return $this->Persoon_id;
    }

    public function setPersoon_id($Persoon_id) {
        $this->Persoon_id = $Persoon_id;
    }


}

?>
