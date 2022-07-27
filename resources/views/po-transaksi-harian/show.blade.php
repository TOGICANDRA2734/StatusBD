@extends('layout.app', ['title' => 'Homepage | PT RCI | PMA 2023'])

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="my-3 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Detail PO Transaksi
            </h2>
            
            <a href="#" class="bg-green-600 hover:bg-green-800 duration-150 ease-in-out text-white font-bold py-2 px-4 rounded inline-flex justify-between items-center">
                <i class="fa-solid fa-circle-plus mr-3"></i>    
                <span>Tambah Data</span>
            </a>
        </div>           

        <!-- Data Dok -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5 mb-5">
            <div class="w-full overflow-x-auto max-h-96 md:max-h-[38rem]">
                <table class="w-full whitespace-no-wrap border">
                    <thead class="bg-stone-800 sticky top-0">
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">No</th>
                            <th colspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">PO</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Supplier</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Item</th>
                            <th colspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">MRS</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Status PO</th>
                            <th rowspan="2" class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Aksi</th>
                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">No</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Tanggal</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">NO</th>
                            <th class="px-2 py-1 md:px-4 md:py-3 border-b border-r border-stone">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if(count($data) == 0)
                            <div class="bg-red-600 text-white text-center p-3 font-semibold">
                                Data Kosong
                            </div>
                        @else
                            @foreach($data as $key => $dt)
                                <tr class="group data-row text-center text-gray-700 dark:text-gray-400 hover:bg-gray-400 hover:text-white ease-in-out duration-150" onclick="changeColor(this)">
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$key+1}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->no_po}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->po_date}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->supplier}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->item}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->no_mrs}}</td>
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">{{$dt->mrs_date}}</td>
                                    @if($dt->no_mrs != "")
                                        <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">Terpenuhi</td>
                                    @else
                                        <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white">Tidak Terpenuhi</td>
                                    @endif
                                    <td class="px-4 py-3 text-sm group-hover:bg-gray-400 group-hover:text-white text-center">
                                        <a href="" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-amber-400 border border-transparent rounded-md active:bg-amber-800 hover:bg-amber-900 focus:outline-none focus:shadow-outline-purple">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <button onclick="destroy(this.id)" id="{{$dt->id}}" class="tbDetail mr-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-800 hover:bg-red-900 focus:outline-none focus:shadow-outline-purple">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
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
    </div>
</main>

<script>
    function destroy(id){
        var id=id;
        var token=$("meta[name='csrf-token']").attr("content");
        console.log(id);
        
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA, HAPUS!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/bd-harian/delete/${id}`,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'PUT',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                window.location.href = "/";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }
</script>
<script>
    function changeColor(el) {
        $('.data-row').removeClass('bg-gray-200', 'text-gray-700');
        $(el).addClass('bg-gray-200', 'text-white');
    };
</script>
@endsection