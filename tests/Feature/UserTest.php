<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_it_can_get_users_from_api_xml()
    {
        $response = $this->get('/api/users');
        $response->assertOk();
        $xml = new \DOMDocument('1.0','UTF-8');
        $xml->loadXML($response->getContent());
        $root = $xml->getElementsByTagName('Users')->item(0);
        self::assertNotNull($root);
        $users =  $root->getElementsByTagName('User');
        self::assertGreaterThan(0,$users->length);
        foreach($users as $user){
            $name = $user->getElementsByTagName('Name')->item(0)->nodeValue;
            self::assertNotNull($name);
            $email = $user->getElementsByTagName('Email')->item(0)->nodeValue;
            self::assertNotNull($email);
        }
    }
}
