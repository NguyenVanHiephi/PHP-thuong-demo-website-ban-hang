<?php
    include("../views/header_m.php");
?>
<div class="body-content">
	<div class="container">
		<div class="track-order-page">
			<div class="row">
				<div class="col-md-12"> 
                <h1>Thông tin danh mục sản phẩm</h1>
                <ol class="float-sm-right">
                  <a href="?action=qh_dm" class="btn-upper btn btn-primary checkout-page-button">Quản lý danh mục</a>
                </ol>
        <aside>
            <h2 class="heading-title">Loại sản phẩm</h2>
            <section class="content-header" id="form">
</section>
            <nav>
                <table class="table compare-table inner-top-vs">
                    <tr>
                        <th>Loại SP</th>
                        <th>Ảnh</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tbody id="dataBody">
                 
                 
                 </tbody>
              
                </table>
                <ul class="pagination" id="pagination" >
      <!-- Nút phân trang sẽ được thêm vào đây bằng JavaScript -->
            </nav>
        </aside>
        
        <br>
        <p class="last_paragraph">
            <a onclick="Add('add','0')"  class="btn-upper btn btn-primary checkout-page-button add">Thêm</a>
        </p> 
        <p class="last_paragraph">
            <a href="?action=xem_san_pham" class="btn-upper btn btn-primary checkout-page-button">Xem sản phẩm</a>
        </p>    
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
<script>

let newDiv = null;

$(document).ready(function() {
      var data = [
          
        <?php foreach ($categories as $category) : ?>
        
               {id:<?php echo $category['ID_loai_sp'];?>,name:'<?php echo $category['Loai_sp'];?>',img:''} ,
                 
               <?php endforeach;?>
          
      ];
      
      
       var input = document.getElementById("searchInput");
var table = document.getElementById("myTable");

// input.addEventListener("keyup", function() {
//   var filter = input.value.toUpperCase();
//   debugger;
//    const results = data.filter(item => {
//   return (
//     item.name.toLowerCase().includes(filter.toLowerCase()) || // Tìm kiếm theo thuộc tính 'name'
//     item.id.toString().includes(filter) || // Tìm kiếm theo thuộc tính 'id'
//     item.loai_sp.toLowerCase().includes(filter.toLowerCase()) // Tìm kiếm theo thuộc tính 'age'
//      || // Tìm kiếm theo thuộc tính 'name'
//     item.gia.toString().includes(filter) || // Tìm kiếm theo thuộc tính 'id'
//     item.img.toString().includes(filter.toLowerCase())
//      || // Tìm kiếm theo thuộc tính 'name'
//     item.img1.toLowerCase().includes(filter.toLowerCase()) || // Tìm kiếm theo thuộc tính 'id'
//     item.img2.toString().includes(filter.toLowerCase())
//      || // Tìm kiếm theo thuộc tính 'name'
//     item.mota.toLowerCase().includes(filter.toLowerCase())
//   );
// });
  
  
//   displayData(results);
//       renderPagination(results);
// }); 
     
     


    
      debugger;
      var recordsPerPage = 3;
      var currentPage = 1;
      
      function displayData(datas) {
        var startIndex = (currentPage - 1) * recordsPerPage;
        var endIndex = startIndex + recordsPerPage;
        var currentData = datas.slice(startIndex, endIndex);
      
        var tableBody = $("#dataBody");
        tableBody.empty();
      
        $.each(currentData, function(index, record) {
            
          
          var row = $("<tr>");
          row.html(`   <td>
          `+ record.name +`
                        </td>
                        <td>    <div class="product_image">
			<img width="200px" display: inline-block; src="../`+ record.img +`" alt="">
                         </div></td>
                        <td>
                            <form action="." method="POST">
                                <input type="hidden" name="action" value="xoa_loai_sp">
                                <input type="hidden" name="category_id" value="`+ record.id +`">
                                <input type="submit" style="background:red;" class="btn-upper btn btn-primary checkout-page-button" value="Xoá">
                            </form>
                        </td>`);debugger;
          tableBody.append(row);
        });
      }
      
      function renderPagination(datas) {
        var totalPages = Math.ceil(datas.length / recordsPerPage);
        var pagination = $("#pagination");
        pagination.empty();
      
        for (var i = 1; i <= totalPages; i++) {
          var button = $("<li>");
          button.addClass("page-item");
          button.html("<a class='page-link' href='javascript:void(0);'>" + i + "</a>");
          button.on("click", function() {
            currentPage = parseInt($(this).text());
            displayData(datas);
          });
          pagination.append(button);
        }
      }
      
      displayData(data);
      renderPagination(data);
    });

