<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\ApiService;

class ApiServiceTest extends TestCase
{

    public function test_api_request_is_successful()
    {
        // サービスを呼び出す
        $apiService = new ApiService;

        $result = $apiService->fetchData(1);

        // 期待される結果をアサート
        $this->assertNotNull($result);
        $this->assertArrayHasKey('game_indices', $result);
    }
}
