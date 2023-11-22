@extends('template.main')
@section('conteudo')
<style>
    .grafico{
        background-color: white;
        margin: 2rem;
        padding: 1rem;
        border-radius: 1rem;
        font-size: 0.5rem;
    }
</style>
<div class="grafico d-flex flex-column justify-content-center align-items-center">
    <div class="titulo">
        <h1>Feedbacks</h1>
    </div>
    <div id="pizza" class="d-flex flex-column justify-content-center align-items-center">

    </div>
</div>
<script type="text/javascript">

    let notas = <?php echo $total_notas ?>;
    console.log(notas);
    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        data = google.visualization.arrayToDataTable(notas);

        options = {
            alignment:'center',
            width: 600,
            height: 500,
            colors: ['#e69291','#e4e691','#a0e691','#91e6e0','#ae91e6'],
            tooltip:{
                textStyle:{
                    fontSize:25
                }
            },
            pieSliceTextStyle: {
                color: '#303030',
                bold: true,
            },
            legend:{
                position: 'top',
                maxLines:5,
                textStyle:{
                    fontSize:20,
                },
                alignment:'center',
                itemSpacing:30,
            },
        };
        chart = new google.visualization.PieChart(document.getElementById('pizza'));
        chart.draw(data, options);

    }

</script>
@endsection
