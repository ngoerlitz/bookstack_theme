<a href="{{ url('/') }}" data-shortcut="home_view" class="logo">
    @if(setting('app-logo', '') !== 'none')
        @if(setting()->getForCurrentUser('dark-mode-enabled'))
            <img class="logo-image" src="/theme/vatger/img/logo_light.png" alt="Logo">
        @else
            <img class="logo-image" src="/theme/vatger/img/logo_dark.png" alt="Logo">
        @endif
    @endif
    @if (setting('app-name-header'))
        <span class="logo-text">{{ setting('app-name') }}</span>
    @endif
</a>