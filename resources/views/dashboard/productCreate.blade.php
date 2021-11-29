@extends('dashboard.dashboard')
@section('page')

    <br>
    <center><h1>Product Create</h1></center>
    <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        @csrf
        <div class="container" style="background: #0C9A9A">
            <div class="row">
                <div class="col-sm-8">

                    <div class="form-group" >
                        <label for="">ENTER PRODUCT NAME:</label>
                        <input  required type="text" name="productname" namespace="Enter product name..." class="form-control">

                    </div>
                    <div class="form-group" >
                        <label for="">ENTER PRODUCT BRAND:</label>
                        <input  required type="text" name="productbrand" namespace="Enter product brand..." class="form-control">

                    </div>
                    <div class="form-group" >
                        <label for="">ENTER PRODUCT Quantity:</label>
                        <input  required type="number" name="productquantity" namespace="Enter product quantity..." class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">ENTER Gallery image:</label><br>
                        <input required type="file" name="productimage" placeholder="Please Select An Image">

                    </div>



                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </div></div>


    </form>



@endsection
