<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name=" viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .erreur {
            color: #dc3545;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .succes {
            color: #28a745;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .alert-success {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 90%;
            max-width: 600px;
            text-align: center;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(11, 195, 60, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Inscription</h1>

        <form action="{{ route('inscription.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                @error('nom')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Ex: N°App, N°Etage, N°Batiment, Rue"required>
                @error('adresse')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="localisation" class="form-label">Localisation</label>
                <input type = "text" class="form-control" id="localisation" name="localisation" placeholder="Ex: Ville, Region, Code Postal" required>
    <!--
                ça de vait etre une liste deroulante mais ya beucoup de probleme << A regler>>
                    <option value="">NB: Ce Champ rencontre des probleme</option>
                    @if(isset($localisations))
                    @foreach($localisations as $localisation)
                        <option value="{{ $localisation->loc }}">{{ $localisation->loc }}</option>
                    @endforeach
                    @endif
         -->
               
                
                @error('localisation')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="checkbox" id="autreCheckbox" onclick="toggleAutreField()">
                <label for="autreCheckbox">Autre (cochez pour saisir une autre localisation)</label>
            </div>
            <div class="mb-3" id="autreField" style="display:none;">
                <label for="autre_localisation" class="form-label">Autre Localisation</label>
                <input type="text" class="form-control" id="autre_localisation" name="autre_localisation" placeholder="Ex: VIlle, Region, Code Postale">
                @error('autre_localisation')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="tel" name="tel" required>
                @error('tel')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type ="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="erreur">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>

        @if(session('success'))
            <div class="succes">{{ session('success') }}</div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleAutreField() {
            const autreField = document.getElementById('autreField');
            const autreCheckbox = document.getElementById('autreCheckbox');
            autreField.style.display = autreCheckbox.checked ? 'block' : 'none';
        }
    </script>
</body>

</html>