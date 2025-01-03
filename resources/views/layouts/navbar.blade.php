<div class="navbar">
    <div><span class="EZY">EZY</span><span class="Bank">BANK</span></div>
    <div>
        <span id="heure"></span>
        <span style="margin-left: 1rem;">&#128276;</span> <!-- Icône de notification -->
        <span style="margin-left: 1rem;">&#9881;</span> <!-- Icône de paramètres -->
    </div>
</div>
<style>
    .EZY{
        font-size: 1.5rem;
        color: blue;
    }
    .Bank{
        font-size: 1.5rem;
        color: green;
    }

</style>
<script>
    // Afficher l'heure en temps réel
    function afficherHeure() {
        const heureElement = document.getElementById('heure');
        const maintenant = new Date();
        const heures = maintenant.getHours().toString().padStart(2, '0');
        const minutes = maintenant.getMinutes().toString().padStart(2, '0');
        const secondes = maintenant.getSeconds().toString().padStart(2, '0');
        heureElement.textContent = `${heures}:${minutes}:${secondes}`;
    }

    setInterval(afficherHeure, 1000); // Mettre à jour l'heure chaque seconde
    afficherHeure(); // Afficher l'heure immédiatement
</script>