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

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stylists (stylist) VALUES ('{$this->getName()}') RETURNING id;");
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($results['id']);
        }

        function find($search_id)
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = {$search_id};");
            $found_stylist = null;
            foreach($rows as $row)
            {
                $id = $row['id'];
                $name = $row['stylist'];
                $new_stylist = new Stylist($name, $id);
            }

            return $new_stylist;
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists * WHERE id = {$this->getId()};");
        }

        function getClients()
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            $clients = array();

            foreach($rows as $row)
            {
                $id = $row['id'];
                $name = $row['client'];
                $stylist_id = $row['stylist_id'];
                $new_client = new Client($name, $stylist_id, $id);
                array_push($clients, $new_client);
            }

            return $clients;
        }

        static function getAll()
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM stylists;");

            //Create a new array to store all our new Stylists
            $stylists = array();
            //loop through each row and create the stylist object with that row's info
            foreach($rows as $row)
            {
                $id = $row['id'];
                $name = $row['stylist'];
                $new_stylist = new Stylist($name, $id);
                array_push($stylists, $new_stylist);
            }

            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists *;");
        }
    }

 ?>
