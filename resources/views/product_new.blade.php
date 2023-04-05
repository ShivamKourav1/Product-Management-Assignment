@include('layouts/app')
<form action='product_add' method='post'>
    @csrf
Product Name<input type='text' name='product_name'><br>
Price<input type='text' name='price'><br>
Quantity<input type='text' name='quantity'><br>
<input type='submit' name='Save'>
</form>