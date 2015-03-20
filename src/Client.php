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

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO clients (client, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function find($search_id)
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM clients WHERE id = {$search_id};");
            $found_client = null;
            foreach($rows as $row)
            {
                $id = $row['id'];
                $name = $row['client'];
                $stylist_id = $row['stylist_id'];
                $found_client = new Client($name, $stylist_id, $id);
            }
            return $found_client;
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET client = '{$new_name}' WHERE id = {$this->getId()}");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients * WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM clients;");
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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients *;");
        }
    }
?>
