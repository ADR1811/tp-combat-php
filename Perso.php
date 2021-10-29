<?php 
    class Perso
    {
        private int $id;
        private string $nomPersonnage;
        private string $classePersonnage;
        private int $pv;
        private int $def;
        private int $attaque;

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getNomPersonnage(): string
        {
            return $this->nomPersonnage;
        }

        /**
         * @param string $nomPersonnage
         */
        public function setNomPersonnage(string $nomPersonnage): void
        {
            $this->nomPersonnage = $nomPersonnage;
        }

        /**
         * @return string
         */
        public function getClassePersonnage(): string
        {
            return $this->classePersonnage;
        }

        /**
         * @param string $classePersonnage
         */
        public function setClassePersonnage(string $classePersonnage): void
        {
            $this->classePersonnage = $classePersonnage;
        }

        /**
         * @return int
         */
        public function getPv(): int
        {
            return $this->pv;
        }

        /**
         * @param int $pv
         */
        public function setPv(int $pv): void
        
            $this->pv = $pv;
        }

        /**
         * @return int
         */
        public function getDef(): int
        {
            return $this->def;
        }

        /**
         * @param int $def
         */
        public function setDef(int $def): void
        {
            $this->def = $def;
        }

        /**
         * @return int
         */
        public function getAttaque(): int
        {
            return $this->attaque;
        }

        /**
         * @param int $attaque
         */
        public function setAttaque(int $attaque): void
        {
            $this->attaque = $attaque;
        }

        /**
         * @return string
         */
        public function getEndormi(): string
        {
            return $this->endormi;
        }

        /**
         * @param string $endormi
         */
        public function setEndormi(string $endormi): void
        {
            $this->endormi = $endormi;
        }

        /**
         * @return string
         */
        public function getCooldown(): string
        {
            return $this->cooldown;
        }

        /**
         * @param string $cooldown
         */
        public function setCooldown(string $cooldown): void
        {
            $this->cooldown = $cooldown;
        }
        private string $endormi;
        private string $cooldown;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        private function hydrate(array $data)
        {
            foreach  ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (is_callable([$this, $method])) {
                    $this->$method($value);
                }
        }
        }
        
    }
