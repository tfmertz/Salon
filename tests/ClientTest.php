<?php

    /**
        @backupGlobals disabled
        @backupStaticAttributes disabled
    */

    require_once 'src/Client.php';

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_getName()
        {
            //arrange
            $new_client = new Client("Bob");

            //act
            $result = $new_client->getName();

            //assert
            $this->assertEquals("Bob", $result);
        }

        function test_setName()
        {
            //arrange
            $new_client = new Client("Bob");

            //act
            $new_client->setName("Larry");
            $result = $new_client->getName();

            //assert
            $this->assertEquals("Larry", $result);
        }

        function test_getId()
        {
            //arrange
            $new_client = new Client("Bob", 0, 1);

            //act
            $result = $new_client->getId();

            //assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            //arrange
            $new_client = new Client("Bob", 0, 1);

            //act
            $new_client->setId(10);
            $result = $new_client->getId();

            //assert
            $this->assertEquals(10, $result);
        }

        function test_getStylistId()
        {
            //arrange
            $new_client = new Client("Bob", 2);

            //act
            $result = $new_client->getStylistId();

            //assert
            $this->assertEquals(2, $result);
        }

        function test_setStylistId()
        {
            //arrange
            $new_client = new Client("Bob", 2);

            //act
            $new_client->setStylistId(15);
            $result = $new_client->getStylistId();

            //assert
            $this->assertEquals(15, $result);
        }
    }




 ?>
