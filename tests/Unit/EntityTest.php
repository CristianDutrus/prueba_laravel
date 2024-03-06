<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Entity;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EntityTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_entity()
    {
        $entity = Entity::factory()->create();
        $this->assertDatabaseHas('entities', $entity->toArray());
    }

    public function test_get_entity()
    {
        Entity::factory()->create();
        $response = $this->json('get', 'api/get-entities');
        $response->assertStatus(200);
    }
}
