@extends('layouts.admin')

@section('title', 'Language Settings')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h1 class="mb-0 fs-3">Language Settings</h1>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $hasUntranslatedRecords = $stats->contains(fn (array $stat): bool => $stat['translated'] < $stat['total']);
                    $showTranslationWarning = ($geoEnabled || $current === 'en') && $hasUntranslatedRecords;
                @endphp

                @if ($showTranslationWarning)
                    <div class="alert alert-warning" role="alert">
                        Untranslated records will show Bengali text to English visitors and search engines.
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Visitor language behavior</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.settings.language.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <x-admin.form-fields.select name="geo_language_enabled" label="Country-Based Auto Language"
                                    :options="['1' => 'Enabled — Bangladesh sees Bangla; other countries see English', '0' => 'Disabled — use the default language below']"
                                    :value="$geoEnabled ? '1' : '0'" class="col-12" required />
                                <x-admin.form-fields.select name="default_locale" label="Default / Fallback Language"
                                    :options="['bn' => 'Bangla', 'en' => 'English']" :value="$current"
                                    class="col-md-6" required />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save Language Settings</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0">English translation progress</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Content type</th>
                                    <th>Translated / Total</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stats as $stat)
                                    @php
                                        $percentage = $stat['total'] === 0
                                            ? 100
                                            : (int) round(($stat['translated'] / $stat['total']) * 100);
                                    @endphp
                                    <tr>
                                        <td>{{ $stat['label'] }}</td>
                                        <td>{{ $stat['translated'] }} / {{ $stat['total'] }}</td>
                                        <td>{{ $percentage }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
