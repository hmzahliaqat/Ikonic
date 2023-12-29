<template>


<div class="col-lg-12">
        <div class="">
            <div class="card-body">
                <div>
                    <button v-if="user!=''" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#exampleModalFullscreen">Create Feedback</button>

                        <div v-if="user.role==1" class="card-body" style="background-color:white; width:100%; margin-top:50px; ">
                        <ul  class="nav nav-pills nav-justified" role="tablist">
                                            <li @click="feedbackAct()" class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Feedbacks</span>
                                                </a>
                                            </li>
                                            <li @click="userAct()" class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Users</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1"
                        aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <form @submit.prevent="create()" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalFullscreenLabel">Create Feedback</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">

                                                <div class="card-body">
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input"
                                                            class="col-md-2 col-form-label">Name</label>
                                                        <div class="col-md-10">
                                                            <input v-model="feedback.feedbackname" class="form-control" type="text"
                                                                placeholder="Enter Feedback Name" name="feedbackname" id="example-text-input">
                                                                <p style="color: red;" v-if="error.feedbackname">You must enter name</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input"
                                                            class="col-md-2 col-form-label">Discription</label>
                                                        <div class="col-md-10">
                                                            <textarea v-model="this.feedback.discription" class="form-control" rows="4" cols="4"
                                                                placeholder="Give a discripton about your feedback!"
                                                                id="example-text-input"></textarea>
                                                                <p style="color: red;" v-if="error.discription">Enter discription about your feebback</p>

                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-2 col-form-label">Category</label>
                                                        <div class="col-md-10">
                                                            <select v-model="this.feedback.category" class="form-select">
                                                                <option>Select</option>
                                                                <option value="bugreport">bug Report</option>
                                                                <option value="featurerequest">feature Request</option>
                                                                <option value="improvements">Improvements</option>
                                                            </select>

                                                        </div>
                                                        <p style="color: red;" v-if="error.category">Please select category</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal">Save
                                        changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </form>
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div> <!-- end preview-->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->







<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Feedbacks</h4>

                    <h2 v-if="user.role==1" style="color: black">Admin</h2>



                </div>
            </div>
        </div>
        <!-- end page title -->







  <!-- feedback -->
  <div v-if="UsersActive" class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div  class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle"> ID</th>
                                        <th class="align-middle"> Name</th>
                                        <th class="align-middle">Email</th>

                                        <th v-show="user.role==1" class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(items,index) in usersAc" >

                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#
                                            {{ items.id  }}
                                        </a> </td>
                                        <td>
                                            {{ items.name }}

                                        </td>



                                        <td>
                                           {{ items.email }}

                                        </td>


                                        <td>
                                            <div class="d-flex gap-3">

                                                <a v-show="user.role==1" @click="deleteUser(items.id)" href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <pagination
        :data="feedbacks"
        @pagination-change-page="fetch"
    />

                    </div>
                </div>
            </div>
        </div>




        <!-- feedback -->
        <div v-if="feedbackActive" class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div  class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle"> ID</th>
                                        <th class="align-middle">Feedback Name</th>
                                        <th class="align-middle">Discription</th>
                                        <th class="align-middle">Category</th>
                                        <th class="align-middle">Submitted By</th>
                                        <th class="align-middle">Votes</th>
                                        <th class="align-middle">Details</th>
                                        <th v-show="user.role==1" class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(items,index) in feedbacks.data" >

                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#
                                            {{ items.id  }}
                                        </a> </td>
                                        <td>
                                            {{ items.feedbackname }}

                                        </td>
                                        <td>
                                            {{ items.discription }}

                                        </td>
                                        <td>
                                            <span v-if="items.category==='bugreport'" class="badge badge-pill badge-soft-danger font-size-12"> {{ items.category }}</span>
                                            <span v-else-if="items.category==='improvements'" class="badge badge-pill badge-soft-warning font-size-12"> {{ items.category }}</span>
                                            <span v-else-if="items.category==='featurerequest'" class="badge badge-pill badge-soft-info font-size-12"> {{ items.category }}</span>



                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-warning font-size-12">{{ items.name }}</span>
                                        </td>
                                        <td>



                                           {{ items.vote }}
                                        </td>
                                        <td>
                                            <!-- <button @click="feedbackInfo(items.id)" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalScrollable">view</button> -->
                                            <button @click="feedbackInfo(items.id)" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen2">Details</button>

                                        </td>


                                        <td>
                                            <div class="d-flex gap-3">

                                                <a v-show="user.role==1" @click="deletef(items.id)" href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <pagination v-if="feedbackActive"
        :data="feedbacks"
        @pagination-change-page="fetch"
    />

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->




