<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Business;
use App\Models\City;
// use App\Models\Cidade;
use App\Models\Category;
use App\Models\District;
// use App\Models\Bairro;

use Illuminate\Support\Facades\Storage;

class AdminPropertiesController extends Controller
{
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
        $business = Business::all();
        $categories = Category::all();
        /**
         * Via API do IBGE
         */
        // $url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios";
        // $json = file_get_contents($url);
        // $cities = json_decode($json);

        /**
         * Via DB
         */
        //$cities = Cidade::all();
        $cities = City::all();

        return view('admin.properties_create', [
            'business' => $business,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }

    public function searchDistrict()
    {
        if (isset($_GET['city_id'])) {

            $filtro = $_GET['city_id'];

            if ($filtro) {

                /*https://stackoverflow.com/questions/18796221/creating-a-select-box-with-a-search-option*/
                /**
                 * Input list datalist
                  */
                //$subFiltro = explode(" - ", $filtro);

                /**
                 * Via API do IBGE
                 */
                // $url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios/".trim($subFiltro[0])."/distritos";
                // $json = file_get_contents($url);
                // $districts = json_decode($json);

                /**
                 * Via DB
                 */
                //$districts = Bairro::where('cidade_id', $filtro)->get();
                $districts = District::where('city_id', $filtro)->get();

                foreach ($districts as $key => $district) {
                    echo "<option value='$district->name'>$district->name</option> <br />";
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // upload de imagens
        if($request->hasFile('images')) {

            $allowedfileExtension= ['jpg', 'jpeg', 'gif', 'webp', 'png'];
            $files = $request->file('images');

            foreach($files as $file) {

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowedfileExtension);

                if($check) {

                    $ImagesToUpload = [];

                    foreach ($request->images as $image) {

                        // upload to storage/public
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
            'Lazer' => $request->lazer,
            'Instalações' => $request->instalacoes,
            'Diversas' => $request->diversas,
            'Gerais' => $request->gerais,
        ];

        if (isset($ImagesToUpload)) {
            $imagesJson = json_encode($ImagesToUpload);
        }else {
            $imagesJson = [];
        }

        Property::create([
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
            'images' =>  $imagesJson,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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
        $business = Business::all();
        $categories = Category::all();
        $cities = City::all();

        $property = Property::where('id', $id)->first();

        return view('admin.properties_edit', [
            'business' => $business,
            'cities' => $cities,
            'categories' => $categories,
            'property' => $property,
        ]);
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
        // upload de imagens
        if($request->hasFile('images')) {

            $allowedfileExtension= ['jpg', 'jpeg', 'gif', 'webp', 'png'];
            $files = $request->file('images');

            $this->removeStorageImages($id);

            foreach($files as $file) {

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowedfileExtension);

                if($check) {

                    $ImagesToUpload = [];

                    foreach ($request->images as $image) {

                        // upload to storage/public
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
            'Lazer' => $request->lazer,
            'Instalações' => $request->instalacoes,
            'Diversas' => $request->diversas,
            'Gerais' => $request->gerais,
        ];

        if (isset($ImagesToUpload)) {
            $imagesJson = json_encode($ImagesToUpload);
        }else {
            $imagesJson = [];
        }

        $propery_save = Property::where('id', '=', $id)
        ->update([
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
            'images' => $imagesJson,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($propery_save) {
            return redirect()->route('admin.properties')->with('success', 'Imovel Atualizado com sucesso');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->removeStorageImages($id);

        $propery_delete = Property::where('id', '=', $id)
        ->delete();

        return redirect()->route('admin.properties')->with('success', 'Imovel Removido com sucesso');
    }

    public function removeStorageImages($id)
    {
        $images = Property::where('id', '=', $id)->first('images');

        foreach (json_decode($images->images) as $key => $image) {
            Storage::delete('/public'.str_replace('storage', '',$image));
        }
    }
}
