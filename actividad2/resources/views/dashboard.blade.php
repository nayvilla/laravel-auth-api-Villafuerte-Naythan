<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-center items-center h-screen">
                <h2 class="text-lg font-bold text-center">Bienvenido, {{ Auth::user()->name }}!</h2>
            </div>

                {{-- Mostrar la lista solo si es ADMIN --}}
                @isset($usuarios)
                    <h3 class="text-lg font-bold mt-6">Gestión de Usuarios</h3>

                    <div class="mb-9 mt-6">
                        <a href="{{ route('users.index') }}" style="background-color: blue; color: white; padding: 10px; border-radius: 5px;">
                            Ver Lista de Usuarios →
                        </a>
                    </div>
                @else
                    {{-- Mostrar contenido normal de Breeze para Guest --}}
                    <p>Bienvenido al sistema, disfruta de tu sesión.</p>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
