<template>
  <div class="col-xl-12">
                                <div class="card">


                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Users</span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Feedbacks</span>
                                                </a>
                                            </li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="home-1" role="tabpanel">


                                                <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Users</h4>

                    <div class="page-title-right">

                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>

                                        <th class="align-middle">UserName</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="items in users">

                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{ items.name }}</a> </td>
                                        <td>{{ items.email }}</td>

                                        <td>
                                            <div class="d-flex gap-3">
                                                <!-- <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                                                <a @click="delete(items.id)" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- pagination -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>





















                                            </div>
                                            <div class="tab-pane" id="profile-1" role="tabpanel">




                                                <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Feedbacks</h4>

                    <div class="page-title-right">

                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>

                                        <th class="align-middle">UserName</th>
                                        <th class="align-middle">Discription</th>
                                        <th class="align-middle">Category</th>
                                        <th class="align-middle">Votes</th>
                                        <th class="align-middle">Action</th>



                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="items in feedbacks">

                                        <td><a  class="text-body fw-bold">{{ items.name }}</a> </td>
                                        <td>{{ items.discription }}</td>
                                        <td>{{ items.category }}</td>
                                        <td>{{ items.vote }}</td>


                                        <td>
                                            <div class="d-flex gap-3">
                                                <!-- <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
                                                <a @click="deletef(items.id)" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- pagination -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>




                                            </div>

                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
</template>

<script>
        import { Bootstrap4Pagination } from 'laravel-vue-pagination';

    export default {

        data(){
            return{
users:{},
feedbacks:[],
            }
        },

        methods:{



             fetch() {
            axios.get('/getFeed').then(res => {
                this.feedbacks = res.data;
                console.log(this.feedbacks);
            }).catch(error => {
                console.log(error);
            })
        },

        },





        mounted() {
            console.log('Component mounted.');
            this.getUsers();
            this.fetch();
        }
    }
</script>
