@component('mail::message')
# New Project: {{ $project->title }} 

{{ $project->description }}

@component('mail::button', ['url' => '/projects/'.$project->id])
See your project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
