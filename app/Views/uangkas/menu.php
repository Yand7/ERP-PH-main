<div class="deznav">
    <div class="deznav-scroll">
        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
            <ul class="metismenu" id="menu">
                <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <li><a href="<?= base_url('/uangkas/home/dashboard') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-networking" title="Dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 1) { ?>
                    <li><a href="<?= base_url('uangkas/home/users') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-internet" title="Users"></i>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 1) { ?>
                    <li><a href="<?= base_url('uangkas/home/class') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-controls-3" title="Class"></i>
                            <span class="nav-text">Class</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <li><a href="<?= base_url('uangkas/home/class_fs') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-controls-3" title="Class"></i>
                            <span class="nav-text">Class</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <li><a href="<?= base_url('uangkas/home/petty_cash') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-television" title="Petty Cash"></i>
                            <span class="nav-text">Petty Cash</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <li><a href="<?= base_url('uangkas/home/fine') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-network" title="Fine"></i>
                            <span class="nav-text">Fine</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <?php if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
                    <li><a href="<?= base_url('uangkas/home/expenditure') ?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-layer-1" title="Expenditure"></i>
                            <span class="nav-text">Expenditure</span>
                        </a>
                    </li>
                <?php } else {
                } ?>


                <?php if (session()->get('level') == 3) { ?>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-notepad" title="Report"></i>
                            <span class="nav-text">Report</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (session()->get('level') == 3) { ?>
                                <li><a href="<?= base_url('uangkas/home/petty_cash_report') ?>">Petty Cash Report</a></li>
                            <?php } else {
                            } ?>
                            <?php if (session()->get('level') == 3) { ?>
                                <li><a href="<?= base_url('uangkas/home/fine_report') ?>">Fine Report</a></li>
                            <?php } else {
                            } ?>
                            <?php if (session()->get('level') == 3) { ?>
                                <li><a href="<?= base_url('uangkas/home/expenditure_report') ?>">Expenditure Report</a></li>
                            <?php } else {
                            } ?>
                        </ul>
                    </li>
                <?php } else {
                } ?>
            </ul>
        <?php } else {
        } ?>
    </div>
</div>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
            <div class="me-auto d-none d-lg-block">
                <p class="mb-0 text-capitalize">Welcome <i><b>
                            <?= session()->get('nama') ?>
                        </b></i> to Financial Reporting System - Petty Cash!</p>
            </div>
        </div>