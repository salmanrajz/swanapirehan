<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    {{-- <x:notify-messages /> --}}

</head>
<body>

<div class="container" style="background:#05b3dc">
  <form>
            <h1 class="text-center center">
                man 0779 9'10
            </h1>
  <div class="form-row" style="padding:2px;">
    <div class="col">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col">
      <input type="password" class="form-control" placeholder="Enter password" name="pswd">
    </div>
  </div>
  <div class="form-row"  style="padding:2px;">
    <div class="col">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col">
      <input type="password" class="form-control" placeholder="Enter password" name="pswd">
    </div>
  </div>
  <div class="">
      <div class="area">
    <input type="file" id="upload" />
</div>
  </div>
</form>


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Modal -->


<script type="text/javascript">

  function BookNum(id,number,e) {
    Swal.fire({
        title: 'Do you want to resever this number?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Confirm`,
        // denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            // Swal.fire('Saved!', '', 'success')
            var url = $("#url").val();
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id:id,
                    // Channel: Channel,
                },
                success: function (data) {
                    // alert(data);
                    // location.reload();
                    if(data == 1){
                        // window.location.href = redirect_url;
                        // alert(data.success);
                        location.reload();
                    }
                    else if(data == 2)
                    {
                        alert("You already crossed Limit");
                    }
                    else{
                        alert(data.success);
                        // alert("Number Already Booked");
                    }

                    // $("#ReportingData").html(data);
                }
            });
        }
    });

}
  function RevNum(id,number,e) {
     Swal.fire({
         title: 'Do you want to Revive this number?',
         // showDenyButton: true,
         showCancelButton: true,
         confirmButtonText: `Confirm`,
         // denyButtonText: `Don't save`,
     }).then((result) => {
         /* Read more about isConfirmed, isDenied below */
         if (result.isConfirmed) {
             var url = $("#resurl").val();
             // Swal.fire('Saved!', '', 'success')
             $.ajax({
                 type: 'POST',
                 url: url,
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                 data: {
                     id: id,
                     number: number,
                 },
                 success: function (data) {
                     // alert(data);
                     location.reload();

                     // $("#ReportingData").html(data);
                 }
             });
         }
     });

}
function MWHModal(id,number,channel_type,e){
    var url = $("#LoadActiveFormMWHUrl").val();
    // alert(console.log());
    // var url = $("#url").val();
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id:id,
                    number: number,
                    channel_type: channel_type,
                },
                success: function (data) {
                    // alert(data);
                    // location.reload();
                    $("#exampleModal").modal();
                    // setTimeout(() => {
                    $("#ModalMWH").html(data);

                    // $("#ReportingData").html(data);
                }
            });

    // }, 4000);

}
</script>
<style>
    .area {
    width: 100%;
    height: 300px;
    position: relative;
    /* border: 4px dashed #000; */
    background-image: url("ad/drop.jpeg");
    background-position: center;
    background-size: cover;
    /* background-repeat: no-repeat; */
    /* background-size: 64px 64px; */
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    filter: alpha(opacity=50);
    -khtml-opacity: 0.5;
    -moz-opacity: 0.5;
    opacity: 0.5;
    text-align: center;
}

.area input {
    width: 400%;
    height: 100%;
    margin-left: -300%;
    border: none;
    cursor: pointer;
}

.area input:focus {
    outline: none;
}

.area .spinner {
    display: none;
    margin-top: 50%;
}

.area:hover,
.area.dragging,
.area.uploading {
    filter: alpha(opacity=100);
    -khtml-opacity: 1;
    -moz-opacity: 1;
    opacity: 1;
}

.area.uploading {
    background: none;
}
</style>

</html>
