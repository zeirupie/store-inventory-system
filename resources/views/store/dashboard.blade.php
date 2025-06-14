@extends('layouts.app')

@section('content')
    <h1 class="text-[1.3em] font-[600] text-gray-700">Dashboard</h1>
    <h2 class="text-lg font-semibold text-gray-600 mb-4">
        Monthly Report for {{ $month }} {{ $year }}
    </h2>
    {{--Stat cards--}}
    <div class="my-[30px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
          {{--Card 1--}}
            <div class="bg-white p-[20px] rounded-lg shadow-md">
                <p class="text-[2em] font-bold text-blue-600">{{ $count_items }}</p>
                <h2 class="text-lg font-semibold text-gray-700">Total Products</h2>
            </div>
            {{--Card 2--}}
            <div class="bg-white p-[20px] rounded-lg shadow-md">
                <p class="text-[2em] font-bold text-blue-600">₱{{ number_format($total_sales, 2) }}</p>
                <h2 class="text-lg font-semibold text-gray-700">Total Sales ({{ $month }})</h2>
            </div>
            {{--Card 3--}}
            <div class="bg-white p-[20px] rounded-lg shadow-md">
                <p class="text-[2em] font-bold text-blue-600">₱{{ number_format($total_profit, 2) }}</p>
                <h2 class="text-lg font-semibold text-gray-700">Profit ({{ $month }})</h2>
            </div>
        </div>
    </div>
    
    {{--Charts section--}}
    <section class="max-container pb-20">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{--Line chart--}}
        <article class="card p-6">
          <h3 class="text-xl font-semibold text-gray-900 mb-4">Line Chart: Monthly Sales</h3>
          <div id="chart-container">
            <canvas id="lineChart" height="300px" role="img" aria-label="Line chart showing monthly sales data" style="background-color: white;padding:20px;border-radius:25px;"></canvas>
          </div>
        </article>
        {{--Bar chart--}}
        <article class="card p-6">
          <h3 class="text-xl font-semibold text-gray-900 mb-4">Bar Chart: Product Categories</h3>
          <div id="chart-container">
            <canvas id="barChart" height="300px" role="img" aria-label="Bar chart showing sales by product categories" style="background-color: white;padding:20px;border-radius:25px;"></canvas>
          </div>
        </article>
      </div>
    </section>

    <script>
      const lineCtx = document.getElementById('lineChart').getContext('2d');
      const barCtx = document.getElementById('barChart').getContext('2d');

      // Common chart options
      const commonOptions = {
        responsive: true,
        animation: {
          duration: 800,
          easing: 'easeInOutCubic'
        },
        plugins: {
          legend: {
            labels: {
              color: '#4b5563',
              font: { family: 'Inter', weight: '600', size: 14 }
            }
          },
          tooltip: {
            enabled: true,
            backgroundColor: 'rgba(31, 41, 55, 0.85)',
            titleFont: { family: 'Inter', weight: '700' },
            bodyFont: { family: 'Inter' }
          }
        },
        scales: {
          x: {
            grid: { color: '#e5e7eb' },
            ticks: { color: '#6b7280', font: { family: 'Inter' } }
          },
          y: {
            grid: { color: '#e5e7eb' },
            ticks: { color: '#6b7280', font: { family: 'Inter' } },
            beginAtZero: true
          }
        }
      };

      // Line chart data (dynamic from controller)
      const lineData = {
        labels: @json($line_labels),
        datasets: [{
          label: 'Monthly Sales',
          data: @json($line_data),
          borderColor: '#2196F3',
          backgroundColor: '#BBDEFB',
          pointBackgroundColor: '#2196F3',
          tension: 0.3,
          fill: true,
          borderWidth: 3,
          pointRadius: 5,
          pointHoverRadius: 7,
          hoverBorderWidth: 4,
        }]
      };

      // Bar chart data (dynamic from controller)
      const barData = {
        labels: @json($bar_labels),
        datasets: [{
          label: 'Top Category Sales',
          data: @json($bar_data),
          borderColor: '#2196F3',
          backgroundColor: '#2196F3',
          borderRadius: 6,
          barPercentage: 0.6,
          categoryPercentage: 0.7
        }]
      };

      // Create the line chart
      const lineChart = new Chart(lineCtx, {
        type: 'line',
        data: lineData,
        options: {
          maintainAspectRatio: false,
          ...commonOptions,
          interaction: {
            mode: 'nearest',
            intersect: false
          }
        }
      });

      // Create the bar chart
      const barChart = new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: {
          maintainAspectRatio: false,
          ...commonOptions,
          scales: {
            ...commonOptions.scales,
            y: {
              ...commonOptions.scales.y,
              beginAtZero: true,
              ticks: {
                ...commonOptions.scales.y.ticks,
                stepSize: 2000
              }
            }
          },
          interaction: {
            mode: 'nearest',
            intersect: true
          }
        }
      });
    </script>
@endsection