<?php

/**
 *
 * @author Yi Ling
 */

/** @Entity @Table(name="Persoon")* */
class Persoon {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Loginnaam;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Wachtwoord;

    /** @Column(type="decimal", length=10, nullable=true)* */
    protected $Huurhoogte;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Naam;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Achternaam;

    /** @Column(type="string", length=45, nullable=true)* */
    protected $Functierol;

    /** @Column(type="string", length=45, nullable=false)* */
    protected $Geboortedatum;

    /** @Column(type="smallint", length=1, nullable=false)* */
    protected $Geslacht;

    /** @Column(type="string", length=45, nullable=true)* */
    protected $Studie;

    /** @Column(type="integer", length=5, nullable=true)* */
    protected $Studiejaar;

    /** @Column(type="string", length=45, nullable=true)* */
    protected $Bijbaan;

    /** @Column(type="string", length=125, nullable=true)* */
    protected $Eetgewoonte;

    /** @ManyToOne(targetEntity="Huis",  inversedBy="Bewoner")@Column(type="integer",  nullable=false) * */
    protected $Huis_Id;

    /** @ManyToOne(targetEntity="Transactie",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Transactie_Id;

    /** @ManyToOne(targetEntity="Taakpunt",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Taakpunt_id;

    /** @ManyToOne(targetEntity="Bericht",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Bericht_id;

    /** @ManyToOne(targetEntity="PersoonRoosterpunt",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $PersoonRoosterpunt_id;

    /** @ManyToOne(targetEntity="Kalenderpunt",  inversedBy="id")@Column(type="integer",  nullable=false) * */
    protected $Kalenderpunt_id;

    //getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNaam() {
        return $this->Naam;
    }

    public function setNaam($Naam) {
        $this->Naam = $Naam;
    }

    public function getAchternaam() {
        return $this->Achternaam;
    }

    public function setAchternaam($Achternaam) {
        $this->Achternaam = $Achternaam;
    }
    public function getHuurhoogte() {
        return $this->Huurhoogte;
    }

    public function setHuurhoogte($Huurhoogte) {
        $this->Huurhoogte = $Huurhoogte;
    }

    public function getFunctierol() {
        return $this->Functierol;
    }

    public function setFunctierol($Functierol) {
        $this->Functierol = $Functierol;
    }

        public function getGeboortedatum() {
        return $this->Geboortedatum;
    }

    public function setGeboortedatum($Geboortedatum) {
        $this->Geboortedatum = $Geboortedatum;
    }

    public function getGeslacht() {
        return $this->Geslacht;
    }

    public function setGeslacht($Geslacht) {
        $this->Geslacht = $Geslacht;
    }

    public function getStudie() {
        return $this->Studie;
    }

    public function setStudie($Studie) {
        $this->Studie = $Studie;
    }

    public function getStudiejaar() {
        return $this->Studiejaar;
    }

    public function setStudiejaar($Studiejaar) {
        $this->Studiejaar = $Studiejaar;
    }

    public function getBijbaan() {
        return $this->Bijbaan;
    }

    public function setBijbaan($Bijbaan) {
        $this->Bijbaan = $Bijbaan;
    }

    public function getEetgewoonte() {
        return $this->Eetgewoonte;
    }

    public function setEetgewoonte($Eetgewoonte) {
        $this->Eetgewoonte = $Eetgewoonte;
    }

    public function getLoginnaam() {
        return $this->Loginnaam;
    }

    public function setLoginnaam($Loginnaam) {
        $this->Loginnaam = $Loginnaam;
    }

    public function getWachtwoord() {
        return $this->Wachtwoord;
    }

    public function setWachtwoord($Wachtwoord) {
        $this->Wachtwoord = $Wachtwoord;
    }

    public function setHuis_Id($Huis_Id) {
        $Huis_Id->addBewoner($this);
        $this->Huis_Id = $Huis_Id;
    }

    public function getHuis_Id() {
        return $this->Huis_Id;
    }

}

?>
