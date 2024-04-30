@extends('layout')

@section('content')
    @include('partial._hero')  <!-- Assuming this part already follows the dark theme styling -->

    @include('partial._search') <!-- This should also follow the dark theme styling -->

    <!-- Grid container for listings with responsive settings and dark theme adjustments -->
    <div class="mx-4 lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 bg-deepBlack text-white">
        @foreach($listings as $listing)
            <!-- Dark themed listing cards with deeper grey background and subtle borders -->
            <x-listing-card :listing="$listing" class="bg-darkGrey border border-gray-600"/>
        @endforeach
    </div>

    <!-- Pagination with customized dark styling -->
    <div class="mt-6 px-4 flex justify-center items-center">
        {{$listings->links('vendor.pagination.tailwind-dark')}} <!-- Ensuring the pagination is styled for dark themes -->
    </div>
@endsection
