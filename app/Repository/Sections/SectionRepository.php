<?php 
namespace App\Repository\Sections;

use App\interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface{
    public function index()
    {
        $sections = Section::all();
       return view("Dashboard.sections.index",compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('add');
        return redirect()->route('admin.sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        return redirect()->route('admin.sections.index');
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        notify()->success('Laravel Notify is awesome!');

        return redirect()->route('admin.sections.index');
    }

    public function show($id)
    {
        $doctors =Section::findOrFail($id)->doctors;
        $section = Section::findOrFail($id);
        return view('Dashboard.Sections.show_doctors',compact('doctors','section'));
    }
    

}