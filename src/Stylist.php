<?php

    class Stylist
    {
        private $id;
        private $name;

        function __construct($stylist, $id = null)
        {
            $this->name = $stylist;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }
    }

 ?>
