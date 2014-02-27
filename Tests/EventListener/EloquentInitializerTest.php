<?php

namespace WouterJ\EloquentBundle\Tests\EventListener;

use Prophecy\Argument;
use WouterJ\EloquentBundle\Tests\ProphecyTestCase;
use WouterJ\EloquentBundle\EventListener\EloquentInitializer;

class EloquentInitializerTest extends ProphecyTestCase
{
    protected $capsule;
    protected $subject;

    public function setUp()
    {
        parent::setUp();

        $this->capsule = $this->prophet->prophesize('Illuminate\Database\Capsule\Manager');
        $this->subject = new EloquentInitializer($this->capsule->reveal());
    }

    /** @test */
    public function it_registers_the_loader()
    {
        $this->capsule->bootEloquent()->shouldBeCalled();

        $this->subject->initialize();
    }
}