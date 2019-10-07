<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function __construct()
    {
        // yang bisa di akses tanpa login adalah fungsi index dan show sisanya memakai token jwt
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    public function index()
    {
        return  QuestionResource::collection(Question::latest()->paginate(1));
    }

    public function store(Request $request)
    {
        // $request['slug'] = str_slug($request->title);
        $question = auth()->user()->question()->create($request->all());
        return response(new QuestionResource($question), Response::HTTP_CREATED);

    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Terubah', Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