</div>
<!-- end main content-->

<div class="col-lg-6">
                                <div class="">


                                    <div class="card-body">
                                        <div>

                                            <!-- sample modal content -->
                                            <div id="exampleModalFullscreen2" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div v-show="show" class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalFullscreenLabel">Feedback Details</h5>
                                                          <hr style="padding-left: 15px;">
                                                            <button v-show="itemDetails.comments==0" type="button" class="btn btn-soft-success waves-effect waves-light"><i class="bx bx-check-double font-size-16 align-middle"></i></button>
                                                            <button v-show="itemDetails.comments==1" type="button" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-block font-size-16 align-middle"></i></button>

                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                             <div class="row">
                                <div class="col-12">
                                <div class="card">
                                     <div class="card-body">

                                        <i v-if="voted.length==0" @click="createVote(itemDetails.id)" style="float:right" class="fas fa-thumbs-up"></i>

                                                 <dl class="row mb-0">
                                                <dt class="col-sm-3"> Name</dt>
                                                <dd class="col-sm-9">{{ itemDetails.names }}</dd>
                                                 <dt class="col-sm-3">Discription</dt>
                                                <dd class="col-sm-9">{{ itemDetails.discription }}</dd>
                                                <dd class="col-sm-9 offset-sm-3">Donec id elit non mi porta gravida at eget metus.</dd>

                                                <dt class="col-sm-3">Category</dt>
                                                <dd class="col-sm-9">
                                                    <span v-if="itemDetails.category==='bugreport'" class="badge badge-pill badge-soft-danger font-size-12"> {{ itemDetails.category }}</span>
                                            <span v-else-if="itemDetails.category==='improvements'" class="badge badge-pill badge-soft-warning font-size-12"> {{ itemDetails.category }}</span>
                                            <span v-else-if="itemDetails.category==='featurerequest'" class="badge badge-pill badge-soft-info font-size-12"> {{ itemDetails.category }}</span>

                                                </dd>
                                                </dl>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div><!-- end row -->


                            <!-- <ejs-mention  id='defaultMention' showMentionChar='true' mentionChar='@' target='#mentionElement' :dataSource='usersAll' :fields="target"></ejs-mention> -->

                            <div v-show="iep" class="container mt-5">
    <div class="jumbotron text-center">

      <div class="emoji-container">
        <span @click="emitEmoji('&#x1F60D;')" class="emoji">&#x1F60D;</span>
        <span @click="emitEmoji('&#x1F609;')" class="emoji">&#x1F609;</span>
        <span @click="emitEmoji('>&#x1F604;')" class="emoji">&#x1F604;</span>
        <span @click="emitEmoji('&#x1F605')" class="emoji">&#x1F605;</span>
        <span @click="emitEmoji('&#x1F60E;')" class="emoji">&#x1F60E;</span>
        <span @click="emitEmoji('&#x1F602;')" class="emoji">&#x1F602;</span>
        <span @click="emitEmoji('&#x1F60A;')" class="emoji">&#x1F60A;</span>
        <span @click="emitEmoji('&#x1F60B;')" class="emoji">&#x1F60B;</span>
        <span @click="emitEmoji('&#x1F60F;')" class="emoji">&#x1F60F;</span>
        <span @click="emitEmoji('&#x1F601;')" class="emoji">&#x1F601;</span>
        <!-- Add more emojis as needed -->
      </div>
    </div>
  </div>

                            <form v-if="user!=''" v-show="itemDetails.comments==0" class="ql-container" method="post" >

                                <div  v-show="isv" class="" style="background-color: gray; width: 10%; height: 10vh; overflow: auto;">
                                <div class="" v-for="user in usersAll" >
                                    <h6 @click="emitUser(user.name)" style="border-bottom: 1px solid black; cursor: pointer;">{{ user.name }}</h6>
                             </div>
                                </div>
                                                           <QuillEditor v-if="user.role!=1"  @input="check()" ref="myQuillEditor"  v-model:content="Comment" v-model:name="Comment" contentType="html" placeholder="Write your comment..." toolbar="minimal" theme="snow" />
                                                           <QuillEditor v-else  @input="check()" ref="myQuillEditor"  v-model:content="Comment" v-model:name="Comment" contentType="html" placeholder="Write your comment..." toolbar="full" theme="snow" />

                                                           <div class="col-auto" style="margin-top: 8px; float: right;">

                                                            <button  @click="showEmoji()" type="button" class="btn btn-light chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2"></span><i class="fas fa-smile"></i></button>
                                                            <button @click.prevent="createComment(itemDetails.id)" type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>

                                            </div>




                                                        </form>

                                                        <div v-if="user==''" class="">
                                                 <div class="alert alert-danger" role="alert">
                                              Login Required—Only registered users can post comments!
                                                        </div>
                                                            </div>
                                                            <div v-if="itemDetails.comments==1" class="">
                                                 <div class="alert alert-danger" role="alert">
                                              Comments Are Disabled!
                                                        </div>
                                                            </div>