function Add(sk,i) {
    
     
    let name_form = '' ;
    let action_form = '';
    let id_sp = '' ;
    let name_sp = '' ;
    let type_sp = '' ;
    let gia_sp = '' ;
    let nsx = '' ;
    let img_sp = '' ;
    let bt = '' ;
    
 
 if (newDiv !== null) {
           newDiv.remove();
       }
 debugger;
 if(sk==='add'){
     
     var add = document.querySelector(".add");
     add.style.display = "none";
     name_form='Form thêm mới loại sản phẩm ';
     action_form = 'them_loai_sp';
     bt = 'Thêm' ;
     
 }else if(sk==='up'){
     
     name_form ='Form chỉnh sửa loại sản phẩm ';
     action_form = 'sua_loai_sp';
     bt = 'Sửa' ;
 }
 
 
 // tạo nội dung cần thiết
  newDiv = document.createElement("div");
  var url = "index.php";

 $.ajax({
   url: url,
   type: "GET",
   data: { action: 'show_sp' , product_id: i},
   success: function(sp) {debugger;
    var jsonData = JSON.parse(sp);
     if(sp!=='false'){
     id_sp= jsonData.ID_sp;
     name_sp = jsonData.ten_sp;
     type_sp =  jsonData.ID_loai_sp;
     gia_sp =  jsonData.Gia_sp;
     nsx =  jsonData.Nsx;
     img_sp =  jsonData.Images;
     
 }
     debugger; 
  
  newDiv.innerHTML = `<section class="content">

     <!-- Default box -->
       <div class="card card-primary">
       <div class="card-header">
             <h3 class="card-title"><font style="vertical-align: inherit ;"><font style="vertical-align: inherit;">`+name_form+`</font></font></h3>

             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Sụp đổ">
                 <i class="fa fa-minus"></i>
               </button>
                  <button type="button" class="btn btn-tool" onclick="bt_add()" data-card-widget="remove" title="Di dời">
             <i class="fa fa-times"></i>
           </button>
             </div>
           </div>
       
       <div class="card-body">
               <form action="index.php" method="POST">
       <input type="hidden" class="form-control" name="id"  value="`+id_sp+`">
       <input type="hidden" class="form-control" name="action"  value="`+action_form+`">
                 <div class="row">
                   <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group">
                       <label>Tên sản phẩm</label>
                       <input type="text" class="form-control" name="name" placeholder="Enter ..." value="`+name_sp+`">
                     </div>
                   </div>
                  
                   
                 </div>
                 
                   <div class="row">
                   <div class="col-sm-6">
                     <!-- textarea -->
                     <div class="form-group">
                       <label>Chọn ảnh cho sản phẩm</label>
                   <input type="hidden" name="imageData" id="imageData">
                       <input type="file"  style="display:block;" multiple="" name="image" id="imageFile" onchange="chooseFile(this)" accept="image/gif, image/jpeg, image/png" >
                     </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                        
                        <div class="product_image">
                       <input type="hidden"  value="" id="anh"  name="anh">
           <img style="max-width:756px;min-width:556px;" id="image" class="image" display: inline-block; src="../`+img_sp+`" alt="">
                <br>
                <br>
                       <label>Ảnh minh họa cho sản phẩm</label>
                        </div>
                                
                     </div>
                   </div>
                 </div>

                    <div class="col-sm-6-left">

               <br>
           <ol class="float-sm-right">
              <button type="submit" class="btn btn-block btn-danger btn-sm">`+bt+`</button>
            
           </ol>
           
           </div>
                 
               </form>
             </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->

   </section>`;
       debugger;
       // Đè thẻ div mới lên thẻ div cũ 
var oldDiv = document.getElementById("form");
oldDiv.appendChild(newDiv);
        },
   error: function() {
       debugger; 
     console.log("Có lỗi xảy ra trong khi gửi yêu cầu");
   }
 }
 );
      

 
 }

function bt_add(){
   
    var add = document.querySelector(".add");
     add.style.display = "";
   
}


function chooseFile(fileInput){
          var image = document.getElementById("anh");
          var image1 = document.getElementById("anh1");
          var image2 = document.getElementById("anh2");
          debugger;
          if(fileInput.files && fileInput.files[0]){
              var reader = new FileReader();
              
              reader.onload = function(e) {
                  $('#image').attr('src',e.target.result);
                  var imageData = e.target.result;
                   image.value = imageData;
              }
              reader.readAsDataURL(fileInput.files[0]);
          }
      }
      
      function encodeImageFileAsURL(element) {
        var file = element.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            document.getElementById("imageData").value = reader.result;
        }
        reader.readAsDataURL(file);
    }
      
    
       

</script>
<?php
    include("../views/footer.php");
?>