@if(auth()->check() && !auth()->user()->read_welcome)
<div id="main-content" class="tri-layout-middle-contents">
    <div class="callout info" style="width: auto">

        <p class="vg-nocolor">
            <strong>DE:</strong> Hallo {{auth()->user()->name}} und herzlich willkommen in der Wissensdatenbank von vatger.
            Hier findest Du alle Informationen, die Du rund um das Fliegen und Lotsen auf dem VATSIM-Netzwerk gebrauchen könntest.
            <i>Aller Anfang ist schwer</i>, weshalb wir Dir eine Liste an hilfreichen Materialien zusammengestellt haben, die den Einstieg
            erleichtern. Diese findest du <a href="{{setting('vatger-welcome-link', '#')}}" target="_blank">hier</a>.
        </p>

        <p class="vg-nocolor">
            <strong>EN:</strong> Hello {{auth()->user()->name}} and welcome to the vatger knowledge base.
            Here you will find all the information you may need about flying and controlling on the VATSIM network.
            <i>Getting started can be difficult</i>, so we have put together a list of helpful resources to make your introduction easier.
            You can find them <a href="{{setting('vatger-welcome-link', '#')}}" target="_blank">here</a>.
        </p>


        <form action="{{ url("/vatger/welcome") }}" method="POST">
            {{ csrf_field() }}

            <button class="button" type="submit">
                {{trans('welcome.mark_as_read')}}
            </button>
        </form>
    </div>
</div>
@endif