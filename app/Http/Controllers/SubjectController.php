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
        $query = Subject::with('category');

        $code = $request->query('code');
        $units = $request->query('units');
        $filter = $request->query('filter');

        if ($code) {
            $query = $query->where('code', $code);
        }

        if ($units && $units !== 'all') {
            $query = $query->where('units', $units);
        }

        if ($filter) {
            $query = $query->where('category_id', $filter);
        }

   

        $subjects = $query->paginate(3);

        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('subjects.create', compact('categories'));
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
