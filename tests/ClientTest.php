<?php

    /**
        @backupGlobals disabled
        @backupStaticAttributes disabled
    */

    require_once 'src/Client.php';

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Client::deleteAll();
        }

        function test_update()
        {
            //arrange
            $new_client = new Client("Gregg", 1);
            $new_client->save();

            //act
            $new_client->update("Greg");
            $result = Client::find($new_client->getId());

            //assert
            $this->assertEquals("Greg", $result->getName());
        }

        function test_find()
        {
            //arrange
            $new_client = new Client("Samantha", 0);
            $new_client->save();

            //act
            $result = Client::find($new_client->getId());

            //assert
            $this->assertEquals($new_client, $result);
        }

        function test_deleteAll()
        {
            //arrange
            $new_client = new Client("Johnny", 0);
            $new_client->save();

            //act
            Client::deleteAll();
            $result = Client::getAll();

            //assert
            $this->assertEquals([], $result);
        }

        function test_getAll()
        {
            //arrange
            $new_client = new Client("Bob", 0);
            $new_client->save();
            $new_client2 = new Client("Larry", 0);
            $new_client2->save();

            //act
            $result = Client::getAll();

            //assert
            $this->assertEquals([$new_client, $new_client2], $result);
        }

        function test_save()
        {
            //arrange
            $new_client = new Client("Joe", 0);

            //act
            $new_client->save();
            $result = Client::getAll();

            //assert
            $this->assertEquals($new_client, $result[0]);
        }
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
