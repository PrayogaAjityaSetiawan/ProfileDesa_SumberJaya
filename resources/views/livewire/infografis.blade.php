<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30 selection:bg-[#05426F] selection:text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border border-gray-300 rounded-xl p-5 mb-8 ">  
        <div class="bg-white flex flex-col flex-start  p-5">
            <h2 class="text-2xl font-bold text-gray-800 text-start">Informasi Umum</h2>
            <div class="flex justify-between  items-center">
                <span>Luas Desa :</span>
                <span>3,13 km² (3,130,000 m²)</span>
            </div>
            <div class="flex justify-between  items-center">
                <span>Jumlah Penduduk :</span>
                <span>{{$infgrafis->jumlah_penduduk}}</span>
            </div>
            <div class="flex justify-between  items-center">
                <span>Jumlah RT :</span>
                <span>{{$infgrafis->jumlah_rt}}</span>
            </div>
            <div class="flex justify-between  items-center">
                <span>Jumlah RW :</span>
                <span >{{$infgrafis->jumlah_rw}}</span>
            </div>
        </div>
        <div class="bg-white flex flex-col flex-start  p-5">
            <h2 class="text-2xl font-bold text-gray-800 text-start">Batas Wilayah</h2>
            <span>Utara : Pantai Laut Selat Sunda</span>
            <span>Selatan : Desa Kertajaya, Kecamatan Sumur</span>
            <span>Timur : Desa Tangkilsari, Kecamatan Cimanggu</span>
            <span>Barat : Desa Kertajaya, Kecamatan Sumur</span>
        </div>
    </div>
    <div class=" grid grid-cols-2 md:grid-cols-3 gap-3 mb-8">
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-300 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_penduduk}}</span>
            <p class="text-gray-600 text-sm">Total Penduduk</p>
        </div>
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-200 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_kk}}</span>
            <p class="text-gray-600 text-sm">Kepala Keluarga</p>
        </div>
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-200 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_rt}}</span>
            <p class="text-gray-600 text-sm">Rukun Tetangga</p>
        </div>
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-200 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_rw}}</span>
            <p class="text-gray-600 text-sm">Rukun Warga</p>
        </div>
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-200 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_laki_laki}}</span>
            <p class="text-gray-600 text-sm">Laki-laki</p>
        </div>
        <div class="flex flex-col justify-center items-center bg-white rounded-xl border border-gray-200 text-center p-5">
            <span class="text-2xl font-bold">{{$infgrafis->jumlah_perempuan}}</span>
            <p class="text-gray-600 text-sm">Perempuan</p>
        </div>
    
    </div>
    <div class="grid grid-cols-1 gap-8 ">
        <!-- Grafik Kelompok Umur -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 ">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800 text-start">
                    Grafik Kelompok Umur 
                </h2>
                <p class="text-gray-600 text-sm text-start">Perbandingan jumlah penduduk laki-laki dan perempuan per kelompok umur</p>
            </div>
            <div class="relative h-96">
                <canvas id="chartKelompokUmur"></canvas>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-8">
        <!-- Grafik Tingkat Pendidikan -->
        <div class="bg-white border border-gray-200 rounded-xl p-5">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800 text-start">
                    Grafik Tingkat Pendidikan
                </h2>
                <p class="text-gray-600 text-sm  max-w-2xl mx-auto">Distribusi penduduk berdasarkan tingkat pendidikan</p>
            </div>
            <div class="relative h-96 ">
                <canvas id="chartPendidikan"></canvas>
            </div>
        </div>
        <!-- Grafik Tingkat Pendidikan -->
        <div class="bg-white border border-gray-200 rounded-xl p-5">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800 text-start">
                    Grafik Agama Penduduk
                </h2>
                <p class="text-gray-600 text-sm  max-w-2xl mx-auto">Distribusi penduduk berdasarkan agama</p>
            </div>
            <div class="relative h-96">
                <canvas id="chartAgama"></canvas>
            </div>
        </div>
    </div>
    <!-- Card Agama Penduduk -->
