@extends('layout.userstyle')

@section('section')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    .container {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 500px;

}

h3 {
    margin-top: 80px;
    color: #333;
    text-align: center;
}

h4 {
    margin-bottom: 10px;
}
button{
    margin-top: 50px;
    margin-left: 50%;
   
}
.center{
margin-left: 40%;
}

</style>

<h3>User Details</h3>


    <div class="container -ml-6">
        <div class="center">
        <div class="form-group w-50">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{ $profile->name }}" name="name" readonly>
        </div>
        <div class="form-group w-50">
            <label for="mobile" class="col-form-label">Mobile:</label>
            <input type="text" class="form-control" value="{{ $profile->mobile }}" name="mobile" readonly>
        </div>
        <div class="form-group w-50">
            <label for="email" class="col-form-label">Email ID:</label>
            <input type="email" class="form-control" value="{{ $profile->email }}" name="email" readonly>
        </div>
</div>
</div>
<button class="btn btn-primary" id="updateButton">Edit Profile</button>
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update User Details</h5>
            
            </div>
            <div class="modal-body">
                <!-- Add your update form here -->
                <form id="updateForm" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" value="{{ $profile->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-form-label">Mobile:</label>
                        <input type="text" class="form-control" value="{{ $profile->mobile }}" name="mobile">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email ID:</label>
                        <input type="email" class="form-control" value="{{ $profile->email }}" name="email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="updateForm" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#updateButton').click(function() {
            $('#updateModal').modal('show');
        });
    });
</script>






@endsection