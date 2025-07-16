@extends('layouts.master')

@section('title', 'Register')

@section('content')
<div class="container py-5">
  <h1>Buat Account Baru!</h1>
  <h2>Sign Up Form</h2>

  <form action="{{ url('/welcome') }}" method="get">
    <h4>First name:</h4>
    <input type="text" name="first_name" style="text-transform: uppercase;" required>

    <h4>Last name:</h4>
    <input type="text" name="last_name" style="text-transform: uppercase;" required>

    <h4>Gender:</h4>
    <input type="radio" name="gender" value="Male" id="male">
    <label for="male">Male</label><br>

    <input type="radio" name="gender" value="Female" id="female">
    <label for="female">Female</label><br>

    <h4>Nationality:</h4>
    <select name="nationality">
      <option value="Indonesian" selected>Indonesian</option>
      <option value="Singaporean">Singaporean</option>
      <option value="Malaysian">Malaysian</option>
      <option value="Australian">Australian</option>
      <option value="Other">Other</option>
    </select>

    <h4>Language Spoken:</h4>
    <input type="checkbox" name="language[]" value="Bahasa Indonesia" id="lang-id">
    <label for="lang-id">Bahasa Indonesia</label><br>

    <input type="checkbox" name="language[]" value="English" id="lang-en">
    <label for="lang-en">English</label><br>

    <input type="checkbox" name="language[]" value="Other" id="lang-other">
    <label for="lang-other">Other</label>

    <h4>Bio:</h4>
    <textarea></textarea>

    <br><br>
    <button type="submit">Sign Up</button>
  </form>
</div>
@endsection
