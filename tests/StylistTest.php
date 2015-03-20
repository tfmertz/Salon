<?php

    /**
        @backupGlobals disabled
        @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';
    require 'setup.config'; //in .gitignore needed for database user and password

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test', $DB_USER, $DB_PASS);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_save()
        {
            //arrange
            $new_stylist = new Stylist("Lauren", 1);

            //act
            $new_stylist->save();
            $results = Stylist::getAll();

            //assert
            $this->assertEquals($new_stylist, $results[0]);
        }

        function test_getName()
        {
            //arrange
            $new_stylist = new Stylist("Bob");

            //act
            $result = $new_stylist->getName();

            //assert
            $this->assertEquals("Bob", $result);
        }

        function test_setName()
        {
            //arrange
            $new_stylist = new Stylist("Bob");

            //act
            $new_stylist->setName("Larry");
            $result = $new_stylist->getName();

            //assert
            $this->assertEquals("Larry", $result);
        }

        function test_getId()
        {
            //arrange
            $new_stylist = new Stylist("Bob", 1);

            //act
            $result = $new_stylist->getId();

            //assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            //arrange
            $new_stylist = new Stylist("Bob", 1);

            //act
            $new_stylist->setId(10);
            $result = $new_stylist->getId();

            //assert
            $this->assertEquals(10, $result);
        }


    }



 ?>
