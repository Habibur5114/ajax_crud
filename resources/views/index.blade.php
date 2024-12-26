<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>






<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



  .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #87adbd !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}

.colored-toast .swal2-html-container {
  color: white;
}

</style>

</head>
<body>

<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-10">
      <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>title</th>
      <th>institute</th>
      <th>image</th>
      <th>Description</th>
      <th>status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
      </div>

<!-- Button trigger modal -->
<div class="col-lg-2">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
  Add Data
</button>
</div>
  </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="addDataModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="addt">Add Data</h5>
          <h5 class="modal-title" id="updatet">Update Data</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <span class="text-danger" id="nameerror"></span>
            </div>

            <div class="form-group">
           <label >Title</label>
            <input type="text" class="form-control" name="title" id="title">
            <span class="text-danger" id="titleerror"></span>
           </div>
            <div class="form-group">
           <label >Institute</label>
            <input type="text" class="form-control" name="institute" id="institute">
            <span class="text-danger" id="instituteerror"></span>
           </div>
            <div class="form-group">
           <label >image</label>
            <input type="file" class="form-control" name="image" id="image">
            <span class="text-danger" id="imageerror"></span>
           </div>

           <div class="form-group">
           <label >description</label>
            <input type="text" class="form-control" name="description" id="description">
            <span class="text-danger" id="descriptionerror"></span>
           </div>

           <div class="form-group">
              <label class="m-3 mt-4">Status</label><br>
              <label class="switch">
                  <input type="checkbox" name="status" id="status" value="1" checked>
                  <span class="slider round"></span>
              </label>
          </div>

        </div>
        <div class="modal-footer">
        <input type="hidden" id="id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <button type="submit" onclick="addData()" class="btn btn-info mt-3 mb-3" id="addbutton">Submit</button>
          <button type="submit" onclick="updateData()" class="btn btn-info mt-3 mb-3" id="updatebutton">update</button>
        </div>
      </div>
    </div>
  </div>

</section>








<script>

  $('#addt').show();
  $('#updatet').hide();
  $('#addbutton').show();
  $('#updatebutton').hide();


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });



  function create() {
    $.ajax({
      type: "GET",
      url: "alldata",
      dataType: "json",
      success: function (response) {
        var data = "";

        $.each(response, function (key, value) {
          data += "<tr>";
          data += "<td>" + (parseInt(key) + 1) + "</td>";
          data += "<td>" + value.name + "</td>";
          data += "<td>" + value.title + "</td>";
          data += "<td>" + value.institute + "</td>";
          data += "<td><img src='" + value.image + "' alt='Image' style='width:100px;height:auto;'></td>";
          data += "<td>" + value.description + "</td>";
          data += "<td>"
        if (value.status == 1) {
        data += "<button type='button' class='btn btn-success m-1' onclick='status(" + value.id + ")'>Active</button>";
         } else {
        data += "<button type='button' class='btn btn-danger m-1' onclick='status(" + value.id + ")'>Inactive</button>";
       }
          data += "</td>"
          data += "<td>"
          data += "<button type='button' class='btn btn-danger m-1' onclick='editData("+ value.id + ")' data-toggle='modal' data-target='#addDataModal'><i class='bi bi-pencil-square' ></i></button>"
          data += "<button type='button' class='btn btn-warning m-1' onclick='deleteData("+ value.id + ")'><i class='bi bi-trash3'></i></button>"

          data += "</td>"
          data += "</tr>";
        });

        $("tbody").html(data);
      },

    });
  }
  create();


// AddData

function clearData(){
  $('#name').val('');
  $('#title').val('');
  $('#institute').val('');
  $('#description').val('');
}



function addData() {
  var name = $('#name').val();
  var title = $('#title').val();
  var institute = $('#institute').val();
  var description = $('#description').val();
  var file = $('#image')[0].files[0];
  var status = $('#status').val();


  var formData = new FormData();
  formData.append('name', name);
  formData.append('title', title);
  formData.append('institute', institute);
  formData.append('description', description);
  formData.append('image', file);
  formData.append('status', status);


  $.ajax({
    type: "POST",
    dataType: "json",
    data: formData,
    url: "data/store",
    processData: false,
    contentType: false,
    success: function (data) {
      clearData();
      create();

      $('#addDataModal').hide();

     $('.modal-backdrop').remove();


      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
      });
      Toast.fire({
        icon: 'success',
        title: "Add Data success",
      });
    },

error: function (error) {
$('#nameerror').text(error.responseJSON.errors.name)
$('#titleerror').text(error.responseJSON.errors.title)
$('#instituteerror').text(error.responseJSON.errors.institute)
$('#imageerror').text(error.responseJSON.errors.image)
$('#descriptionerror').text(error.responseJSON.errors.description)


}

  });
}




///edit data

function editData(id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "data/edit/" + id,
        success: function (data) {
       console.log(data);
            $('#addt').hide();
            $('#updatet').show();
            $('#addbutton').hide();
            $('#updatebutton').show();


            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#title').val(data.title);
            $('#institute').val(data.institute);
            $('#description').val(data.description);
        },

    });
}



function updateData(id) {

  var id = $('#id').val();
  var name = $('#name').val();
  var title = $('#title').val();
  var institute = $('#institute').val();
  var description = $('#description').val();
  var file = $('#image')[0].files[0];
  var status = $('#status').val();

  var formData = new FormData();
  formData.append('name', name);
  formData.append('title', title);
  formData.append('institute', institute);
  formData.append('description', description);
  formData.append('image', file);
  formData.append('status', status);

  $.ajax({
    type: "POST",
    dataType: "json",
    data: formData,
    url: "data/update/" + id,
    processData: false,
    contentType: false,
    success: function (data) {
      clearData();
      create();


      $('#addDataModal').hide();

     $('.modal-backdrop').remove();


      $('#addDataModal').modal('hide');
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
      });
      Toast.fire({
        icon: 'success',
        title: "Update Data success",
      });
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Failed to update data.',
      });
    },
  });
}




function deleteData(id) {

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Delete"
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
        type: "GET",
        dataType: "json",
        url: "data/delete/" + id,
        success: function (data) {

          clearData();
          create();


          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        },
        error: function () {

          Swal.fire({
            title: "Error!",
            text: "There was an issue deleting the file.",
            icon: "error"
          });
        }
      });
    }
  });
}


function status(id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/data/status/" + id,
        success: function (data) {
            clearData();
            create();


            if (data.status == 1) {
                        swal.fire(
                        {
                            title: 'Status Changed to Active',
                            icon: 'success'
                        })
                    } else {
                        swal.fire(
                        {
                            title: 'Status Changed to Inactive',
                            icon: 'success'
                        })
                    }


        },
    });
}

</script>

</body>
</html>
