<?php

it('contains a list of available languages', function () {
    $response = $this->get('/')
        ->assertInertia(function(AssertableInertia $page){
            $page->has('languages') // Verify parent structure
                ->has('languages.data')
                ->where('languages.data.0.label','English')
                ->where('languages.data.0.value', 'en');
        });
});

it('handles invalid language requests gracefully', function () {
    $response = $this->get('/?lang=invalid')
        ->assertStatus(200)
        ->assertInertia(function(AssertableInertia $page){
            $page->where('languages.data.0.label','English') // Should fall back to default
                ->where('languages.data.0.value', 'en');
        });
});
