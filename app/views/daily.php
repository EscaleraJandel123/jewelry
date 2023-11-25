<div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Sales <span>| Today</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                    <h6 id="dailySales">Loading...</h6>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Sales Card -->

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Fetch data from your CodeIgniter route
        fetch('/dailySales')
            .then(response => response.json())
            .then(data => {
                // Display the total daily sales
                document.getElementById('dailySales').textContent = data.total_sales || 0;
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>