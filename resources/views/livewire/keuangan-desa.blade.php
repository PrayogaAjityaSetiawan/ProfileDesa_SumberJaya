<div class="px-4 md:px-0 md:w-[80%] 2xl:w-[70%] mx-auto mt-30 selection:bg-[#05426F] selection:text-white">
    <h2 class="text-xl font-semibold mt-10">Tabel Pendapatan Desa Sumberjaya tahun {{ $anggaran->tahun }}</h2>

    <div class="overflow-x-auto">
        <table id="tablePendapatan" class="display w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-slate-100 text-xs uppercase">
                <tr>
                    <th>NO</th>
                    <th>SUMBER PENDAPATAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPendapatan = 0;
                    $row = 1;
                @endphp

                @foreach($anggaran->pendapatan as $pekerjaan)
                    @php
                        $jumlahRaw = $pekerjaan['jumlah'] ?? null;
                        $sumber = $pekerjaan['sumber'] ?? null;

                        if ($jumlahRaw !== null && $jumlahRaw !== '') {
                            $jumlah = (float) $jumlahRaw;
                            $totalPendapatan += $jumlah;
                        } else {
                            $jumlah = null;
                        }
                    @endphp

                    <tr>
                        <td>{{ $row++ }}</td>
                        <td>{{ $sumber !== null ? $sumber : '-' }}</td>
                        <td>
                            @if($jumlah !== null)
                                Rp {{ number_format($jumlah * 1000000, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-semibold bg-gray-100">
                    <td colspan="2">Total Pendapatan</td>
                    <td>Rp {{ number_format($totalPendapatan * 1000000, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Chart Pendapatan --}}
    <div class="my-10">
        <h2 class="text-xl font-semibold mb-4">Visualisasi Pendapatan Desa Sumberjaya</h2>
        <canvas id="pendapatanChart" height="150"></canvas>
    </div>
    {{-- Tabel Belanja --}}
    <h2 class="text-xl font-semibold mt-10">Tabel Belanja Desa Sumberjaya tahun {{ $anggaran->tahun }}</h2>
    <div class="overflow-x-auto">
        <table id="tablePekerjaan" class="display w-full text-sm text-left">
            <thead class="bg-slate-100 text-xs uppercase">
                <tr>
                    <th>No</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggaran->belanja as $i => $pekerjaan)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $pekerjaan['sumber'] }}</td>
                        <td>Rp {{ number_format((int) str_replace('.', '', $pekerjaan['jumlah']), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- Chart Belanja --}}
    <div class="my-10">
        <h2 class="text-xl font-semibold mb-4">Visualisasi Belanja Desa Sumberjaya</h2>
        <canvas id="belanjaChart" height="150"></canvas>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tablePendapatan').DataTable({
                responsive: true,
                paging: false,
                info: false,
                ordering: true,
                searching: false
            });
            $('#tablePekerjaan').DataTable({
                responsive: true,
                paging: false,
                info: false,
                ordering: true,
                searching: false
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pendapatan Chart
            const ctxPendapatan = document.getElementById('pendapatanChart').getContext('2d');
            const dataPendapatan = {
                labels: {!! json_encode(collect($anggaran->pendapatan)->pluck('sumber')) !!},
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: {!! json_encode(
                        collect($anggaran->pendapatan)->map(function ($item) {
                            return isset($item['jumlah']) ? floatval($item['jumlah']) * 1000000 : 0;
                        })
                    ) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };
            new Chart(ctxPendapatan, {
                type: 'bar',
                data: dataPendapatan,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return 'Rp ' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });

            // Belanja Chart
            const ctxBelanja = document.getElementById('belanjaChart').getContext('2d');
            const dataBelanja = {
                labels: {!! json_encode(collect($anggaran->belanja)->pluck('sumber')) !!},
                datasets: [{
                    label: 'Belanja (Rp)',
                    data: {!! json_encode(
                        collect($anggaran->belanja)->map(function ($item) {
                            return isset($item['jumlah']) ? floatval($item['jumlah']) * 1000000 : 0;
                        })
                    ) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            };
            new Chart(ctxBelanja, {
                type: 'bar',
                data: dataBelanja,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return 'Rp ' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
