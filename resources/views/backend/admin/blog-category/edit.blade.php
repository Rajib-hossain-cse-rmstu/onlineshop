@extends('backend.master')
@section('css')
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('admin_dashboard_content')

    <div class="row">

        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h5>Blog Category</h5> 
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <a class="btn btn-outline-info float-left" href="">Category List</a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 float-right">

                                    </div>      
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form class="m-3" action="" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Category Name :<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="name" name="name" value="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Category Description :<span class="text-danger"> *</span></label>
                                                <textarea id="summernote1" name="description" class="form-control" id="description" class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="summary" class="form-label">Category Summary :<span class="text-danger"> *</span></label>
                                                <textarea id="summernote2" name="summary" class="form-control" id="summary"
                                                    ></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="is_parent" class="form-label">Is Parent :<span class="text-danger"> * </span></label>
                                                <input type="checkbox" name="is_parent" id="is_parent" value="1" checked>Yes
                                            </div>

                                            <div class="input-group mb-3 d-none" id="parent_cat_div">
                                                <label for="category_name" class="form-label">Parent Category :<span class="text-danger"> *</span></label>
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="category_name">Options</label>
                                                </div>
                                                <select name='parent_id' class="custom-select" id="category_name">
                                                    <option selected disabled>Choose Parent Category</option>

                                                    <option value=""></option>

                                                </select>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="input-group mb-3">
                                                    <label for="status" class="form-label">Category Status :<span class="text-danger"> *</span></label>
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="status">Options</label>
                                                        </div>
                                                        <select name='status' class="custom-select" id="status">
                                                            <option selected>Choose...</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Category Photos :<span class="text-danger"> *</span></label>
                                                            <input type="file" class="form-control" id="photo" name="photo">
                                                        </div>
                                                    </div>
                                            </div>

                                            <button type="reset" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
        <!-- [ Main Content ] end -->
@endsection

@push('scripts')
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote({
                height : 200,
            });
            $('.dropdrown-toggle').dropdown();   
        });
        $(document).ready(function() {
            $('#summernote2').summernote({
                height : 200,
            });
            $('.dropdrown-toggle').dropdown();   
        });
    </script>
    <script>
        $('#is_parent').change(function (e){
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }else{
                $('#parent_cat_div').removeClass('d-none');
            }
        });
    </script>
@endpush