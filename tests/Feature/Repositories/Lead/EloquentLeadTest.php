<?php

namespace Tests\Feature\Repositories\Lead;

use BoldLeads\Lead;
use BoldLeads\Repositories\Lead\EloquentLead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EloquentLeadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EloquentLead
     */
    protected $eloquentRepo;

    /**
     * Setup testing object
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->eloquentRepo = app(EloquentLead::class);
    }

    /**
     * Test paginate() function
     */
    public function test_paginate(): void
    {
        // Create 20 leads and paginate 5 per page
        $leads = factory(Lead::class)->times(20)->create();
        $leads = $leads->sortByDesc('id')->values();

        // Fetch results
        $results = $this->eloquentRepo->paginate(5)->toArray();

        // Check if paginate works properly
        $this->assertCount(5, $results['data']);

        // Check if the leads matches the results array
        $this->assertArraySubset($leads[0]->toArray(), $results['data'][0]);
        $this->assertArraySubset($leads[1]->toArray(), $results['data'][1]);
    }

    /**
     * Test find() function
     */
    public function test_find(): void
    {
        $lead = factory(Lead::class)->create();

        // Check for a valid lead
        $this->assertArraySubset(
            $lead->toArray(),
            $this->eloquentRepo->find($lead->id)->toArray()
        );

        // Check for a invalid lead
        $this->assertNull($this->eloquentRepo->find(1000));
    }

    /**
     * Test create() function
     */
    public function test_create(): void
    {
        $lead = factory(Lead::class)->make()->toArray();
        $this->eloquentRepo->create($lead);

        // Check if create() was successful
        $this->assertDatabaseHas('leads', $lead);
    }

    /**
     * Test update() function
     */
    public function test_update(): void
    {
        $lead = factory(Lead::class)->create();
        $newData = [
            'phone_number' => '1112223365'
        ];

        $this->eloquentRepo->update($lead->id, $newData);

        // Check if the lead phone number was updated
        $this->assertDatabaseHas('leads', $newData + ['id' => $lead->id]);
    }

    /**
     * Test delete() function
     */
    public function test_delete(): void
    {
        // Create -> insert lead into database
        $lead = factory(Lead::class)->create();

        // Delete from database
        $this->eloquentRepo->delete($lead->id);

        // Check if the lead is missing from the DB
        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }
}
