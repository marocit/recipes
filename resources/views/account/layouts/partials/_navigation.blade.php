<aside class="menu">
    <p class="menu-label">Rezepte</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('account.recipes.create.start') }}">Create</a>
        </li>
        <li>
            <a href="{{ route('account.recipes.index') }}">Alle</a>
        </li>
    </ul>

    <p class="menu-label">Anlässe</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('account.tag.create') }}">Anlegen</a>
        </li>
        <li>
            <a href="{{ route('account.tag.index') }}">Alle</a>
        </li>
    </ul>

     <p class="menu-label">Kategorien</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('account.category.create') }}">Anlegen</a>
        </li>
        <li>
            <a href="{{ route('account.category.index') }}">Alle</a>
        </li>
    </ul>
</aside>
