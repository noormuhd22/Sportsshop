@extends("layout.theme")
@section("post")


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<h3>Add Customer</h3>
<form id="create_customer" method="POST" action="{{ route('customer.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name','') }}" required> 
        <span class="text-danger name-error common-error">@error('name')
            {{ $message }}
        @enderror</span>      
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required> 
        <div class="text-danger">@error('email')
            {{ $message }}
        @enderror</div>  
    </div>
    <div class="mb-3">
      <label for="text" class="form-label">Phone</label>
      <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>  
      <div class="text-danger">@error('phone')
          {{ $message }}
      @enderror</div> 
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>   
    <div class="text-danger">@error('address')
        {{ $message }}
    @enderror</div>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection