<div class="sidebar">
    <h3><a href="{{ route('AdminHome') }}">HOME</a></h3>

    <h3>Configuration</h3>
    <ul>
        <li>
            <a href="{{ route('localisations.index') }}">Gestion localisation</a>

        </li>
        <li>
            <a href="{{ route('betaAdmin') }}">Gestion des Clients</a>
        </li>
    </ul>
    <h3>HR</h3>
    <ul>
        <li>
        <a href="{{ route('betaAdmin') }}">Gestion de Staff</a>
        </li>
    </ul>
    <h3>HQ</h3>
    <ul>
        <li>
        <a href="{{ route('admin.index') }}">Gestion des Admin</a>
        </li>
    </ul>
</div>