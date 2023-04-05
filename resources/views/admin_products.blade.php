@include('layouts/app')
@section('title')
Products
@endsection

@section('content')
<h2>Admin Dashboard</h2>
@endsection
<h2>Products</h2>

<style>
table, td, th {
  border: 1px solid;
}
table {
  width: 100%;
  border-collapse: collapse;
}
</style>
<table>
<tr><th></th><th>Product Name</th><th>Price</th><th>Edit</th><th>Delete</th><tr>

@foreach($data['products'] as $pd)

    <tr><td></td><td>{{$pd['product_name']}}</td><td>{{$pd['price']}}</td><td>Edit</td><td>Delete</td><tr>
@endforeach
</table>