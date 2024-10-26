<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'judul' => 'Home Sliders',
            'DataHS' => HomeSlider::latest()->get(),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'New Home Slider',
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.home_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'Images'    => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'Title'     => 'required|max:255',
            'Desc'      => 'required|max:255',
        ]);

        //upload image
        $Images = $request->file('Images');
        $imageName = time().Str::random(17).'.'.$Images->getClientOriginalExtension();
        $Images->move('assets/public/img/HomeSlider', $imageName);

        //create
        HomeSlider::create([
            'id_home_sliders'       => 'HomeSliders'.Str::random(33),
            'image_home_sliders'    => $imageName,
            'title_home_sliders'    => $request->Title,
            'desc_home_sliders'     => $request->Desc,
            'visib_home_sliders'    => $request->visibility,
            'created_by'            => Auth::user()->email,
            'modified_by'           => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('home.add')->with(['success' => 'Home Slider has been Added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = [
            'judul' => 'Edit Home Slider',
            'EditHomeS' => HomeSlider::findOrFail($id),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.home_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'Images'    => 'image|mimes:jpeg,jpg,png|max:3072',
            'Title'     => 'required|max:255',
            'Desc'      => 'required|max:255',
        ]);

        //get by ID
        $homes = HomeSlider::findOrFail($id);

        //cek gambar di upload
        if ($request->hasFile('Images')) {
            $homes_path = 'assets/public/img/HomeSlider/' . $homes->image_home_sliders;
            if (file_exists($homes_path)) {
                unlink($homes_path);
            }
            //upload image
            $imghomes = $request->file('Images');
            $imghomesName = time().Str::random(17).'.'.$imghomes->getClientOriginalExtension();
            $imghomes->move('assets/public/img/HomeSlider', $imghomesName);

            //update
            $homes->update([
                'image_home_sliders'    => $imghomesName,
                'title_home_sliders'    => $request->Title,
                'desc_home_sliders'     => $request->Desc,
                'visib_home_sliders'    => $request->visibility,
                'modified_by'           => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('home.data')->with(['success' => 'Home Slider has been Updated!']);
        }else{
            //update
            $homes->update([
                'title_home_sliders'    => $request->Title,
                'desc_home_sliders'     => $request->Desc,
                'visib_home_sliders'    => $request->visibility,
                'modified_by'           => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('home.data')->with(['success' => 'Home Slider has been Updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $homes = HomeSlider::findOrFail($id);

        //delete image
        $homes_path = 'assets/public/img/HomeSlider/' . $homes->image_home_sliders;
        if (file_exists($homes_path)) {
            unlink($homes_path);
        }

        //delete
        $homes->delete();

        //redirect to index
        return redirect()->route('home.data')->with(['success' => 'Home Slider has been Deleted!']);
    }
}
