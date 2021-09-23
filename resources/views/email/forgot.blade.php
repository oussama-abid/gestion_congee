<h1>hello {{ $user->name }}</h1>
<p>
    Please click the password reset button to reset password
    <a href="{{ url('reset_password/'.$user->email.'/'.$code) }}"> Resset password </a>
</p>