<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php $heading; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <?php foreach ($breadcrumbs as $breadcrumb) ?>
                    <li class="breadcrumb-item <?php ($breadcrumb === $breadcrumbActive) ? 'active' : '' ?>"><?php echo $breadcrumb ?></li>
                    <?php ?>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>