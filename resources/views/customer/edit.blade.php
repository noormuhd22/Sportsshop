@extends("layout.theme")
@section('post')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            
<form id="edit_customer" method="POST" action="{{ route('customer.update', ['id' => $customer->id]) }}">
  <input type="hidden" value="{{ $customer->id }}" name="id">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="{{old('name',$customer->name) }}"id="name" name="name" > 
        <div class="text-danger">@error('name')
          {{ $message }}
        @enderror</div>      
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control"value="{{old('email',$customer->email) }}" id="email" name="email">   
       <div class="text-danger">@error('email')
         {{ $message }}
       @enderror</div>
      </div>
    <div class="mb-3">
      <label for="text" class="form-label">Phone</label>
      <input type="number" class="form-control" value="{{ old('phone',$customer->phone )}}" id="phone" name="phone">   
       <div class="text-danger">@error('post')
         {{ $message  }}
       @enderror</div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" value="{{ old('address',$customer->address) }}" id="address" name="address">   
        <div class="text-danger">@error('address')
          {{ $message }}
        @enderror</div>
      </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection