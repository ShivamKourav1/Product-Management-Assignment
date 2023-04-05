<!DOCTYPE html>
<html lang="en">

<head>
<style>
table, td, th {
  border: 1px solid;
}
table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>

<body>
User: {{ Session::get('uname') }}

<p onclick='alert($session)'> View Cart in Session<p>
<h2>Products</h2>

<form action='cart_add' method='post' id='pform'>@csrf
<table>
<tr><th>#</th><th>Product Name</th><th>Price</th><th>quantity</th><th>Cart add</th><th>Cart remove</th><tr>
@php $i=1;@endphp
@foreach($data['products'] as $pd)

    <tr><td> @php echo $i++;@endphp   <input type='hidden' name='pid' value={{$pd['id']}}>
  </td><td>{{$pd['product_name']}}</td><td>{{$pd['price']}}</td>
    <td>Quantity<input name='quantity' type='text' value=0></td><td onclick='cart_add()'>

    Add to Cart</td>
    <td onclick='cart_remove()'>

    Remove from Cart</td>
    <tr>
@endforeach
</table>
</form>
<script>
function  cart_add()
  {
    document.getElementById('pform').action='cart_add';
    document.getElementById('pform').submit();
  }
  function cart_remove()
  {
    document.getElementById('pform').action='cart_remove';
    document.getElementById('pform').submit();
  }
  </script>
</body>

</html>