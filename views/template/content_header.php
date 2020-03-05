    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo ucfirst($_GET['modul']); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php if(isset($_GET['act'])){ ?>
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= ucwords($_GET['act']." ".$_GET['modul']);?></li>
              </ol>
            <?php }else{ ?>
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            <?php } ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>