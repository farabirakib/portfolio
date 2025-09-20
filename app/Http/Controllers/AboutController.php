<?php


namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // create er jonno
    public function create()
    {
        return view('backend.about.create');
    }

   // store method to save About info
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'cv_link' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = new About();
        $data->description = $request->description;

        // Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/profile_image'), $imageName);
            $data->image = 'assets/profile_image/' . $imageName;
            
        }

        // CV Upload
        if ($request->hasFile('cv_link')) {
            $cv = $request->file('cv_link');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('assets/CV_link'), $cvName);
            $data->cv_link = 'assets/CV_link/' . $cvName;
        }

        $data->save();

        return redirect()->route('admin.about.index')->with('success', 'About info saved successfully!');
    }


    // Index method to list all About entries
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.about.index', compact('abouts')); // ✅ Correct
     }
    
    // Edit method to show form for editing About info
     public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('backend.about.edit', compact('about'));
    }

    // Update method to modify existing About info
   public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'cv_link' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = About::findOrFail($id);
        $data->description = $request->description;

        // Image Upload
        if ($request->hasFile('image')) {
            // পুরানো ইমেজ ডিলিট করো
            if ($data->image && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/profile_image'), $imageName);
            $data->image = 'assets/profile_image/' . $imageName;
        }

        // CV Upload
        if ($request->hasFile('cv_link')) {
            // পুরানো CV ডিলিট করো
            if ($data->cv_link && file_exists(public_path($data->cv_link))) {
                unlink(public_path($data->cv_link));
            }

            $cv = $request->file('cv_link');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('assets/CV_link'), $cvName);
            $data->cv_link = 'assets/CV_link/' . $cvName;
        }

        $data->save();

        return redirect()->route('admin.about.index')->with('success', 'About info updated successfully!');
    }


    // Destroy method to delete About info
     public function destroy($id)
    {
        $data = About::findOrFail($id);
        $data->delete();
        return response()->json(['status' => 'success']);
    }


    // cv download er jonno
    public function downloadCV($id)
    {
        $about = About::findOrFail($id);

        if ($about->cv_link && file_exists(public_path($about->cv_link))) {
            $filePath = public_path($about->cv_link);
            $fileName = basename($filePath);
            return response()->download($filePath, $fileName);
        }

        return redirect()->back()->with('error', 'CV file not found.');
    }


}

