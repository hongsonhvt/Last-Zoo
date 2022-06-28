<?php

namespace App\Http\Controllers;

use App\Repository\CustomerRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerControllerWithRepos extends Controller
{
    public function homepage()
    {
//        $animal = Zoo::getAllAnimal();
        return view('Zoo.CustomerView.customerView');
//            [
//                'animal' => $animal,
//            ]);
    }
    public function signup()
    {
//        $animal = Zoo::getAllAnimal();
        return view('Zoo.CustomerView.customerSignUp');
//            [
//                'animal' => $animal,
//            ]);
    }

    public function index()
    {
        $customer = CustomerRepos::getAllCustomer();
        return view('Zoo.CustomerView.index',
            [
                'customer' => $customer,
            ]);
    }

    public function show($c_id)
    {

        $customer = CustomerRepos::getCustomerById($c_id); //this is always an array of objects
        return view('Zoo.CustomerView.showC',
            [
                'customer' => $customer[0] //get the first element
            ]
        );
    }

    public function create()
    {

        return view(
            'Zoo.CustomerView.newC',
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

    public function edit($c_id)
    {
        $customer = CustomerRepos::getCustomerById($c_id); //this is always an array


        return view(
            'Zoo.CustomerView.updateC',
            ["customer" => $customer[0]]);
    }

    public function update(Request $request, $c_id)
    {
        if ($c_id != $request->input('c_id')) {
            //id in query string must match id in hidden input
            return redirect()->action('CustomerControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $customer = (object)[
            'c_id' => $request->input('c_id'),
            'c_fullname' => $request->input('c_fullname'),
            'c_dob' => $request->input('c_dob'),
            'c_gender' => $request->input('c_gender'),
            'c_email' => $request->input('c_email'),
            'c_address' => $request->input('c_address'),
            'c_phone' => $request->input('c_phone'),
        ];
        CustomerRepos::update($customer);

        return redirect()->action('CustomerControllerWithRepos@index')
            ->with('msg', 'Update Customer Successfully');;
    }

    public function confirm($c_id){
        $customer = CustomerRepos::getCustomerById($c_id); //this is always an array

        return view('Zoo.CustomerView.confirm',
            [
                'customer' => $customer[0]
            ]
        );
    }

    public function destroy(Request $request, $c_id)
    {
        if ($request->input('c_id') != $c_id) {
            //id in query string must match id in hidden input
            return redirect()->action('CustomerControllerWithRepos@index');
        }

        CustomerRepos::delete($c_id);


        return redirect()->action('CustomerControllerWithRepos@index')
            ->with('msg', 'Delete Customer Successfully');
    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'c_fullname' => ['required', 'min:3', 'max: 255'],
                'c_dob' => ['required'],
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
