<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Support\Facades\Log;




class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
public function index(Request $request)
{
    $search = $request->query('search');
    $sort = $request->query('sort', 'code');

    if (! in_array($sort, ['code', 'units'])) {
        $sort = 'code';
    }

    $query = Subject::with('category');

    if ($search) {
        $query = $query->where('subject', 'like', "%{$search}%");
        $subjects = $query->paginate(3)->withQueryString();
    }

    $subjects = $query->paginate(3)->withQueryString();

    return view('subjects.index', compact('subjects', 'sort'));
}


    public function store(Request $request)
    {
            


        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'subject' => 'required|string|max:25',
            'units' => 'required|integer|min:1|max:12',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully.');
    }

    public function show(Subject $subject)
    {
     return view('subjects.show', compact('subject'));
    }
    
    public function edit(Subject $subject)
    {

        $categories = Category::all();
        return view('subjects.edit', compact('subject', 'categories'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'subject' => 'required|string|max:25',
            'units' => 'required|integer|min:1|max:12',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subject->update($validated);
        
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {

    abort_if($subject->category()->count() === 1    , 403);
    $subject->delete();
    return redirect()->route('subjects.index')->with('success', 'Subject has been deleted successfully.');
    }





}
