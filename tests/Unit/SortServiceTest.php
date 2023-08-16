<?php

namespace Tests\Unit;


use Mockery;
use App\Services\SortService;
use App\Repositories\SortRepository;
use App\Models\Sort;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SortServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @var SortRepository
     */
    protected $Sort_repository_mock;
    /**
     * @var PostService
     */
    protected $sort_service;

    /**
     * 在每個 test case 開始前執行.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->Sort_repository_mock = Mockery::mock(SortRepository::class);
        $this->sort_service = new SortService($this->Sort_repository_mock);
    }

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $sort = Sort::factory()->create();
        $fake_input = [
            'sort1' => 3,
            'sort2' => 4,
        ];
        $this->Sort_repository_mock
            ->shouldReceive('set')
            ->once()
            ->andReturn($sort);
        $actual_result = $this->sort_service->set($fake_input);
        $this->assertEquals($sort->sort1, $actual_result['sort1']);
        $this->assertEquals($sort->sort2, $actual_result['sort2']);
    }
}
