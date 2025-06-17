<!DOCTYPE html>
<html lang="fr">
<body>
<div class="container">
    <h1>Nouveau message reçu depuis le site web</h1>
    <p>
        <strong>De :</strong> {{ $data['prenom'] }} {{ $data['nom'] }}<br>
        <strong>Email :</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a><br>
        @if(!empty($data['telephone']))
            <strong>Téléphone :</strong> {{ $data['telephone'] }}
        @endif
    </p>
    <hr>
    <h3>Message :</h3>
    <div class="message-block">
        {{ $data['message'] }}
    </div>
</div>
</body>
</html>
