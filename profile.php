<?php 
   include "dashboard/header.php";
   include "dashboard/aside.php";
  ?>
<main>
   <div class="col-md-6 offset-md-3 mt-5">
   <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Profil Bilgilerim</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="php/profileUpdate.php" method="POST" enctype="multipart/form-data"> <!--begin::Body-->
                                    <div class="card-body">
                                    <div class="mb-3">
                                         <label for="email" class="form-label">Adınız Soyadınız</label> 
                                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $_SESSION["name"] ?> " >                                            
                                        </div>
                                        <div class="mb-3"> 
                                        <label for="email" class="form-label">E-Posta Adresi</label> 
                                        <input type="email" class="form-control" id="email" name="email" required readonly value="<?php echo $_SESSION["email"] ?>" >                                            
                                        </div>
                                        <div class="mb-3">
                                             <label for="password" class="form-label">Şifre</label> 
                                             <input type="password" class="form-control" id="password" name="password" required> 
                                        </div>
                                        <div class="mb-3">
                                             <label for="password_confirmation" class="form-label">Şifre Tekrar</label> 
                                             <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" required> 
                                        </div>
                                        <div class="mb-3"> 
                                           <label for="imageurl" class="form-label">Profil Resmi</label>                                           
                                            <input type="file" class="form-control" id="imageurl" name="imageurl">                                            
                                         </div>
                                       
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Güncelle</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
   </div>
</main>
<?php 
   include "dashboard/footer.php";  
?>