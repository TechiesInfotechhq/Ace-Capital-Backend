@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Edit Property')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{asset('assets/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src='{{asset(' assets/richtexteditor/plugins/all_plugins.js')}}'></script>
<script type="text/javascript" src='{{asset(' assets/richtexteditor/rte-upload.js')}}'></script>
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoyZ_yVsI5N8KhjbWRyQeme1Pfz2DRYYc&libraries=places&callback=initAutocomplete"></script>
<style>
    .form-check-input[type=checkbox] {
        border: 1px solid #00000061;
    }
    .error{
      color:red;
    }
    .AceSelected{
    border: 4px solid #04917a
  }

    
</style>
<div class="row">
    <div class="col-md-12">

        <div class="card mb-4">
          <h5 class="card-header">New Project</h5>
          <!-- Account -->
          <form action="{{ENV('APP_URL')}}/updateproject" method="post" onsubmit="return checkvalidate()">
            @csrf
          <div class="card-body">
              <div class="row">
              <input type="hidden" name="proid" id="proid" value="{{$project->id}}" />
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$project->name}}" />
                  </div>
                   <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Page Title</label>
                    <input class="form-control" type="text" id="page_title" name="page_title"  value="{{$project->page_title}}" />
                  </div>
                     <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Description</label>
                    <textarea id="page_description" name="page_description" class="form-control">{{$project->page_description}}</textarea>
                  </div>     
                  
                   <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Schema Json</label>
                    <textarea id="page_schema" name="page_schema" class="form-control">{{$project->page_schema}}</textarea>
                  </div>  
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Project Category</label>
                    <select id="projectcategory" name="projectcategory" class="form-select"  aria-label="Default select example">
                      <option value="0" selected="">Select Category</option>
                      <option value="1" <?php echo $project->projectcategory=='1' ? 'selected' : '' ?>>Residential</option>
                      <option value="2" <?php echo $project->projectcategory=='2' ? 'selected' : '' ?>>Commercial</option>
                      <option value="3" <?php echo $project->projectcategory=='3' ? 'selected' : '' ?>>Off-Plan</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select"  aria-label="Default select example">
                      <option value="1" <?php echo $project->status=='1' ? 'selected' : '' ?>>Active</option>
                      <option value="0" <?php echo $project->status=='0' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="exampleFormControlSelect1" class="form-label">Location</label>
                    <input class="form-control" type="text" id="location" name="location" value="{{$project->location}}" />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <input name="description" id="inp_htmlcode" type="hidden" value="{{$project->description}}"  />
                    <div id="div_editor1" name='description' class="richtexteditor"></div>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                  <label for="exampleFormControlSelect1" class="form-label">MORE ABOUT Project</label>
                  <textarea id="short_description" name="short_description" class="form-control" >{{$project->short_description}}</textarea>
                </div> 

                <div class="mb-3 col-md-12">
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#basicModal1">
                <span class="tf-icons bx bx-image"></span>&nbsp; Feature Photo
              </button>
              <input type="hidden" name="imgArr1" id="imgArr1" value="{{$project->image}}" />
            </div>
            <div class="mb-3 col-md-6">
              <div class="demo-inline-spacing mt-3">
                <li class="list-group-item" id="selectname" style="display:none"> </li>
              </div>
            </div>

              <div class="mb-3 col-md-12">
              <input type="hidden" name="imgArr" id="imgArr"  value="{{$project->images}}" />
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                <span class="tf-icons bx bx-image"></span>&nbsp; Slider Photo's
              </button>
            </div>
            <div class="mb-3 col-md-6">
              <div class="demo-inline-spacing mt-3">
                <ol class="list-group list-group-numbered" id="selectname1">

                </ol>
              </div>
            </div>
              </div>
          </div>

          <hr class="my-0">
          <div class="card-body">
              
            <div class="row">
                <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2" onclick="checkvalidate()" >Save changes</button>
              
                </div>
            </div>
        </div>
        <!-- /Notifications -->
      </div>
  </div>
<!--</form>-->


