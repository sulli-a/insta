@extends('layouts.appV1')

@section('content')
<div class="register">
  <form action='index.php?action=registerT' method='POST'>
    <input type='mail' name='mail' placeholder='e-mail'>
    <input type='text' name='login' placeholder='login'>
    <input type='password' name='pwd' placeholder='Mot de passe'>
    <input type='password' name='pwd1' placeholder='Confirmation du mot de passe'>

    <input type='submit' name='inscription' value="S'enregistrer">
  </form>
</div>

<div class="login">
  <span>Déjà inscrit ? <a href='index.php?action=login'>Connectez-vous</a></span>
</div>
@endsection('content')
