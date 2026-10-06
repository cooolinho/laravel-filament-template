<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    public function test_login_page_is_reachable(): void
    {
        // Das Vite-Manifest existiert in der Testumgebung ohne Frontend-Build nicht.
        $this->withoutVite();

        $this->get('/admin/login')->assertOk();
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }
}
