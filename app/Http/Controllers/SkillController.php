<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;


class SkillController extends Controller
{
   public function index()
    {
        $skills = Skill::oldest()->get();
        return view('backend.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'icon'   => 'required',
            'color'  => 'required',
            'percent'=> 'required|integer|min:0|max:100',
        ]);

        $skill = Skill::create($request->all());

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Skill added successfully!',
                'skill'   => $skill   // ✅ ekhane data na, skill hobe
            ]);
        }

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill added successfully!');
    }

    

    public function edit(Skill $skill)
    {
        return view('backend.skills.edit', compact('skill'));
    }

    // public function update(Request $request, Skill $skill)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'percent' => 'required|integer|min:0|max:100',
    //     ]);

    //     $skill->update($request->all());

    //     return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    // }

    public function update(Request $request, Skill $skill)
{
    $request->validate([
        'name' => 'required',
        'percent' => 'required|integer|min:0|max:100',
    ]);

    $skill->update($request->all());

    // যদি AJAX রিকোয়েস্ট হয়
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Skill updated successfully.',
            'skill' => $skill
        ]);
    }

    return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
}



    public function destroy($id){
        $data = Skill::findorFail($id);
        $data->delete();
        return response()->json(['status'=>'success']);

    }
}
