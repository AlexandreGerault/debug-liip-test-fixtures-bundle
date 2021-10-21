<?php

namespace App\Tests;

use App\Repository\PostRepository;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DummyFunctionalTest extends WebTestCase
{
    protected KernelBrowser $client;
    private AbstractDatabaseTool $databaseTool;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->databaseTool = $this->client->getContainer()->get(DatabaseToolCollection::class)->get();
    }

    public function testDummy(): void
    {
        $this->databaseTool->loadFixtures();

        $this->assertNotNull($this->client->getContainer()->get(PostRepository::class)->findAll());
    }
}
