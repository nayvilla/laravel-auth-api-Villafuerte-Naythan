<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3>Bienvenido, {{ Auth::user()->name }}!</h3>

                {{-- Mostrar la lista solo si es ADMIN --}}
                @isset($usuarios)
                    <h2 class="text-lg font-bold mt-6">Lista de Usuarios</h2>
                    <table class="w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $usuario->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $usuario->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $usuario->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    {{-- Mostrar contenido normal de Breeze para Guest --}}
                    <p>Bienvenido al sistema, disfruta de tu sesión.</p>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