<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel22">Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-top mb-12">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">All
                  Images</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">Upload
                  Image</button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                <div class="modal-body">
                  <div class="d-flex flex-wrap mt-2 apendimg" id="icons-container">
                    @foreach($media as $row)
                    <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
                      <img id="img{{$row->id}}" class="myImg" src="{{ENV('APP_URL')}}/media/images/{{$row->url}}"
                        onclick="ImgClick({{$row->id}},'{{$row->name}}')" />
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="handleImages()">Save</button>
                </div>
              </div>
              <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <input class="form-control" type="file" id="formFile" name="file"
                      onchange="return fileValidation()">
                  </div>
                  <div class="mb-3 col-md-6">
                    <button type="submit" class="btn btn-primary" onclick="handleSubmit()">Upload</button>
                    <button id="resetbtn" type="button" class="btn btn-primary" onclick="resetFile()"> Reset
                      file</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Featues Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="row">
  <div class="col-xl-12">
    <div class="nav-align-top mb-12">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home1" aria-controls="navs-top-home" aria-selected="true">All Images</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile1" aria-controls="navs-top-profile" aria-selected="false">Upload Image</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-top-home1" role="tabpanel">
        <div class="modal-body">
        <div class="d-flex flex-wrap mt-2 apendimg1" id="icons-container" >
          @foreach($media as $row)
          <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
              <img id="imgg{{$row->id}}" class="myImg1" src="{{ENV('APP_URL')}}/media/images/{{$row->url}}" onclick="ImgClick1({{$row->id}},'{{$row->name}}')" />
          </div>
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="handleImages1()">Save</button>
      </div>
        </div>
        <div class="tab-pane fade" id="navs-top-profile1" role="tabpanel">
    <div class="row">
        <div class="mb-3 col-md-6">
            <input class="form-control" type="file" id="formFile1" name="file1" onchange="return fileValidation1()">
        </div>
        <div class="mb-3 col-md-6">
            <button type="submit" class="btn btn-primary" onclick="handleSubmit1()">Upload</button>
            <button id="resetbtn1"  type="button" class="btn btn-primary" onclick="resetFile1()"> Reset file</button>
        </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>





  <!-- /Account -->
        </div>
      </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

function resetFile1() {
            const file =
                document.querySelector('#formFile1');
            file.value = '';
        }
        function resetFile() {
            const file =
                document.querySelector('#formFile');
            file.value = '';
        }
var editor1 = new RichTextEditor(document.getElementById("div_editor1"));

editor1.attachEvent("change", function () {
    document.getElementById("inp_htmlcode").value = editor1.getHTMLCode();
});

