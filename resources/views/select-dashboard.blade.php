@extends('layouts.app')
@section('title', 'Dokumen-Iatf')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            @if (Auth::check() && Auth::user()->hasRole('admin'))
                <!-- Tampilkan dashboard untuk admin -->
                <div class="col-md-6">
                    <div class="card" style="height: 400px">
                        <div class="card-body">
                            <h4 class="card-title">Dashboard Dokumen Rule (Admin)</h4>
                            <p class="card-text">Deskripsi singkat tentang dokumen rule untuk admin.</p>
                            <a href="{{ route('admin.dashboard.rule') }}" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 400px">
                        <div class="card-body">
                            <h4 class="card-title">Dashboard Dokumen Proses (Admin)</h4>
                            <p class="card-text">Deskripsi singkat tentang dokumen proses untuk admin.</p>
                            <a href="{{ route('admin.dashboard.proses') }}" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Tampilkan dashboard untuk guest -->
                <div class="col-md-6">
                    <div class="card" style="height: 400px">
                        <div class="card-body">
                            <h4 class="card-title">Dashboard Dokumen Rule (Guest)</h4>
                            <p class="card-text">Deskripsi singkat tentang dokumen rule untuk guest.</p>
                            <a href="{{ route('guest-dashboard-rule') }}" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 400px">
                        <div class="card-body">
                            <h4 class="card-title">Dashboard Dokumen Proses (Guest)</h4>
                            <p class="card-text">Deskripsi singkat tentang dokumen proses untuk guest.</p>
                            <a href="{{ 'guest-dashbioard-proses' }}" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
