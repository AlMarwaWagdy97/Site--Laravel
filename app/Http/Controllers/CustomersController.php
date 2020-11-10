<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Customer;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerRegisterEvent;
use Illuminate\Support\Facades\Mail;
use Intervention\Image;

class CustomersController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    private function Validate_Req(){
        return request()->validate([
               'name' => 'required|min:3',
                'email'=> 'required|email',
                'active' => 'required',
                'company_id' => 'required',
                'image' => 'sometimes|file|image|max:5000',
            ]);
        
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);
        // if(request()->hasFile('image')){
        //     request()->validate([
        //         'image' => 'file|image|max:5000'
        //     ]);
        // }
        // return $data;
    }

    private function storeImage($customer){
        if(request()->has('image')){
            $customer->update([
                'image'=>request()->image->store('uploads', 'public'),
            ]);
            // dont work 
            // $image = Image::make(public_path('storage/' . $customer->image))->fit(300,300, null, 'top-left');
        }
    }

    public function index(){
        $activeCustomer = Customer::active()->get();
        $inactiveCustomer = Customer::inactive()->get();
        $companies = Company::all();
        $customers = Customer::all();
        return view('internal.customers.index',compact('activeCustomer' ,'inactiveCustomer', 'companies', 'customers'));
    }

    public function store(){
        $customer = Customer::create($this->Validate_Req());
        $this->storeImage($customer);
        event(new NewCustomerRegisterEvent($customer));
        return redirect('customers');     
    }

    public function create(){
        $companies= Company::all();
        $customer = new Customer();
        return view('internal.customers.create', compact('companies','customer'));
    }

    public function show(Customer $customer){
       //$customer = Customer::where('id', $customer)->firstorfail();
        return view('internal.customers.show', compact('customer'));
    }

    public function edit(Customer $customer){
        $companies = Company::all();
        return view('internal.customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer){
        $customer->update($this->Validate_Req());
         $this->storeImage($customer);
        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect('customers');
    }
}
