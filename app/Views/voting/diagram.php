<title>Diagram</title>
 
 <div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
			
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav
					aria-label="breadcrumb"
					class="breadcrumb-header float-start float-lg-end"
					>
				</nav>
			</div>
		</div>
	</div>  
      <section class="section">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Diagram</h4>
              </div>
              <div class="card-body">
                <canvas id="bar2"></canvas>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <script>
      var chartColors = {
        red: "rgb(255, 99, 132)",
        orange: "rgb(255, 159, 64)",
        yellow: "rgb(255, 205, 86)",
        green: "rgb(75, 192, 192)",
        info: "#41B1F9",
        blue: "#3245D1",
        purple: "rgb(153, 102, 255)",
        grey: "#EBEFF6",
      };
      <?php
        $conn = mysqli_connect("localhost", "root", "", "dbabsensi1");
        $result = mysqli_query($conn, "SELECT * FROM kandidat
        INNER JOIN vote ON kandidat.periode_id = vote.id
        WHERE vote.deleted_at IS NULL
        AND kandidat.deleted_at IS NULL
        AND kandidat.status2 = 'Tampil'");


        $labels = [];
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
          $username_ketua = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM user WHERE id_user = " . $row["ketua"]))["nama"];
          $username_wakil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM user WHERE id_user = " . $row["wakil"]))["nama"];
          $username_wakil2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM user WHERE id_user = " . $row["wakil2"]))["nama"];
          $labels[] = $username_ketua . " & " . $username_wakil. " & " . $username_wakil2;
          $data[] = $row["suara"];
        }
        mysqli_close($conn);
      ?>
      var ctxBar = document.getElementById("bar2").getContext("2d");
      var myBar = new Chart(ctxBar, {
        type: "bar",
        data: {
          labels: <?php echo json_encode($labels); ?>,
          datasets: [
            {
              label: "Suara",
              backgroundColor: [chartColors.blue, chartColors.blue],
              data: <?php echo json_encode($data); ?>,
            },
          ],
        },
        options: {
          responsive: true,
          barRoundness: 1,
          title: {
            display: true,
            text: "Suara",
          },
          legend: {
            display: false,
          },
          scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                suggestedMax: Math.max(...<?php echo json_encode($data); ?>) + 10,
                padding: 10,
              },
              gridLines: {
                drawBorder: false,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                autoSkip: false,
                maxRotation: 0,
                minRotation: 0,
              },
            },
          ],
        },
        },
      });
    </script>
  </body>
</html>
