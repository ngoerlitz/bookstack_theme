@php use Illuminate\Support\Facades\URL; @endphp
@extends('layouts.simple')

@section('content')

    <div class="container very-small">

        <div class="my-l">&nbsp;</div>

        <div class="card content-wrap auto-height">
            <h1 class="list-heading">{{ Str::title(trans('auth.log_in')) }}</h1>

            @include('auth.parts.login-message')

            <a id="login-button" class="button svg" href="{{URL::to("/vatger/oauth/login")}}">
                @icon('lock', ['class' => 'svg-icon'])
                {{trans('auth.log_in_with', ['socialDriver' => 'vatger Connect'])}}
            </a>

            <p class="text-secondary">
                Ich bin einverstanden damit, dass ich beim Erstellen von Inhalten in der
                VATSIM Germany Knowledgebase, VATSIM Germany ein nicht ausschließliches
                unentgeltliches, zeitlich, örtlich und inhaltlich unbeschränktes, übertragbares,
                unterlizenzierbares und unwiderrufliches Nutzungsrecht an den von mir erstellten
                Inhalten einräume. Ich garantiere, dass an den von mir erstellten Inhalten keine
                Rechte Dritter bestehen und durch die eingeräumten Nutzungsrechte keine Rechte
                Dritter verletzt werden.
            </p>
        </div>
    </div>

@stop
