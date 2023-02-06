<x-app-layout>
    @section('title','Dashboard')
    @include('pages.admin.dashboard.welcome-banner')
    <div class="grid grid-cols-12 gap-6">
        @include('pages.admin.dashboard.stat-cards')
    </div>
</x-app-layout>