<?php

namespace Tests\Feature;

use Czim\Repository\ExtendedRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $mockedClass = ExtendedRepository::class;

    public function testGetAllUsers()
    {
    }
}
