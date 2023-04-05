
<form action='validate_adminlogin' method='post'>
    @csrf
Email<input type='text' name='email'><br>
Password<input type='text' name='password'><br>

<input type='submit' name='Submit'>
</form>