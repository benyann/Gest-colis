@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

@php
    // Ici, tu peux définir des variables de configuration pour activer ou désactiver des sections
    $showSalesRevenue = true;
    $showSalesCharts = true;
    $showRecentSales = true;
    $showWidgets = true;
@endphp

<!-- Sale & Revenue Start -->
@if($showSalesRevenue)
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Colis</p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Expedition</p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Agence</p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Chauffeur</p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
