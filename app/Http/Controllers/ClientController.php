<?php

namespace App\Http\Controllers;

use App\Repository\AnimalRepos;
use App\Repository\CategoryRepos;
use App\Repository\CustomerRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $animal = AnimalRepos::getAllAnimalsWithCategories();
        return view('Zoo.ClientView.index',
            [
                'animal' => $animal,
            ]);
    }
    public function viewCategory()
    {
        $categories = CategoryRepos::getAllCategories();
        return view('Zoo.ClientView.viewCategory',
            [
                'categories' => $categories,
            ]);
    }
//    public function showByCategory($id)
//    {
//        $categories = CategoryRepos::getAllCategories();
//        $animals = AnimalRepos::getAllAnimals();
//        $animals_categories = CategoryRepos::getAllCategories($id);
//
//        return view('client.showBrand',
//            [
//                'categories' => $categories,
//                'animals' => $animals,
//                'animals_categories' => $animals_categories
//
//            ]
//        );
//    }

    public function show($id)
    {
        $animal = AnimalRepos::getAnimalsById($id); //this is always an array of objects
        $categories = CategoryRepos::getCategoriesByAnimalId($id);
//        $foods = FoodRepos::getFoodsByAnimalId($id);

        return view('Zoo.ClientView.show',
            [
                'animal' => $animal[0], //get the first element
                'categories' => $categories[0],
//                'foods' => $foods
            ]
        );
    }

    public function showC($id)
    {

        $categories = CategoryRepos::getCategoriesById($id); //this is always an array of objects
        return view('Zoo.ClientView.showcategorydetail',
            [
                'categories' => $categories[0] //get the first element
            ]
        );
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $animal = AnimalRepos::getAnimalsByQuery($query); //this is always an array of objects
//        $foods = FoodRepos::getFoodsByAnimalId($id);

        return view('Zoo.ClientView.index',
            [
                'animal' => $animal,
            ]);
    }

    public function create()
    {

        return view(
            'Zoo.ClientView.newC',
            ["customer" => (object)[
                'c_id' => '',
                'c_fullname' => '',
                'c_dob' => '',
                'c_gender' => '',
                'c_email' => '',
                'c_address' => '',
                'c_phone' => ''
            ]]);

    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $customer = (object)[
            'c_fullname' => $request->input('c_fullname'),
            'c_dob' => $request->input('c_dob'),
            'c_gender' => $request->input('c_gender'),
            'c_email' => $request->input('c_email'),
            'c_address' => $request->input('c_address'),
            'c_phone' => $request->input('c_phone'),
        ];

        $newc_Id = CustomerRepos::insert($customer);

        return redirect()
            ->action('ClientController@index')
//            ->with('msg', 'Sign up successfully: '.$newc_Id.' has been inserted');
            ->with('msg', 'You have successfully registered!');
    }
    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'c_fullname' => ['required', 'min:3', 'max: 255'],
                'c_dob' => ['required', 'after:1980-01-01', 'before:2019-01-01'],
                'c_gender' => ['required'],
                'c_email' => ['required', 'email'],
                'c_address' => ['required', 'min:7'],
                'c_phone' => ['required', 'starts_with:0', 'digits:10'],

            ],
            [
                //change validation message
                'c_fullname.required' => 'Please input fullname of Customer',
                'c_fullname.min' => 'Please input fullname more than 3 characterCustomer',
                'c_fullname.max' => 'Fullname can not more than 255 characterCustomer',
                'c_dob.required' => 'Please input date of birth of Customer',
                'c_dob.after' => 'Your Birth of Date must after 1980-01-01 >,< ',
                'c_dob.before' => 'Your Birth of Date must before 2019-01-01 >,< ',
                'c_gender.required' => 'Please input gender of Customer',
                'c_email.required' => 'Please input email  of Customer',
                'c_email.email' => 'Please input correct format email  of Customer',
                'c_address.required' => 'Please input address contact of Customer',
                'c_address.min' => 'Address contact of Customer must beyond more than 7 character',
                'c_phone.required' => 'Please input phone contact of Customer',
                'c_phone.starts_with' => 'Phone of Customer must be start with 0',
                'c_phone.digits' => 'Phone of Customer only have 10 digits',
            ]
        );
    }

}
