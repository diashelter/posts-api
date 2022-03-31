<?php

test('deve acessar a lista de posts', function (){
   $response = $this->getJson('/api/posts');
   $response->assertStatus(200);
});

test('deve retornar um error ao criar um post sem titulo', function (){
   $response = $this->postJson('/api/posts', [
      'body' => 'Novo corpo do post'
   ]);
   $response->assertStatus(422);
});

test('deve criar um novo post', function (){
    $response = $this->postJson('/api/posts', [
        'title' => 'Novo post',
        'slug' => 'novo-post',
        'body' => 'Novo corpo do post'
    ]);
    $response->assertStatus(201);
    $response->assertJson([
        'data' => [
            'id' => 1,
            'title' => 'Novo post',
            'slug' => 'novo-post',
            'body' => 'Novo corpo do post',
            'scheduled_at' => null
        ]
    ]);
});
