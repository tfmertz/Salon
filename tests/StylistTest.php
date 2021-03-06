<?php

    /**
        @backupGlobals disabled
        @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';
    require 'setup.config'; //in .gitignore needed for database user and password look at setup.config.example for more information

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test', $DB_USER, $DB_PASS);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_delete_subClients()
        {
            //arrange
            $new_stylist = new Stylist("Tammy");
            $new_stylist->save();
            $new_client = new Client("Rachel", $new_stylist->getId());
            $new_client2 = new Client("Mark", $new_stylist->getId());
            $new_client3 = new Client("Abe", 4);
            $new_client->save();
            $new_client2->save();
            $new_client3->save();


            //act
            $new_stylist->delete();
            $result = Client::getAll();

            //assert
            $this->assertEquals([$new_client3], $result);
        }

        function test_getClients()
        {
            //arrange
            $new_stylist = new Stylist("Tammy");
            $new_stylist->save();
            $new_client = new Client("Rachel", $new_stylist->getId());
            $new_client2 = new Client("Mark", $new_stylist->getId());
            $new_client3 = new Client("Abe", 4);
            $new_client->save();
            $new_client2->save();
            $new_client3->save();


            //act
            $result = $new_stylist->getClients();

            //assert
            $this->assertEquals([$new_client, $new_client2], $result);
        }

        function test_delete()
        {
            //arrange
            $new_stylist = new Stylist("Gregg");
            $new_stylist->save();

            //act
            $new_stylist->delete();
            $result = Stylist::getAll();

            //assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //arrange
            $new_stylist = new Stylist("Hairy");
            $new_stylist->save();

            //act
            $new_stylist->update("Harry");
            $result = Stylist::find($new_stylist->getId());

            //assert
            $this->assertEquals("Harry", $result->getName());

        }

        function test_find()
        {
            //arrange
            $new_stylist = new Stylist("Denny");
            $new_stylist->save();

            //act
            $id = $new_stylist->getId();
            $result = Stylist::find($id);

            //assert
            $this->assertEquals($new_stylist, $result);

        }

        function test_getAll()
        {
            //arrange
            $new_stylist = new Stylist("Karen");
            $new_stylist->save();
            $new_stylist2 = new Stylist("Mark");
            $new_stylist2->save();

            //act
            $result = Stylist::getAll();

            //assert
            $this->assertEquals([$new_stylist, $new_stylist2], $result);


        }

        function test_save()
        {
            //arrange
            $new_stylist = new Stylist("Lauren");

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
