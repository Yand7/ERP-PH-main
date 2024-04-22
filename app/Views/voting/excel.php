<title>Import From Excel</title>
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
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				</nav>
			</div>
		</div>
	</div>  
<form class="form-horizontal form-label-left" novalidate action="<?= base_url('/voting/User/import')?>" method="post" enctype="multipart/form-data">
<div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Import User From Excel</h4>
                    <a href="<?= site_url('/voting/user') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                    
                </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                        <div>
                        </div>
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                            <label>File Excel</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                <input type="file" class="form-control" placeholder="Excel" name="file">
                                                  
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>