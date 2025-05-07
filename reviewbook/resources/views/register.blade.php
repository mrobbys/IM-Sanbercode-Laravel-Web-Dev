@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <form action="/welcome" method="POST">
        @csrf
        <!-- first name -->
        <label for="firstName">First name:</label><br /><br />
        <input type="text" name="firstName" id="firstName" /><br /><br />
        <!-- last name -->
        <label for="lastName">Last name:</label><br /><br>
        <input type="text" name="lastName" id="lastName" /><br /><br>
        <!-- gender -->
        <label>Gender:</label><br /><br>
        <!-- gender male -->
        <input type="radio" name="gender" id="genderMale" value="male" />
        <label for="genderMale">Male</label><br />
        <!-- gender female -->
        <input type="radio" name="gender" id="genderFemale" value="female" />
        <label for="genderFemale">Female</label><br />
        <!-- gender other -->
        <input type="radio" name="gender" id="genderOther" value="other" />
        <label for="genderOther">Other</label><br /><br>
        <!-- nationality -->
        <label for="nationality">Nationality:</label><br /><br>
        <select name="nationality" id="nationality">
            <option value="indonesia">Indonesia</option>
            <option value="malaysia">Malaysia</option>
            <option value="singapore">Singapore</option>
        </select><br><br>
        <!-- language -->
        <label for="language">Language Spoken:</label><br /><br>
        <input type="checkbox" name="bhsIndonesia" id="bhsIndonesia" />
        <label for="bhsIndonesia">Bahasa Indonesia</label><br />
        <input type="checkbox" name="bhsInggris" id="bhsInggris" />
        <label for="bhsInggris">English</label><br />
        <input type="checkbox" name="bhsOther" id="bhsOther" />
        <label for="bhsOther">Other</label><br /><br>
        <!-- bio -->
        <label for="bio">Bio:</label><br /><br>
        <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br />
        <!-- btn -->
        <button type="submit">Sign Up</button>
    </form>
@endsection
