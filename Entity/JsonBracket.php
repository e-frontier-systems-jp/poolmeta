<?php

namespace Customize\Entity;

use Customize\Repository\JsonBracketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Ketcau\Entity\AbstractEntity;

if (!class_exists(JsonBracket::class, false)) {

    #[Table(name: 'dtb_json_bracket')]
    #[InheritanceType('SINGLE_TABLE')]
    #[DiscriminatorColumn(name: 'discriminator_type', type: 'string', length: 255)]
    #[HasLifecycleCallbacks()]
    #[Entity(repositoryClass: JsonBracketRepository::class)]
    class JsonBracket extends AbstractEntity
    {
        #[Id, GeneratedValue(strategy: 'IDENTITY'), Column(type: 'integer', options: ['unsigned' => true])]
        private ?int $id = null;


        #[Column(type: "string", length: 255)]
        private string $key;


        #[OneToMany(mappedBy: "Bracket", targetEntity: "JsonKeyValue", cascade: ["persist"])]
        private Collection $KeyValues;


        #[OneToMany(mappedBy: "Parent", targetEntity: "JsonBracket", cascade: ["persist"])]
        private Collection $Brackets;


        #[ManyToOne(targetEntity: "JsonBracket", inversedBy: "Brackets")]
        private ?JsonBracket $Parent;


        public function __construct()
        {
            $this->KeyValues = new ArrayCollection();
            $this->Brackets = new ArrayCollection();
        }



        public function getId()
        {
            return $this->id;
        }


        public function getKey(): string
        {
            return $this->key;
        }

        public function setKey(string $key): self
        {
            $this->key = $key;
            return $this;
        }


        public function getParent(): ?JsonBracket
        {
            return $this->Parent;
        }

        public function setParent(JsonBracket $Parent): self
        {
            $this->Parent = $Parent;
            return $this;
        }


        public function addBracket(JsonBracket $Bracket): void
        {
            $this->Brackets->add($Bracket);
        }

        public function removeBracket(JsonBracket $Bracket): void
        {
            $this->Brackets->removeElement($Bracket);
        }

        public function getBrackets()
        {
            return $this->Brackets;
        }


        public function addKeyValue(JsonKeyValue $KeyValue): void
        {
            $this->KeyValues->add($KeyValue);
        }

        public function removeKeyValue(JsonKeyValue $KeyValue): void
        {
            $this->KeyValues->removeElement($KeyValue);
        }

        public function getKeyValues()
        {
            return $this->KeyValues;
        }
    }
}
