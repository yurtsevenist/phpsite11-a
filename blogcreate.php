<?php 
   include "dashboard/header.php";
   include "dashboard/aside.php";
  ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Blog Yaz</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Blog Yaz
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12"> <!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Blog Yazısı</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="php/blogCreate.php" method="POST" enctype="multipart/form-data"> <!--begin::Body-->
                                    <input type="hidden" name="author" value="<?php echo $_SESSION['name'] ?>">
                                    <div class="card-body">
                                        <div class="mb-3"> <label for="header" class="form-label">Başlık</label> 
                                        <input type="text" class="form-control" id="header" name="header" required >                                            
                                        </div>
                                        <hr>
                                        <div class="mb-3"> <label for="content" class="form-label">İçerik</label> 
                                        <textarea class="form-control" id="summernote" name="content" required></textarea>                                           
                                        </div>   
                                        <div class="input-group mb-3"> 
                                            <input type="file" required class="form-control" id="blogimage" name="blogimage"> 
                                            <label class="input-group-text" for="blogimage">Yükle</label>
                                         </div>                                     
                                        <div class="mb-3 form-check"> <input type="checkbox" checked class="form-check-input" id="status" name="status"> 
                                        <label class="form-check-label" for="status">Yayınlansınmı ?</label> </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Kaydet</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
                       
                        </div>
            </div>
        </div>
    </div>


</main>
<?php 
   include "dashboard/footer.php";  
  ?>