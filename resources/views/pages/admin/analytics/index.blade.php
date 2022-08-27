<x-app-layout>
    @section('title','Analytics')
    <h1>Analytics</h1>
    {{-- graphs --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-4">
            <canvas id="chartAge" width="400" height="100"></canvas>
        </div>
        <div class="mt-8">
            <canvas id="chartClinic" width="400" height="100"></canvas>
        </div>
        <div class="mt-8">
            <canvas id="chartExaminationReport" width="400" height="100"></canvas>
        </div>
    </div>
</x-app-layout>

<script>
    const ctx = document.getElementById('chartAge');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Number of Patients',
                data: [
                    {{ $january }}, {{ $february }}, {{ $march }}, {{ $april }},
                    {{ $may }}, {{ $june }}, {{ $july }}, {{ $august }}, {{ $september }},
                    {{ $october }}, {{ $november }}, {{ $december }}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }}}
        });

    // clinic
    const clinicCtx = document.getElementById('chartClinic');
    const chartClinic = new Chart(clinicCtx, {
        type: 'bar',
        data: {
            labels: ['Medical', 'Dental'],
            datasets: [{
                label: 'Number of Patients in Medical and Dental Clinic',
                data: [{{ $medicalCount }}, {{ $dentalCount }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
         },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }});

        // Examination Report
        const examinationReportCTX = document.getElementById('chartExaminationReport');
        const chartExaminationReport = new Chart(examinationReportCTX, {
        type: 'bar',
        data: {
            labels: ['Pre-Employment', 'Annual', 'OJT'],
            datasets: [{
                label: 'Number of Patients Requested Examination Report',
                data: [{{ $examinationReportPreEmployment }}, {{ $examinationReportAnnual }}, {{ $examinationReportOJT }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]},
        options: {
        scales: {
            y: {
            beginAtZero: true
        }}
        }});
</script>
