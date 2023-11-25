<div class="card">
    <div class="card-body">
        <h5 class="card-title">Yearly Sales Bar Chart</h5>

        <!-- Bar Chart -->
        <div id="barChart" style="min-height: 400px;" class="echart"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                fetch('/yearlySales')
                    .then(response => response.json())
                    .then(data => {
                        const years = data.map(item => item.year);
                        const salesData = data.map(item => item.total_sales);

                        // Creating Bar Chart
                        echarts.init(document.querySelector("#barChart")).setOption({
                            xAxis: {
                                type: 'category',
                                data: years
                            },
                            yAxis: {
                                type: 'value'
                            },
                            series: [{
                                data: salesData,
                                type: 'bar'
                            }]
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        </script>
        <!-- End Bar Chart -->

    </div>

</div>