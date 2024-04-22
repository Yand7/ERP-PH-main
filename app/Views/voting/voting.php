<title>Voting</title>
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
                        <div class="row">
                        <?php
                        foreach ($kandidat as $key => $row) {
                        echo '<div class="col-xl-4 col-md-6 col-sm-12">';
                        echo '<div class="card">';
                        echo '<img src="' . base_url('images/' . $row['foto']) . '" class="card-img-top" height="300">';
                        echo '<div class="card-content">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">Kandidat</h5>';
                        echo '<p class="card-text">Ketua: ' . $row['ketua_username'] . '</p>';
                        echo '<p class="card-text">Wakil: ' . $row['wakil_username'] . '</p>';
                        echo '<p class="card-text">Wakil 2: ' . $row['wakil2_username'] . '</p>';
                        echo '<p class="card-text">Visi & Misi: ' . $row['visimisi'] . '</p>';
                        echo '<form action="' . base_url('/voting/Voting/vote/?') . '" method="post">';
                        echo '<input type="hidden" name="kandidatId" value="' . $row['id'] . '">';
                        echo '<button type="submit" class="btn btn-primary block" ' . $key . '">Vote now</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        }
                        ?>
                    </div>
                    </div>
                        </div>
                      






