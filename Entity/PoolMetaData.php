<?php

namespace Customize\Entity;

use Customize\Repository\PoolMetaDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Ketcau\Entity\AbstractEntity;

if (!class_exists(PoolMetaData::class, false)) {

    #[ORM\Table(name: 'dtb_pool_meta_data')]
    #[ORM\InheritanceType('SINGLE_TABLE')]
    #[ORM\DiscriminatorColumn(name: 'discriminator_type', type: 'string', length: 255)]
    #[ORM\HasLifecycleCallbacks()]
    #[ORM\Entity(repositoryClass: PoolMetaDataRepository::class)]
    class PoolMetaData extends AbstractEntity
    {
        #[ORM\Id]
        #[ORM\GeneratedValue(strategy: 'IDENTITY')]
        #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
        private $id;


        #[ORM\Column(type: 'string', length: 255, nullable: false)]
        private $name;



        #[ORM\Column(type: 'string', length: 255, nullable: false)]
        private $description;


        #[ORM\Column(type: 'string', length: 10, nullable: false)]
        private $ticker;


        #[ORM\Column(type: 'string', length: 255, nullable: false)]
        private $homepage;


        #[ORM\OneToOne(targetEntity: PoolMetaExtended::class)]
        #[ORM\JoinColumn(name: 'extended_id', referencedColumnName: 'id', nullable: true)]
        private $Extended;




        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         * @return PoolMetaData
         */
        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         * @return PoolMetaData
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         * @return PoolMetaData
         */
        public function setDescription($description)
        {
            $this->description = $description;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getTicker()
        {
            return $this->ticker;
        }

        /**
         * @param mixed $ticker
         * @return PoolMetaData
         */
        public function setTicker($ticker)
        {
            $this->ticker = $ticker;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getHomepage()
        {
            return $this->homepage;
        }

        /**
         * @param mixed $homepage
         * @return PoolMetaData
         */
        public function setHomepage($homepage)
        {
            $this->homepage = $homepage;
            return $this;
        }
    }
}
