@props(['model'])

<span class="badge {{ $model->hasTranslation() ? 'text-bg-success' : 'text-bg-warning' }}">
    EN: {{ $model->hasTranslation() ? 'ready' : 'missing' }}
</span>
