<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiSeviceTest extends WebTestCase
{
    public function testSomething(): void
    {
       $client = static::createClient();
        $crawler = $client->request('GET', '/api');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('h1', 'Hello World');*/

      //  $client = static::createClient();
       // $this->execQuery($client, 'GET', null, '/api');
        $response = $client->getResponse();
        //dd( $response);
        $this->assertResponseStatusCodeSame(200);
    }
}