<div class="container bootstrap snippets bootdey">
    <div style="float:right;" v-show="user.id==itemDetails.created_by">
                                <button @click="disable(itemDetails.id)" v-if="itemDetails.comments==0" type="submit" class="btn btn-danger" data-bs-dismiss="modal">Disable Comments</button>

                                <button @click="enable(itemDetails.id)" v-else style="cursor:pointer;" type="submit" class="btn btn-success cursor-pointer" data-bs-dismiss="modal">Enable Comments</button>

                </div>
    <div class="row">
		<div class="col-md-12">
		    <div class="blog-comment">
				<h3 class="text-success">Comments</h3>

                <hr/>
				<ul v-for="(items,index) in commentsAll" :key="index" v-show="items.feedbackId==itemDetails.id" class="comments">
				<li class="clearfix">
				  <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
				  <div class="post-comments">
				      <p class="meta"> {{ moment(items.created_at).format("DD-MM-YYYY") }} <a href="#">{{ items.name }}</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
				      <p v-html="items.body"></p>
				  </div>
				</li>

				</ul>
			</div>
		</div>
	</div>
</div>




                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div> <!-- end preview-->
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

<!-- END layout-wrapper -->

</template>

<script>
import axios from 'axios';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { QuillEditor } from '@vueup/vue-quill';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
//  import { MentionComponent } from "@syncfusion/ej2-vue-dropdowns";
import moment from "moment";







const $toast = useToast();
    export default {

        components: {
        'pagination': Bootstrap4Pagination,
        'QuillEditor': QuillEditor,
        // 'ejs-mention':MentionComponent,
    },

    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            error: {},
        moment: moment,


            'feedback': {
                'feedbackname': '',
                'discription': '',
                'category': '',
            },
            feedbacks: {},            //All feedbacks are stored in this array
            itemDetails: {},          //Selected item detail
            show: false,
            Comment: '',              //v-model for comment input
            commentsAll: {},          //All comments are stored in this array
            user:{},
            usersAll:{},
            target:{text : 'name'},
            isv:false,
            iep:false,
            voted:{},

            feedbackActive:true,
            UsersActive:false,
            usersAc:{},

        }
    },


watch:{
    Comment(after,before){

if(this.Comment.includes('@')){
        this.users();
        this.isv=true;


}else{
    this.isv=false;
}
}

},

