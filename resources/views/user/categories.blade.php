@extends('layout.userstyle')

@section('section')
<style>
        img {
    
    border-radius: 12px;
      height:300px;
   }
   section{
       margin-top:50px;
       display: inline-block;
       
     
   
   }
   .card{
       width: 400px;
       height: 500px;
       margin-left: 40px;
       
   }
    h5{
        text-align: center;
        color: green;
    }
</style>
  
  @foreach ($categories as $category)



  <section>
  

    
    <div class="card">




<img src="{{ asset('uploads/' . $category->image) }}" alt="image">
<div class="card-body">
    <h2>{{ $category->name }}</h2>
   
    </div>
    </div>
            
     
</section>


@endforeach

@endsection