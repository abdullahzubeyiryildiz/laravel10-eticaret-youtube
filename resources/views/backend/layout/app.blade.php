<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Yönetim Paneli</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('backend')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('backend')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{asset('backend')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend')}}/css/vertical-layout-light/style.css">
  <link href="{{asset('backend/css/bootstrap-toggle.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('backend/css/alertify.min.css')}}"/>
  {{--<link rel="stylesheet" href="{{asset('backend/css/alertify-bootstrap.min.css')}}"/>--}}
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('customcss')
</head>
<body>
  <div class="container-scroller">

    @include('backend.inc.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->

    @include('backend.inc.sidebar')
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('backend.inc.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('backend')}}/js/jquery.min.js"></script>
  <script src="{{asset('backend')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('backend')}}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{asset('backend')}}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{asset('backend')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{asset('backend')}}/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('backend')}}/js/off-canvas.js"></script>
  <script src="{{asset('backend')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('backend')}}/js/template.js"></script>
  <script src="{{asset('backend')}}/js/settings.js"></script>
  <script src="{{asset('backend')}}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('backend')}}/js/dashboard.js"></script>
  <script src="{{asset('backend')}}/js/Chart.roundedBarCharts.js"></script>

    <script src="{{asset('backend')}}/js/file-upload.js"></script>



<script src="{{asset('backend/js/bootstrap-toggle.min.js')}}"></script>

<script src="{{asset('backend/js/alertify.min.js')}}"></script>
<script src="{{asset('backend')}}/js/chart.js"></script>

    @yield('customjs')



<script>
 alertify.set('notifier','position', 'top-right');
$(document).on("click",".deleteImage",function(e) {
           e.preventDefault();
           $this = $(this);
           let model = $.trim($(this).closest('.item').attr('data-model'));
           let image_id = $.trim($(this).closest('.item').attr('data-image_no'));
           let id = $.trim($(this).closest('.item').attr('data-id'));
           alertify.confirm('Bu Veri Silinecek', 'Onayladıktan sonra geri alınamaz. Emin misiniz?', function(){

               $.ajax({
                   type:'DELETE',
                   url: "{{route('panel.image.resimsil')}}",
                   headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                   data: {
                       id:id,
                       image_id:image_id,
                       model:model
                   },
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(response) {
                       $this.closest('.item').remove();
                       alertify.success('Başarıyla Silindi');
                   }
               });

           }, function(){
            alertify.error('Silme İşlemi İptal Edildi');
           }).set('labels', {
               ok:'Onayla',
               cancel:'İptal'
           });
       });

       $(document).on('change', '.vitrinBtn', function(){
                $('.vitrinBtn').prop('checked',false);
                $(this).prop('checked',true);
                let model = $.trim($(this).closest('.item').attr('data-model'));
                let image_id = $.trim($(this).closest('.item').attr('data-image_no'));
                let id = $.trim($(this).closest('.item').attr('data-id'));
                $.ajax({
                    url:  "{{route('panel.vitrin.yap')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        model:model,
                        image_id:image_id,
                    },
                    beforeSend: function() {

                    },
                    success: function (response) {
                        alertify.success('Başarıyla Vitrin Güncellendi');
                    },
                    complete: function() {

                    },
                    error: function (data) {

                    }
                });
        });
</script>


  <!-- End custom js for this page-->
</body>

</html>

