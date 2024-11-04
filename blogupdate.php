<?php 
   include "dashboard/header.php";
   include "dashboard/aside.php";
   include "php/connect.php";
   $id=$_GET['id'];
   $blog=$veritabani->prepare("SELECT * FROM blogs WHERE id=?");
   $blog->execute(array($id));
   foreach($blog as $satir)
   {       
       $id=$satir["id"];
       $header=$satir["header"]; 
       $content=$satir["content"];
       $blogimage=$satir["imageurl"];            
                      
   }
  ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Blog Güncelle</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Blog Güncelle
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
                                <form action="php/blogUpdate.php" method="POST" enctype="multipart/form-data"> <!--begin::Body-->
                                    <input type="hidden" name="author" value="<?php echo $_SESSION['name'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="card-body">
                                        <div class="mb-3"> <label for="header" class="form-label">Başlık</label> 
                                        <input type="text" class="form-control" id="header" name="header" required value="<?php echo $header ?>">                                            
                                        </div>
                                        <hr>
                                        <div class="mb-3"> <label for="content" class="form-label">İçerik</label> 
                                        <textarea class="form-control" id="summernote" name="content" required>
                                        <?php echo $content ?>
                                        </textarea>                                           
                                        </div>  
                                        <div class="mb-3"> <label for="content" class="form-label">Blog Resmi</label> 
                                         <img src="<?php echo $blogimage ?>" class="img-fluid form-control" alt="Responsive image">
                                                                                 
                                        </div>  
                                        <div class="input-group mb-3"> 
                                            <input type="file" class="form-control" id="blogimage" name="blogimage"> 
                                            <label class="input-group-text" for="blogimage">Yükle</label>
                                         </div>                                     
                                        <div class="mb-3 form-check"> <input type="checkbox" checked class="form-check-input" id="status" name="status"> 
                                        <label class="form-check-label" for="status">Yayınlansınmı ?</label> </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Güncelle</button> </div> <!--end::Footer-->
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