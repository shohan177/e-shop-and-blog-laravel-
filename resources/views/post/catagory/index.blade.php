@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Basic Tables</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Basic Tables</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">All Catagory</h4>
                            </div>
                            <div class="col">
                                <form id="catagory_form" action="" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-8">
                                            <input name="name" class="form-control" type="text" placeholder="Catagory name">

                                        </div>
                                        <div class="col">
                                            <input type="submit" value="Add" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="cat_table">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Main Wrapper -->

</div>

@endsection
