@component('mail::message')
# Whoops! 💢 There was an error.

@component('mail::panel')
    ## {{ class_basename($exception) }}
    {{ $exception->getMessage() }}

    {{ $exception->getFile() }}:{{ $exception->getLine() }}
@endcomponent

@if ($request)
    {{ $request->method() }} {{ $request->url() }}
    {{ $request->ip() }}
    {{ $request->userAgent() }}
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
