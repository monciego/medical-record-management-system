<div class="h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg">
    <div class="z-[900]">
        <img class="h-32" src="{{ asset('images/logo.png') }}" alt="logo">
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg z-[900]">
        {{ $slot }}
    </div>
</div>

<style>
    .bg {
        background-image: url('{{ asset('images/login-background.jpg') }}');
        background-position: center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        /* Resize the background image to cover the entire container */
        position: relative;
    }

    .bg::before {
        content: "";
        position: absolute;
        background: #0000002b;
        top: 0%;
        bottom: 0%;
        right: 0%;
        left: 0%;
        z-index: 10;
    }
</style>