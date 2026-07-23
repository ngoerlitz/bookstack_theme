@extends('settings.layout')

@section('card')
    <h1 id="vatger" class="list-heading">vatger Settings</h1>
    <form action="{{ url("/settings/vatger") }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="section" value="vatger">

        <div class="setting-list">

            <div class="grid half gap-xl">
                <div>
                    <label for="setting-welcome-link" class="setting-list-label">Welcome Link</label>
                    <p class="small">
                        This is the link that the user is shown when first creating an account in the knowledgebase.
                        It should point to a place where they can find first steps (i.e. the basics of vatger / VATSIM).
                    </p>
                </div>
                <div class="pt-xs">
                    <input type="text" value="{{ setting('vatger-welcome-link', '#') }}" name="setting-vatger-welcome-link" id="setting-welcome-link">
                </div>
            </div>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="button">{{ trans('settings.settings_save') }}</button>
        </div>
    </form>
@endsection

@section('after-content')
    @include('entities.selector-popup')
@endsection
