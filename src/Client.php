<?php

    class Client
    {
        private $name;
        private $id;
        private $stylist_id;

        function __construct($client, $stylist_id = 0, $id = null)
        {
            $this->name = $client;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }
    }



 ?>
