<?php

namespace DoctrineProxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PersoonRoosterpunt extends \PersoonRoosterpunt implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getDatum()
    {
        $this->__load();
        return parent::getDatum();
    }

    public function setDatum($Datum)
    {
        $this->__load();
        return parent::setDatum($Datum);
    }

    public function getOnderwerp()
    {
        $this->__load();
        return parent::getOnderwerp();
    }

    public function setOnderwerp($Onderwerp)
    {
        $this->__load();
        return parent::setOnderwerp($Onderwerp);
    }

    public function getBeschrijving()
    {
        $this->__load();
        return parent::getBeschrijving();
    }

    public function setBeschrijving($Beschrijving)
    {
        $this->__load();
        return parent::setBeschrijving($Beschrijving);
    }

    public function getAanwezig()
    {
        $this->__load();
        return parent::getAanwezig();
    }

    public function setAanwezig($Aanwezig)
    {
        $this->__load();
        return parent::setAanwezig($Aanwezig);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'Datum', 'Onderwerp', 'Beschrijving', 'Aanwezig', 'Persoon_id');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}