
@extends('dashboard.dashboard')

@section('page')

    @if(session()->has('successD'))

        <div class="alert alert-danger">
            {{ session()->get('successD') }}
        </div>
    @endif

    <br>
    <center><a href="{{route('product.create.view')}}"><button type="button"  class="btn btn-primary align-content-center" >
                CREATE PRODUCT
            </button></a></center><br>
    <table class="table table-bordered table-hover">

        <thead>

        <th scope="col">Product ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Brand</th>
        <th scope="col">Product Quantity</th>
        <th scope="col">Gallery images</th>
        <th scope="col">Upload Datetime</th>
        <th scope="col">ACTIONS</th>




        </thead>
        <tbody>

@foreach($product as $key=>$data)
    <tr>
    <th>{{$key+1}}</th>

    <td>{{$data->product_name}}</td>
    <td>{{$data->product_brand}}</td>
    <td>{{$data->product_quantity}}</td>
    <td>{{$data->product_image}}</td>
    <td>{{$data->created_at}}</td>
        <td>
        <a class="btn btn-info" href="{{route('product.edit',$data->product_id)}}">Edit</a>

        <a class="btn btn-danger" href="{{route('product.delete',$data->product_id)}}">Delete</a>
        </td>
    </tr>
@endforeach

        </tbody>
    </table><br>
    {{$product->links()}}

@endsection
