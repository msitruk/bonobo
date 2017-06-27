<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrivateSpaceControllerTest extends WebTestCase
{
    public function testPrivatespace()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/espace-client');
    }

}
