<?php

namespace App\Http\Controllers;

use App\Repository\AnimalRepos;
use App\Repository\CategoryRepos;
//use App\Repository\FoodRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalControllerWithRepos extends Controller
{
    public function index()
    {
        $animal = AnimalRepos::getAllAnimalsWithCategories();
        return view('Zoo.AnimalWithRepos.index',
            [
                'animal' => $animal,
            ]);
    }

    public function show($id)
    {
        $animal = AnimalRepos::getAnimalsById($id); //this is always an array of objects
        $categories = CategoryRepos::getCategoriesByAnimalId($id);
//        $foods = FoodRepos::getFoodsByAnimalId($id);

        return view('Zoo.AnimalWithRepos.show',
            [
                'animal' => $animal[0], //get the first element
                'categories' => $categories[0],
//                'foods' => $foods
            ]
        );
    }

    public function create()
    {

        $categories = CategoryRepos::getAllCategories();
//        $foods = FoodRepos::getAllFoods();
        return view(
            'Zoo.AnimalWithRepos.new',
            [
                "animal" => (object)[
                    'id' => '',
                    'name' => '',
                    'quantity' => 0,
                    'habitat' => '',
                    'description' => '',
                    'image' => '',
                    'categoriesId' => ''
                ],
                "categories" => $categories,
//                "selectedF" => [],
//                "foods" => $foods
            ]);

    }

    public function store(Request $request)
    {
//        dd($request->all());
        $this->formValidate($request)->validate(); //shortcut

        $animal = (object)[
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'habitat' => $request->input('habitat'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'categoriesId' => $request->input('categories')
        ];

        $newId = AnimalRepos::insert($animal);

        //many-to-many
//        $selectedF = $request->input('selectedF');
//        FoodRepos::insertAnimalFoodRelationship($newId, $selectedF);

        return redirect()
            ->action('AnimalControllerWithRepos@index')
//            ->with('msg', 'New Animal with id: ' . $newId . ' has been inserted');
        ->with('msg', 'New Animal has been inserted');

    }

    public function edit($id)
    {
        $animal = AnimalRepos::getAnimalsById($id); //this is always an array
        $categories = CategoryRepos::getAllCategories();

        //many-to-many
//        $foods = FoodRepos::getAllFoods();
//        $selectedF = FoodRepos::getFoodsByAnimalId($id);

//        dd($selectedF);

        return view(
            'Zoo.AnimalWithRepos.update',
            [
                "animal" => $animal[0],
                "categories" => $categories,
//                "foods" => $foods,
//                "selectedF" => $selectedF
            ]);
    }

    public function update(Request $request, $id)
    {
        if ($id != $request->input('id')) {
            //id in query string must match id in hidden input
            return redirect()->action('AnimalControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $animal = (object)[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'habitat' => $request->input('habitat'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'categoriesId' => $request->input('categories')
        ];
        AnimalRepos::update($animal);
//
//        $selectedF = $request->input('selectedF');
//        FoodRepos::deleteAnimalFoodRelationship($animal->id);
//        FoodRepos::insertAnimalFoodRelationship($animal->id, $selectedF);

        return redirect()->action('AnimalControllerWithRepos@index')
            ->with('msg', 'Update Successfully');;
    }

    public function confirm($id)
    {
        $animal = AnimalRepos::getAnimalsById($id); //this is always an array
        $categories = CategoryRepos::getCategoriesByAnimalId($id);
//        $foods = FoodRepos::getFoodsByAnimalId($id);
        return view('Zoo.AnimalWithRepos.confirm',
            [
                'animal' => $animal[0],
                'categories' => $categories[0],
//                'foods' => $foods
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('AnimalControllerWithRepos@index');
        }

//        FoodRepos::deleteAnimalFoodRelationship($id);
        AnimalRepos::delete($id);


        return redirect()->action('AnimalControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required', 'min:2', 'max: 255'],
                'quantity' => ['required', 'gt:10'],
                'description' => ['required', 'min:10', 'max: 2255'],
                'habitat' => ['required', 'min:5','max: 2255'],
                'categories' => ['gt:0'],
                'image' => ['required'],
//                'selectedF' => ['required'],
            ],
            [
                //change validation message
                //'name.starts_with' => 'Title must start with letter a',
                'name.required' => 'Please input Name of Animal',
                'name.min' => 'Name of Animal must more than 2 character',
                'name.max' => 'Name of Animal can not more than 255 character',
                'quantity.required' => 'Please input Quantity of Animal',
                'quantity.gt' => 'Quantity of Animal must be greater than 10 animals.',
                'description.required' => 'Please input Description of Animal',
                'description.min' => 'Description must more than 10 character of Animal',
                'description.max' => 'Habitat can not more than 2255 character of Animal',
                'habitat.required' => 'Please input Habitat of Animal',
                'habitat.min' => 'Habitat must more than 5 character of Animal',
                'habitat.max' => 'Habitat can not more than 2255 character of Animal',
                'image.required' => 'Please input Image of Animal',
                'categories.gt' => 'Please select a categories for new Animal',
//                'selectedF.required' => 'Please select at least one food for animal :3'
            ]
        );
    }
}


