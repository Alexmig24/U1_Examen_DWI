@section('content')
<canvas id="grafico"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = @json($data);
new Chart(document.getElementById('grafico'), {
    type: 'bar',
    data: {
        labels: data.map(d => d.marca),
        datasets: [{
            label: 'Computadoras por Marca',
            data: data.map(d => d.total),
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
        }]
    }
});
</script>
@endsection