<div class="bg-white border border-gray-200 rounded-xl p-5 ">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 text-start">
            pendapatan desa
        </h2>
        <p class="text-gray-600 text-sm mb-4">Distribusi penduduk berdasarkan agama</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach($infgrafis->agama_penduduk as $row)
             @php
                $iconClass = match(strtolower($row['agama'])) {
                    'islam' => 'fa-solid fa-star-and-crescent',
                    'kristen' => 'fa-solid fa-church',
                    'katolik' => 'fa-solid fa-cross',
                    'hindu' => 'fa-solid fa-om',
                    'budha' => 'fa-solid fa-dharmachakra',
                    'konghucu' => 'fa-solid fa-yin-yang',
                    default => 'fa-solid fa-hands-praying'
                };
            @endphp
            <div class="relative flex justify-center  border border-gray-200 rounded-lg p-4 ">
                <i class=" {{ $iconClass }} text-5xl absolute text-gray-400 top-4 left-4"></i>
                <div class="flex flex-col items-center">
                    <span class="text-2xl font-bold">{{ $row['jumlah'] }}</span>
                    <span class="text-gray-600 text-sm">{{ $row['agama'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <!-- Tabel Jenis Pekerjaan -->
    <h2 class="text-xl font-semibold mt-10">Tabel Jenis Pekerjaan</h2>
    <div class="overflow-x-auto">
        <table id="tablePekerjaan" class="display w-full text-sm text-left">
            <thead class="bg-slate-100 text-xs uppercase">
                <tr>
                    <th>No</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody >
                @foreach($infgrafis->jenis_pekerjaan as $i => $pekerjaan)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $pekerjaan['jenis'] }}</td>
                        <td>{{ $pekerjaan['jumlah'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    // Konfigurasi global Chart.js
    Chart.defaults.font.family = "'Poppins', 'Segoe UI', sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#6B7280';

    let kelompokUmurChartInstance;
    let pendidikanChartInstance;
    let agamaChartInstance;
    let dataTableInstance;

    function renderCharts() {
        const ctxUmur = document.getElementById('chartKelompokUmur');
        const ctxPendidikan = document.getElementById('chartPendidikan');
        const ctxAgama = document.getElementById('chartAgama');

        // if (!ctxUmur || !ctxPendidikan) return;

        // Destroy chart sebelumnya jika ada
        // if (kelompokUmurChartInstance) kelompokUmurChartInstance.destroy();
        // if (pendidikanChartInstance) pendidikanChartInstance.destroy();

        // Grafik Kelompok Umur
        kelompokUmurChartInstance = new Chart(ctxUmur, {
            type: 'bar',
            data: {
                labels: {!! json_encode(collect($infgrafis->kelompok_umur)->pluck('rentang_umur')) !!},
                datasets: [
                    {
                        label: 'Perempuan',
                        backgroundColor: '#E054E8',
                        borderColor: '#ffffff',
                        borderWidth: 1,
                        data: {!! json_encode(collect($infgrafis->kelompok_umur)->pluck('perempuan')) !!}
                    },
                    {
                        label: 'Laki-laki',
                        backgroundColor: '#5459E8',
                        borderColor: '#ffffff',
                        borderWidth: 1,
                        data: {!! json_encode(collect($infgrafis->kelompok_umur)->pluck('laki_laki')) !!}
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'rect',
                            font: { size: 12 }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#DC3545',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { color: '#F3F4F6', drawBorder: false },
                        ticks: { color: '#6B7280', font: { size: 11 } },

                    },
                    y: {
                        grid: { display: false, drawBorder: false },
                        ticks: { color: '#6B7280', font: { size: 11} },   
                    }
                },
                animation: { duration: 1500, easing: 'easeOutQuart' }
            }
        });

        // Grafik Tingkat Pendidikan
        pendidikanChartInstance = new Chart(ctxPendidikan, {
            type: 'pie',
            data: {
                labels: {!! json_encode(collect($infgrafis->tingkat_pendidikan)->pluck('jenjang')) !!},
                datasets: [{
                    label: 'Jumlah',
                    backgroundColor: [
                        '#DC3545', '#28A745', '#6C757D', '#007BFF',
                        '#17A2B8', '#FFC107', '#6F42C1', '#FD7E14'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    data: {!! json_encode(collect($infgrafis->tingkat_pendidikan)->pluck('jumlah')) !!}
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'rect',
                            font: { size: 11 },
                            generateLabels: function(chart) {
                                const data = chart.data;
                                return data.labels.map((label, i) => {
                                    const value = data.datasets[0].data[i];
                                    return {
                                        text: `${label}: ${value}`,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        strokeStyle: data.datasets[0].borderColor,
                                        lineWidth: data.datasets[0].borderWidth,
                                        pointStyle: 'rect',
                                        hidden: false,
                                        index: i
                                    };
                                });
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#DC3545',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true,
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1500
                }
            }
        });


        // Grafik Agama Penduduk
        pendidikanChartInstance = new Chart(ctxAgama, {
            type: 'bar',
            data: {
                labels: {!! json_encode(collect($infgrafis->agama_penduduk)->pluck('agama')) !!},
                datasets: [{
                    label: 'Jumlah',
                    backgroundColor: [
                        '#DC3545', '#28A745', '#6C757D', '#007BFF',
                        '#17A2B8', '#FFC107', '#6F42C1', '#FD7E14'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    data: {!! json_encode(collect($infgrafis->agama_penduduk)->pluck('jumlah')) !!}
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'rect',
                            font: { size: 11 },
                            generateLabels: function(chart) {
                                const data = chart.data;
                                return data.labels.map((label, i) => {
                                    const value = data.datasets[0].data[i];
                                    return {
                                        text: `${label}: ${value}`,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        strokeStyle: data.datasets[0].borderColor,
                                        lineWidth: data.datasets[0].borderWidth,
                                        pointStyle: 'rect',
                                        hidden: false,
                                        index: i
                                    };
                                });
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#DC3545',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true,                       
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1500
                }
            }
        });

    }

    function initDataTable() {

        const table = $('#tablePekerjaan');

        // Inisialisasi ulang
        dataTableInstance = table.DataTable({
            responsive: true,
            order: [0, 'asc'],

            pageLength: 20,
            lengthMenu: [5, 10, 25, 50],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
            }

        });
    }

    // Pertama kali saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        renderCharts();
        initDataTable();
    });

    // Setelah navigasi Livewire selesai
    // window.addEventListener('livewire:navigated', () => {
    //     setTimeout(() => {
    //         renderCharts();
    //         initDataTable();
    //     }, 100); // Delay kecil agar DOM siap
    // });
</script>
@endpush

