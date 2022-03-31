<?php

test('deve retornar lista de posts para agendar que não foram agendados', function () {
    $post = \App\Models\Post::factory()->create();
    $response = $this->getJson('/api/schedule/posts');
    $response->assertStatus(200);
});

test('deve agendar um post', function () {
    $post = \App\Models\Post::factory()->create();
    $response = $this->putJson('/api/schedule/posts', [
        'id' => $post->id
    ]);
    $response->assertStatus(200);
});
