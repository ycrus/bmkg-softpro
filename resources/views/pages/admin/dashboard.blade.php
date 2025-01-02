<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="grid grid-cols-2 gap-3 mb-4 lg:grid-cols-3">
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Sewa Alat</h3>
            <span>
                <span class="text-3xl font-bold">{{ $sewa_alat->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Pelayanan Jasa</h3>
            <span>
                <span class="text-3xl font-bold">{{ $magang->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Permohonan Kunjungan</h3>
            <span>
                <span class="text-3xl font-bold">{{ $asuransi->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Rating Megabot</h3>
            @csrf
            @foreach ($rating as $star)
            @if($star->value == 5)
            <div class="rating">
                <span>({{ $star->total }})</span>
                <span data-value="5" class="star">&#9733;</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 4)
            <div class="rating">
                <span>({{ $star->total }})</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 3)
            <div class="rating">
                <span>({{ $star->total }})</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 2)
            <div class="rating">
                <span>({{ $star->total }})</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 1)
            <div class="rating">
                <span>({{ $star->total }})</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @endif


            @endforeach

            <span><span class="text-3xl font-bold">
                    @foreach ($bintang as $student)
                    {{ $student->percentage }}
                </span>/5 from {{ $student->user }} reviewer
                @endforeach
            </span>
        </div>

    </div>
    <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
        <h3 class="text-xl font-bold dark:text-gray-400">Bar Chart Example</h3>
        <div class="custom-select">
            <select id="monthFilter"></select>
            <!-- Dynamic options will be populated here -->
            </select>
        </div>
        <div class="chart-container-wrapper">
            <div class="y-labels" id="yLabels"></div>
            <div class="chart-container" id="chartContainer"></div>
        </div>
        <div class="x-labels" id="xLabels"></div>

        <script>
            // Render chart and Y-axis labels
            function renderChart(data, maxValue) {
                chartContainer.innerHTML = ''; // Clear existing bars
                xLabels.innerHTML = ''; // Clear existing X-axis labels

                // Render Y-axis labels dynamically
                let maxValuelabels = Math.ceil(maxValue + (maxValue * 0.2));
                renderYLabels(maxValuelabels);

                // Render bars and labels
                data.forEach(item => {
                    // Create a bar
                    const bar = document.createElement('div');
                    bar.className = 'bar';
                    bar.style.height = `${(item.value / maxValuelabels) * 100}%`;

                    // Add value inside the bar
                    const value = document.createElement('span');
                    value.textContent = item.value;
                    bar.appendChild(value);

                    // Append the bar to the chart container
                    chartContainer.appendChild(bar);

                    // Create a label for the X-axis
                    const label = document.createElement('div');
                    label.className = 'x-label';
                    label.textContent = item.label;

                    // Append the label to the X-axis container
                    xLabels.appendChild(label);
                });
            }

            // Render Y-axis labels
            function renderYLabels(maxValue) {
                yLabels.innerHTML = ''; // Clear existing labels

                const numberOfLabels = 2; // Number of Y-axis labels
                const step = Math.ceil(maxValue / numberOfLabels);

                for (let i = 0; i <= numberOfLabels; i++) {
                    const labelValue = step * i;
                    const label = document.createElement('div');
                    label.className = 'y-label';
                    label.textContent = labelValue;
                    yLabels.appendChild(label);
                }
            }


            //DROPDOWN JS
            // Populate the dropdown with the last 6 months
            function populateLast6Months() {
                const monthFilter = document.getElementById('monthFilter');
                const now = new Date();
                const currentMonth = now.getMonth() + 1; // 1-based
                const currentYear = now.getFullYear();

                const months = [];
                for (let i = 0; i < 6; i++) {
                    const date = new Date(currentYear, currentMonth - i - 1, 1);
                    const month = date.getMonth() + 1; // 1-based
                    const year = date.getFullYear();
                    const monthName = date.toLocaleString('default', {
                        month: 'long'
                    });
                    months.push({
                        month,
                        year,
                        label: `${monthName} ${year}`
                    });
                }

                monthFilter.innerHTML = '';
                months.forEach(({
                    month,
                    year,
                    label
                }) => {
                    const option = document.createElement('option');
                    option.value = `${month}-${year}`; // Store month and year in value
                    option.textContent = label;
                    if (month === now.getMonth() + 1 && year === now.getFullYear()) {
                        option.selected = true; // Default to the current month
                    }
                    monthFilter.appendChild(option);
                });
            }

            document.getElementById('monthFilter').addEventListener('change', async (event) => {
                const [month, year] = event.target.value.split('-'); // Split the value into month and year
                const {
                    data,
                    maxValue
                } = await fetchChartData(month, year); // Fetch data using month and year
                renderChart(data, maxValue);
            });
            async function fetchChartData(month, year) {
                const response = await fetch(`/admin/api/chart-data?month=${month}&year=${year}`);
                return response.json();
            }

            document.addEventListener('DOMContentLoaded', async () => {
                populateLast6Months();

                // Fetch and render data for the default month and year
                const monthFilter = document.getElementById('monthFilter');
                const [month, year] = monthFilter.value.split('-');
                const {
                    data,
                    maxValue
                } = await fetchChartData(month, year);
                renderChart(data, maxValue);
            });
        </script>
    </div>

    <!-- <h3 class="text-xl font-bold dark:text-white">Permohonan Terbaru</h3> -->
</x-admin-layout>