computed: {
    hasAtSymbolComputed() {
      return this.Comment.includes("@");
    },
  },


    methods: {

//  hasVoted(items){

// return

// },


// Create feedback
        create() {
if(this.user!=''){
            axios.post('/create', this.feedback).then(res => {
                this.fetch();
                let instance = $toast.success('Feedback Added!', {
                    position: 'top-right',
                });
            }).catch(error => {
                this.error = error?.response?.data?.errors;
                console.log(error);
                let instance = $toast.error('Something went wrong!', {
                    position: 'top-right',
                });
            })
        }else{
            let instance = $toast.error('Login required', {
                    position: 'top-right',
                });
        }
        },

// Retrieve feedback items
        fetch(page = 1) {
            axios.get('/getFeedbacks?page=' + page).then(res => {
                this.feedbacks = res.data;
                console.log(this.feedbacks);
            }).catch(error => {
                console.log(error);
            })
        },
// Getting detail of single feedback item when detail button is clicked

        feedbackInfo(id) {
            axios.get('/feedbackItem/' + id).then(res => {
                this.itemDetails = res.data;
                this.show = true;
            }).catch(error => {
                console.log(error);
            })


            axios.get('/getVotes/'+id).then(res=>{

                this.voted=res.data;
                console.log(this.voted);
            }).catch(error=>{
                console.log(error);
            })


        },
// Create Comment
        createComment(id) {
            if(this.user!=''){
            axios.post('/createComment/' + id, { 'Comment': this.Comment }).then(res => {
                this.getComments();
                let instance = $toast.success('Comment Posted!', {
                    position: 'top-right',
                });
            }).catch(error => {
                console.log(error);
                let instance = $toast.error('Something Went Wrong!', {
                    position: 'top-right',
                });
            })
        }else{
            let instance = $toast.success('Login required!', {
                    position: 'top-right',
                });
        }
            this.Comment = '';
        },
// Retrieve all comments
        getComments() {
            axios.get('/getComments').then(res => {
                this.commentsAll = res.data;
            }).catch(error => {
                console.log(error);
            })
        },
// Get loggedIn user
        getAuth(){
            axios.get('/getAuthUser').then(res=>{
                this.user=res.data;
                console.log(this.user)
                       }).catch(error=>{
                console.log(error);
            })
        },

//Create Vote
createVote(id){
    if(this.user!=''){
    axios.post('/createVote/'+id).then(res=>{
this.fetch();
this.feedbackInfo(id);
    }).catch(error=>{
        console.log(error);
    })
}else{
    let instance = $toast.error('Login required to vote', {
                    position: 'top-right',
                });
}
},
//get other users

users(){
    axios.get('/getOtherUsers').then(res=>{
this.usersAll=res.data;

    }).catch(error=>{
        console.log(error);
    })
},

deletef(id){
                axios.post('delFeedback/'+id).then(res=>{
                    this.fetch();
                    let instance = $toast.error('Task Deleted!', {
                    position: 'top-right',
                });
                }).catch(error=>{
                    console.log(error);
                })
            },

//disable comments
disable(id){
    axios.post('/disable/'+id).then(res=>{
this.feedbackInfo();
let instance = $toast.warning('Comments for this feedback are disabled!', {
                    position: 'top-right',
                });
    }).catch(error=>{
        console.log(error);
    })
},

//enable comments
enable(id){
    axios.post('/enable/'+id).then(res=>{
        this.feedbackInfo();
        let instance = $toast.info('Comments for this feedback are enabled!', {
                    position: 'top-right',
                });
    }).catch(error=>{
        console.log(error);
    })
},

check() {
      this.hasAtSymbol = this.Comment.includes("@");
    },

    emitUser(name){
        // console.log(name);
        this.isv=false;
        this.Comment += name;


    },

    showEmoji(){
this.iep=true;

    },

    emitEmoji(emoji){
this.Comment+=emoji;
this.iep=false;
    },

feedbackAct(){
this.feedbackActive=true;
this.UsersActive=false;
},

userAct(){
    this.feedbackActive=false;
this.UsersActive=true;
},

getUsers(){
                axios.get('/getUsers').then(res=>{
                    this.usersAc=res.data;
                }).catch(error=>{
                    console.log(error);
                })
            },

            deleteUser(id){
                axios.post('delUsers/'+id).then(res=>{
                    this.getUsers();
                }).catch(error=>{
                    console.log(error);
                })
            },

    },



    mounted() {
        this.fetch();
        this.getComments();
        this.getAuth();
        this.users();
        this.getUsers();

        console.log('Component mounted.')
    }
    }
</script>
<style>


</style>
