@extends('layouts.app',['title'=>'Registration Page'])

@section('content')
<div class="container">
    <form method="POST" class="registration-form" id="registration-form" action="{{route('store.user')}}">
        @csrf
        <h2>Register With Us!</h2>
        <div class="form-group-1">
            <input type="text" name="fname" id="fname" placeholder="Your First Name"  />
            <input type="text" name="lname" id="lname" placeholder="Your Last Name"  />
            <input type="email" name="email" id="email" placeholder="Email"  />
            <input type="number" name="phone_number" id="phone_number" placeholder="Phone number"  />
            <input type="text" name="age" id="age" placeholder="Your Age"  />
            <input type="password" name="password" id="password" placeholder="Your Password"  />
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  />
           
        </div>
        <div class="form-submit">
            <input type="submit" name="submit" id="submit_form" class="submit" value="Submit" />
        </div>
    </form>
</div>
@endsection