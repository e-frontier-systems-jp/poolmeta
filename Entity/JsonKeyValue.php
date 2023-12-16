<?php

namespace Customize\Entity;

use Customize\Repository\JsonKeyValueRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Ketcau\Entity\AbstractEntity;

if (!class_exists(JsonKeyValue::class, false)) {

    #[ORM\Table(name: 'dtb_json_key_value')]
    #[ORM\InheritanceType('SINGLE_TABLE')]
    #[ORM\DiscriminatorColumn(name: 'discriminator_type', type: 'string', length: 255)]
    #[ORM\HasLifecycleCallbacks()]
    #[ORM\Entity(repositoryClass: JsonKeyValueRepository::class)]
    class JsonKeyValue extends AbstractEntity
    {
        #[Id, GeneratedValue(strategy: 'IDENTITY'), Column(type: 'integer', options: ['unsigned' => true])]
        private ?int $id;


        #[Column(type: "string", length: 255)]
        private string $key;


        #[Column(type: "string", length: 255)]
        private string $value;


        #[ORM\ManyToOne(targetEntity: "JsonBracket", inversedBy: "KeyValues")]
        private JsonBracket $Bracket;



        public function getId(): ?int
        {
            return $this->id;
        }

        public function setId(?int $id): JsonKeyValue
        {
            $this->id = $id;
            return $this;
        }

        public function getKey(): string
        {
            return $this->key;
        }

        public function setKey(string $key): JsonKeyValue
        {
            $this->key = $key;
            return $this;
        }

        public function getValue(): string
        {
            return $this->value;
        }

        public function setValue(string $value): JsonKeyValue
        {
            $this->value = $value;
            return $this;
        }

        public function getBracket(): JsonBracket
        {
            return $this->Bracket;
        }

        public function setBracket(JsonBracket $Bracket): JsonKeyValue
        {
            $this->Bracket = $Bracket;
            return $this;
        }
    }
}
