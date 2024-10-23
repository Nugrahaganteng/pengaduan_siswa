<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('guru') }}
        </h2>
    </x-slot>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                  
                  
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">NO</th>
                            <th scope="col" class="px-4 py-3">pelapor</th>
                            <th scope="col" class="px-4 py-3">terlapor</th>
                            <th scope="col" class="px-4 py-3">kelas</th>
                            <th scope="col" class="px-4 py-3">laporan</th>
                            <th scope="col" class="px-4 py-3">bukti</th>
                            <th scope="col" class="px-4 py-3">status</th>
                            <th scope="col" class="px-4 py-3">aksi</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                                @forelse ($gurus as $data)
                                    <tr>
                                    <td>{{ $data->id }}</td>
                                        <td>{{ $data->pelapor }}</td>
                                        <td>{{ $data->terlapor }}</td>
                                        <td>{{ $data->kelas}}</td>
                                        <td>{{ $data->laporan}}</td>
                                        <td class="px-4 py-3">
                                        @if ($data->bukti)
                                            <img src="{{ Storage::url('bukti/'.$data->bukti) }}" alt=""
                                                class="w-16 h-16 object-cover">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                        <td>{{ $data->status }}</td>
                                        <td class="px-4 py-3">
                                            @if($data->status != 'Selesai')
                                                <form action="{{ route('siswa.complete', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button name="selesai">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                </table>
              
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>