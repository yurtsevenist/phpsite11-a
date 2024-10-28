<?php 
   include "php/connect.php";
   $blogs=$veritabani->prepare("SELECT * FROM blogs ");
   $blogs->execute();
   $bloglar=$blogs->fetchAll(PDO::FETCH_OBJ);
   $sira=1;
   include "dashboard/header.php";
   include "dashboard/aside.php";
  

  ?>
 <main class="app-main"> <!--begin::App Content Header-->
 <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Blog Yazılarım</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Blog Yazılarım
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
                <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12"> <!--begin::Quick Example-->
                <table id="myblog" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Resim</th>
                <th>Başlık</th>
                <th>Yazar</th>
                <th>Tarih</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bloglar as $blog) { ?>

                <tr>
                <td><?php echo $sira++ ?></td>
                <td><img width="50px" src="<?php echo $blog->imageurl; ?>" alt="" srcset=""></td>
                <td><?php echo $blog->header; ?></td>
                <td><?php echo $blog->author; ?></td>
                <td><?php echo $blog->date; ?></td>
                <td><?php if($blog->status==0) { echo "<span class='text-danger'>Yayın Değil</span>";} else { echo "<span class='text-dark'>Yayında</span>";}  ?></td>
                <td>
                    <a title="Blog yazısınız düzenler" href="#" class="btn btn-xs btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    <a title="Blog yazısını siler" href="#" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteMessageModal" mid="<?php echo $blog->id ?>">
                        <i class="bi bi-trash"></i></a>
                </td>
                </tr>
            <?php } ?> 
        </tbody>
    </table>      
                       
                </div>
            </div>
        </div>
    </div>
    <!-- mesaj sil Modal -->
<div class="modal fade" id="deleteMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Blog Sil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Seçtiğiniz Blog Silinecektir, onaylıyormusunuz ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
         <form action="php/deleteBlog.php" method="POST">
            <input type="hidden" name="mid" id="mid">
            <button type="submit" class="btn btn-danger">Sil</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
        var blogsil = document.getElementById('deleteMessageModal')
        blogsil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('mid')             
        var modal_input=blogsil.querySelector('#mid')              
        modal_input.value=id;
    })
</script>
<!-- mesaj sil Modal sonu -->
</main>
<?php 
   include "dashboard/footer.php";  
  ?>