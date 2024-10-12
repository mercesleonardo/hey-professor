<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question, Vote};
use Illuminate\Http\{RedirectResponse};

class LikeController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        Vote::query()->create([
            'user_id'     => auth()->id(),
            'question_id' => $question->id,
            'like'        => 1,
            'unlike'      => 0,
        ]);

        return back();
    }
}
