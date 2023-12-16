<?php

namespace Customize\Entity;

use Customize\Repository\PoolMetaExtendedRepository;
use Doctrine\ORM\Mapping as ORM;
use Ketcau\Entity\AbstractEntity;

if (!class_exists(PoolMetaExtended::class, false)) {

    #[ORM\Table(name: 'dtb_pool_meta_extended')]
    #[ORM\InheritanceType('SINGLE_TABLE')]
    #[ORM\DiscriminatorColumn(name: 'discriminator_type', type: 'string', length: 255)]
    #[ORM\HasLifecycleCallbacks()]
    #[ORM\Entity(repositoryClass: PoolMetaExtendedRepository::class)]
    class PoolMetaExtended extends AbstractEntity
    {
        #[ORM\Id]
        #[ORM\GeneratedValue(strategy: 'IDENTITY')]
        #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
        private $id;


        #[ORM\OneToOne(mappedBy: "bracket", inversedBy: "Parent", targetEntity: "JsonBracket")]
        private JsonBracket $Bracket;



        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         * @return PoolMetaExtended
         */
        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getBracket(): JsonBracket
        {
            return $this->Bracket;
        }

        public function setBracket(JsonBracket $Bracket): PoolMetaExtended
        {
            $this->Bracket = $Bracket;
            return $this;
        }
    }
}
