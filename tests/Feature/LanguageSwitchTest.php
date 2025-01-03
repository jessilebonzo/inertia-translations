<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageSwitchTest extends TestCase
{
    public function test_sets_language_correctly(): void
    {
        $response = $this->get(route('language.switch', ['language' => 'de']));

        $response->assertSessionHas('locale', 'de')
            ->assertRedirect();
    }

    public function test_sets_english_language_correctly(): void
    {
        $response = $this->get(route('language.switch', ['language' => 'en']));

        $response->assertSessionHas('locale', 'en')
            ->assertRedirect();
    }
}
