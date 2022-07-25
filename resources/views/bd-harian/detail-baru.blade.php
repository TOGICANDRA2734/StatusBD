@extends('layout.app', ['title' => 'Homepage | PT RCI | PMA 2023'])

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">            
            {{$nom_unit[0]->nom_unit}} BARU
        </h2>

        <!-- Data baru -->


        <!-- Data Utama -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5 mb-5">
            <div class="w-full overflow-x-auto max-h-96 md:max-h-[38rem]">
                <table class="w-full whitespace-no-wrap border">
                    <thead class="bg-stone-800 sticky top-0">
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">No</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Nom Unit</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">HM/KM</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Status BD</th>
                            <th colspan="3" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Tanggal</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Keterangan RFU</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">PIC</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Site</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone  w-[8rem]">Aksi</th>
                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Start</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Plant RFU</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Day</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($data as $dt)
                            <tr class="group data-row text-center text-gray-700 dark:text-gray-400 hover:bg-gray-400 hover:text-white ease-in-out duration-150" onclick="changeColor(this)">
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->id}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->nom_unit}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->hm}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->status_bd}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{date('d-m-Y', strtotime($dt->tgl_bd))}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{date('d-m-Y', strtotime($dt->tgl_rfu))}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->day}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->ket_tgl_rfu}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->pic}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->namasite}}</td>
                                <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white text-center">
                                    <a href="{{route('bd-harian.edit', $dt->id)}}" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-amber-400 border border-transparent rounded-md active:bg-amber-800 hover:bg-amber-900 focus:outline-none focus:shadow-outline-purple">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-800 hover:bg-red-900 focus:outline-none focus:shadow-outline-purple">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-2 py-1 md:px-4 md:py-3 text-xs tracking-wide text-white uppercase border bg-stone-800">
                
            </div>
        </div>

        <!-- Data Dok -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5 mb-5">
            <div class="w-full overflow-x-auto max-h-96 md:max-h-[38rem]">
                <table class="w-full whitespace-no-wrap border">
                    <thead class="bg-stone-800 sticky top-0">
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone w-5">No</th>
                            <th colspan="3" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">RS/SR/PP</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Uraian Breakdown</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Uraian</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Keterangan</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone w-[8rem]">Aksi</th>
                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Type</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">No.</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if($dataDok == "Data Kosong")
                            <div class="bg-red-600 text-white text-center p-3 font-semibold">
                                Data Kosong
                            </div>
                        @else
                            @foreach($dataDok as $key => $dt)
                                <tr class="group data-row text-center text-gray-700 dark:text-gray-400 hover:bg-gray-400 hover:text-white ease-in-out duration-150" onclick="changeColor(this)">
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$key+1}}</td>
                                    @foreach($dt as $key => $d)
                                        @if($key != 'nom_unit')
                                            @if(false === strtotime($d))
                                                <td class="px-4 py-3 border group-hover:bg-gray-400 group-hover:text-white">
                                                    @if(is_double($d))
                                                        {{number_format($d, 0, ',', '.')}}
                                                    @else
                                                        {{$d}}
                                                    @endif    
                                                </td>
                                            @else
                                                @if ($key == 'sn' or $key == 'engine_brand' or $key == 'id' or $key == 'namasite' or $key='uraian_bd')
                                                    <td class="px-4 py-3 border group-hover:bg-gray-400 group-hover:text-white">
                                                        {{$d}}
                                                    </td>
                                                @else
                                                    <td class="px-4 py-3 border group-hover:bg-gray-400 group-hover:text-white">
                                                        <!-- Tanggal  -->
                                                        {{date_format(new DateTime($d), "d/m/Y")}}
                                                    </td>
                                                @endif
                                            @endif
                                        @endif    
                                    @endforeach
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white text-center">
                                        <a href="" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-amber-400 border border-transparent rounded-md active:bg-amber-800 hover:bg-amber-900 focus:outline-none focus:shadow-outline-purple">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-800 hover:bg-red-900 focus:outline-none focus:shadow-outline-purple">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="px-2 py-1 md:px-4 md:py-3 text-xs tracking-wide text-white uppercase border bg-stone-800">
                
            </div>
        </div>
</main>

<script>
    function changeColor(el) {
        $('.data-row').removeClass('bg-gray-200', 'text-gray-700');
        $(el).addClass('bg-gray-200', 'text-white');
    };
</script>
@endsection