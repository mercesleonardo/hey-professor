<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    //Arrange
    //Criar algumas perguntas

    $user      = User::factory()->create();
    $questions = Question::factory()->count(5)->create();

    actingAs($user);

    //Act
    //Acessar a rota
    $response = get(route('dashboard'));

    //Assert
    //Verificar se a lista de perguntas está sendo mostrada

    /** @var Question $q */
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }
});
