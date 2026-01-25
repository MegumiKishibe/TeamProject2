<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        // 2. 200 (成功) ではなく、302 (リダイレクト) を期待するように変更
        $response->assertStatus(302);

        // 3. さらに「ログイン画面に飛ばされたか」まで確認すると完璧！
        $response->assertRedirect('/login');
    }
}