$(document).ready(function() {
    let oldhtml = document.getElementById('inp_htmlcode').value
    editor1.insertHTML(oldhtml)
});

  let selectedImages = [];
  let selectedImagesArr = [];
  let selectedFeatures = [];
    

  ImgClick = (id,name) => {
    let img = document.getElementById(`img${id}`)
    if(img.className.indexOf('AceSelected') > 0){
      selectedImages = selectedImages.filter((x) => x != id)
      selectedImagesArr = selectedImagesArr.filter((x) => x != name)
      img.className = 'myImg';
    }else{
      selectedImages.push(id)
      selectedImagesArr.push(name)
      img.className = 'myImg AceSelected';
    }
  }

  handleImages = () => {
    document.getElementById('selectname1').innerHTML = '';
    selectedImagesArr.map(x => {
      if(x == '')
      {
        $('#selectname1').append(`<li class="list-group-item">Image</li>`);
      }
     else{
      $('#selectname1').append(`<li class="list-group-item">${x}</li>`);
     }
    })
    document.getElementById('imgArr').value = JSON.stringify(selectedImages);
    $('#basicModal').modal('hide');
  }

  
    checkvalidate = () =>{
        let name = document.getElementById('name').value;
         let page_title = document.getElementById('page_title').value;
        let page_description = document.getElementById('page_description').value;
        let page_schema = document.getElementById('page_schema').value;
        let inp_htmlcode = document.getElementById("inp_htmlcode").value;
        let short_description = document.getElementById("short_description").value;
        $(".error").remove();
    if (name.length < 1) {
    $('#name').after('<span class="error">This field is required*</span>');
    return false;
    }
    
    if (page_title.length < 1) {
    $('#page_title').after('<span class="error">Page Title is required*</span>');
    return false;
    }
     if (page_description.length < 1) {
    $('#page_description').after('<span class="error">Page Description  is required*</span>');
    return false;
    }
    if (page_schema.length < 1) {
    $('#page_schema').after('<span class="error">Page Schema  is required*</span>');
    return false;
    }
    
    var projectcategory=$('#projectcategory');
    if(projectcategory.val() == 0)
    {
      $('#projectcategory').after('<span class="error"> Select a Valid Project Category*</span>');
      spinner.hide();
      return false;
    }

    if (inp_htmlcode.length < 1) {
      $('#inp_htmlcode').after('<span class="error">This field is required*</span>');
      return false;
    }
    if (short_description.length < 1) {
      $('#short_description').after('<span class="error">Short Description is required*</span>');
      return false;
    }
    
    else{
         Swal.fire({
            title: "Thankyou!",   
            text: "Project Update Successfully !",   
            type: "success", 
            showConfirmButton: false, 
            allowOutsideClick: false, 
            timer: 4000,
            });
            return true;
    }
     
    }

    function ImgClick1(id,name)
    {
    let img = document.getElementById(`imgg${id}`)
    $('.AceSelected').removeClass('AceSelected'); 
    $(img).addClass("myImg1 AceSelected"); 
    document.getElementById('imgArr1').value = id;
    if(name !='')
    {
      $('#selectname').html(name);
    $('#selectname').show();
    }
else{
  $('#selectname').html('Image');
    $('#selectname').show();
}
    }

    function handleImages1()
   {
   $('#basicModal1').modal('hide');
   }

   function fileValidation1(){
      $(".error").remove();
    var fileInput = document.getElementById('formFile1');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
      $('#formFile1').after('<span class="error"> Please upload file having extensions .jpeg/.jpg/.png/.gif only</span>');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation() {
    $(".error").remove();
    var fileInput = document.getElementById('formFile');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      $('#formFile').after('<span class="error"> Please upload file having extensions .jpeg/.jpg/.png/.gif only</span>');
      fileInput.value = '';
      return false;
    } else {
      //Image preview
      if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
handleSubmit1 = () =>{
      $(".error").remove();
    var fileInput = document.getElementById('formFile1').value;
    var files = $('#formFile1')[0].files;
    let data =  new FormData;
    data.append('file',files[0]);
    if( fileInput == '' || fileInput == null){
      $('#formFile1').after('<span class="error"> Please upload file having extensions .jpeg/.jpg/.png/.gif only</span>');
      return false;
    }else{
      axios.post('{{ENV("APP_URL")}}/AddMedia',data).then((result) => {
     if(result.data != 0){
      var imgurl= document.getElementById('imgurl').value;
      $( "#resetbtn1" ).trigger( "click" );
      $('.apendimg1').append(`<div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
      <img id="imgg${result.data[0].id}" class="myImg1" src="${imgurl}/${result.data[0].url}" onclick="ImgClick1(${result.data[0].id},'${result.data[0].name}')">
      </div>`);
     }
    }).catch((err) => {
      console.log(err);
    });
    }
}


  handleSubmit = () => {
    $(".error").remove();
    var spinner = $('.loader');
    spinner.show();
    var fileInput = document.getElementById('formFile').value;
    var files = $('#formFile')[0].files;
    let data = new FormData;
    data.append('file', files[0]);
    if (fileInput == '' || fileInput == null) {
      $('#formFile').after('<span class="error"> Please upload file having extensions .jpeg/.jpg/.png/.gif only</span>');
      spinner.hide();
      return false;
    } else {
      axios.post('{{ENV("APP_URL")}}/AddMedia', data).then((result) => {
        if (result.data != 0) {
          var imgurl = document.getElementById('imgurl').value;
          $("#resetbtn").trigger("click");
          $('.apendimg').append(`<div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
      <img id="img${result.data[0].id}" class="myImg" src="${imgurl}/${result.data[0].url}" onclick="ImgClick(${result.data[0].id},'${result.data[0].name}')">
      </div>`);
          spinner.hide();
        }
      }).catch((err) => {
        console.log(err);
      });
    }
  }


</script>
<script>
  function init() {
    var input = document.getElementById("location");
    var autocomplete = new google.maps.places.Autocomplete(input);
  }

  google.maps.event.addDomListener(window, "load", init);
</script>


@endsection

