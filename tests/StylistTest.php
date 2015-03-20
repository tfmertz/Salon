<?php

    require_once 'src/Stylist.php';



    class StylistTest extends PHPUnit_Framework_TestCase
    {

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
