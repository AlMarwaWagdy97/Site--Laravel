<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" value="{{old('name')?? $customer->name }}">
    <div style="color: red;">{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" value="{{old('email') ?? $customer->email}}">
    <div style="color: red;">{{ $errors->first('email') }}</div>
</div>

<div class="form-group">
    <label for="active">Status:</label>
    <select id="active" name="active" class="form-control" >
        <option value="" disabled>Select Customer Status</option>
        @foreach($customer->ActiveOptions() as $activeKey=>$actveValue)
            <option value="{{$activeKey}}" {{$customer->active == $actveValue ?'selected':''}}>{{$actveValue}}</option>
        @endforeach
    </select>
    <div style="color: red;">{{ $errors->first('active') }}</div>
</div>

<div class="form-group">
    <label for="company_id">company:</label>
    <select id="company_id" name="company_id" class="form-control" >
        <option value="" disabled>Select Company ID</option>
        @foreach($companies as $company)
            <option value="{{$company->id}}" {{$company->id == $customer->company_id ?'selected':''}}>{{$company->name}}</option>
        @endforeach
    </select>
    <div style="color: red;">{{ $errors->first('company_id') }}</div>
</div>

<div class="form-group d-flex flex-column py-3">
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="py-2">
    <div style="color: red;">{{ $errors->first('image') }}</div>

</div>

@csrf
