@extends('admin.layouts.master')
@section("title") Modules - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                <span class="font-weight-bold mr-2">Modules</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <button type="button" class="btn btn-secondary btn-labeled btn-labeled-left" id="uploadNewModuleBtn">
                <b><i class="icon-plus2"></i></b>
                Upload Module
                </button>
            </div>
        </div>
    </div>
</div>
<script>
	$('#uploadNewModuleBtn').click(function(event) {
		$('#moduleUploadBlock').toggle(500);
	});
</script>

<div class="content">
    <div class="col-md-12" id="moduleUploadBlock" style="display: none;">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.uploadModuleZipFile') }}" enctype="multipart/form-data"  class="dropzone" id="module_uploader">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<div class="table-responsive">
            	    <table class="table">
            	        <thead>
            	            <tr>
            	                <th>Name</th>
            	                <th>Version</th>
            	                <th>Installed At</th>
            	                <th>Module Updated At</th>
            	                <th>Settings Updated At</th>
            	                <th class="text-center"><i class="
            	                    icon-circle-down2"></i></th>
            	            </tr>
            	        </thead>
            	        <tbody>
            	            @foreach ($modules as $module)
            	            {{-- {{ dd($module) }} --}}
            	            <tr>
            	                <td><strong>{{ $module->name }}</strong></td>
            	                <td><span class="badge badge-flat border-grey-800 text-default text-capitalize">
            	                	<strong>{{ $module->version }}</strong></span></td>
            	                <td>{{ $module->created_at->diffForHumans() }}</td>
            	                <td>{{ \Carbon\Carbon::parse($module->update_date)->diffForHumans() }}</td>
            	                <td>{{ $module->updated_at->diffForHumans() }}</td>
            	                <td class="text-center">
            	                	@if($module->is_active)
            	                	<a href="{{ route('admin.enableModule', $module->id) }}"
            	                        class="btn btn-primary btn-labeled btn-labeled-left btn-sm enDisBtn"  data-popup="tooltip" title="Double Click to Disable" data-placement="left">
                            			<b><i class="icon-checkmark ml-1"></i></b>
									Enabled
                            		</a>
                            		@else
            	                    <a href="{{ route('admin.disableModule', $module->id) }}"
            	                        class="btn btn-danger btn-labeled btn-labeled-left btn-sm enDisBtn"  data-popup="tooltip" title="Double Click to Enable" data-placement="left">
                            			<b><i class="icon-cross3 ml-1"></i></b>
									Disabled
                            		</a>
                            		@endif
            	                    <a href="{{ route($module->settings_path) }}"
            	                        class="btn btn-primary btn-labeled btn-labeled-left btn-sm">
                            			<b><i class="icon-gear ml-1"></i></b>
                            			Settings
                            		</a>
            	                </td>
            	            </tr>
            	            @endforeach
            	        </tbody>
            	    </table>
            	</div>
            </div>
        </div>
    </div>
</div>

<div id="installingModule" class="modal fade mt-5" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-3">
                <h5 class="modal-title"><span class="font-weight-bold"><i class="icon-spinner10 spinner mr-1"></i> Module is getting installed. Please Wait...</span></h5>
            </div>
        </div>
    </div>
</div>

<script>
    Dropzone.autoDiscover = false;
    
    $(function() {
    var myDropzone =  $("#module_uploader").dropzone({
           paramName: "file", // The name that will be used to transfer the file
           maxFilesize: 50, // MB
           maxFiles: 1,
           dictDefaultMessage: 'Drag & Drop <strong>UPLOAD-THIS-MODULE.zip</strong> file',
           autoProcessQueue: false,
           acceptedFiles: '.zip',
           init: function() {
               this.on('addedfile', function(file){
                   if (this.fileTracker) {
                   this.removeFile(this.fileTracker);
               }
                   this.fileTracker = file;
               });
       
               var dropzone = this;
       
               //when file added or dropped, process the file for auto-upload
               dropzone.on("addedfile", function(file) {
                   if (file.name == "UPLOAD-THIS-MODULE.zip") {
                       $.jGrowl("Uploading file please wait...", {
                           position: 'bottom-center',
                           header: 'File Added ✅',
                           theme: 'bg-success',
                           life: '1800'
                       }); 
                       setTimeout(function() {
                           dropzone.processQueue();
                       }, 2200);
                   }
               });
       
               //on upload success to server's filesystem, show popup
               dropzone.on("success", function(file) {
                   setTimeout(function() {
                       dropzone.removeFile(file);
                       $('#installingModule').modal({
                           backdrop: 'static',
                           keyboard: false
                       });
                       setTimeout(function() {
                       		window.location = "module/install";
                       }, 500);
                   }, 500);
                   
               });
               //if anything goes wrong during upload, show error message and remove file
               dropzone.on("error", function(file, errorMessage, xhr) {
                   dropzone.removeFile(file);
                   console.log(errorMessage);
                   $.jGrowl("Server Error. Check the console for full log.", {
                       position: 'bottom-center',
                       header: 'Wooopsss ⚠️',
                       theme: 'bg-warning',
                       life: '5000'
                   }); 
               });
           },
           accept: function(file, done) {
               //if file name is UPLOAD-THIS.zip then accept the file
               if (file.name == "UPLOAD-THIS-MODULE.zip") {
                   done();
               }
               else {
                   //else remove the file and show error message
                   this.removeFile(file);
                   $(function () {
                       $.jGrowl("This seems to be an incorrect file. Please get the 'UPLOAD-THIS-MODULE.zip' file.", {
                           position: 'bottom-center',
                           header: 'Wooopsss ⚠️',
                           theme: 'bg-warning',
                           life: '5000'
                       });    
                   });
                   done();
               }
           },
           success: function(file, response) 
           {
               console.log(response);
           },
           error: function(file, response)
           {
              return false;
           }
       });
    
           $('.select').select2({
               minimumResultsForSearch: Infinity,
           });
       
         if (Array.prototype.forEach) {
                  var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery-primary'));
                  elems.forEach(function(html) {
                      var switchery = new Switchery(html, { color: '#2196F3' });
                  });
              }
              else {
                  var elems = document.querySelectorAll('.switchery-primary');
                  for (var i = 0; i < elems.length; i++) {
                      var switchery = new Switchery(elems[i], { color: '#2196F3' });
                  }
              }
       
          $('.form-control-uniform').uniform();
    
          $(".colorpicker-show-input").spectrum({
            showInput: true
          });
			
			$('.enDisBtn').dblclick(function(event) {
				$(this).addClass('pointer-none');
              	window.location = this.href;
              	return false;
			}).click(function(event) {
				return false;
			});;
    });
    
</script>
@endsection