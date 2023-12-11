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
                        const chart = echarts.init(document.querySelector("#barChart"));

                        chart.setOption({
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
                            }],
                            tooltip: {  // Enable tooltip
                                trigger: 'axis',  // Display tooltip when hovering over the axis
                                axisPointer: {  // Display tooltip line across the bar
                                    type: 'shadow'
                                },
                                formatter: function(params) {  // Custom tooltip content
                                    const year = params[0].name;
                                    const sales = params[0].value;
                                    return `Year: ${year}<br/>Total Sales: ${sales}`;
                                }
                            },
                        });

                        // Adjust the chart size when the window is resized
                        window.addEventListener('resize', () => {
                            chart.resize();
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        </script>
        <!-- End Bar Chart -->

    </div>
</div>
