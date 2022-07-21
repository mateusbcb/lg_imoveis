<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Property;

class IndexController extends Controller
{
    /**
     * *LOGIN / REGISTER
    */

    /**
     * Form Login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login.login');
    }

    /**
     * Logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect(route('page.index'))->with('success', 'Saiu com sucesso!');
    }

    /**
     * Form Register.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * *ADMIN
    */

    /**
     * Dashboard
    */
    public function  dashboard()
    {
        return view('admin.index');
    }

    /**
     * Properties
    */
    public function properties()
    {
        return view('admin.properties');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.properties_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('images')) {

            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('images');

            foreach($files as $file) {

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowedfileExtension);

                if($check) {

                    $ImagesToUpload = [];

                    foreach ($request->images as $image) {

                        $filename = $image->store('images', 'public');

                        array_push($ImagesToUpload, "storage/".$filename);

                    }

                    // echo "Upload Successfully";

                } else {

                    return redirect()->back()->with('error', 'Tipo de arquivo não suportado!')->withInput();
                }

            }
        }

        $installations = [
            'Lazer' => [
                $request->installations[0]
            ],
            'Instalações' => [
                $request->installations[1]
            ],
            'Diversas' => [
                $request->installations[2]
            ],
            'Gerais' => [
                $request->installations[3],
                $request->installations[4]
            ],
        ];

        $Property = [
            'name' => $request->name,
            'price' => $request->price,
            'condominium' => $request->condominium,
            'city_id' => $request->city_id,
            'category_id' => $request->category_id,
            'business_id' => $request->business_id,
            'area' => $request->area,
            'building_area' => $request->building_area,
            'district' => $request->district,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garages' => $request->garages,
            'details' => $request->details,
            'installations' => json_encode($installations),
            'images' => json_encode($ImagesToUpload),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Property::create($Property);

        return redirect()->route('admin.properties')->with('success', 'Imovel criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
