<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->

            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                <div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Tools/Compass.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                </div>
                <div class="alert-text text-primary">
                    Admin Profiles.
                </div>

                <div class="text-right">
                    <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#adminModal" @click="getMode('add')">
                    <span class="svg-icon">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
                            <g stroke="none" stroke-width="1" fill="none"
                               fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15"
                                        r="6"></circle>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                      fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Add Admin</button>
                </div>
            </div>


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title" style="margin-bottom: -18px;">
                        <div class="alert alert-custom gutter-b" role="alert">
                            <div class="alert-icon align-self-start mt-1">
                                <i class="flaticon2-layers-1 text-primary"></i>
                            </div>
                            <div class="alert-text">ALL ADMINS</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">

                                <table class="table table-hover mb-6">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(admin,index) in admins.data" :key="admin.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{admin.name}}</td>
                                        <td>{{admin.email}}</td>
                                        <td>{{parseInt(admin.user_type) === 1 ? 'Normal Admin' : 'Merge Admin'}} </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit Admin"
                                               data-toggle="modal" data-target="#adminModal" @click="getAdmin(admin)">
                                                <i class="la la-edit"></i></a>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete Admin"
                                               @click="deleteAdmin(admin)">
                                                <i class="la la-trash"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            &emsp;&emsp;
                            &emsp;&emsp;

                        </div>
                    </div>
                    <!--end::Example-->
                </div>

                <div class="card-footer">
                    <pagination :data="admins" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div>
            </div>



            <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" v-if="mode == 'add'">Add A New Admin</h5>
                            <h5 class="modal-title" id="exampleModalLabel" v-if="mode == 'edit'">Edit {{admin.name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <form action="" @submit.prevent="registerAdmin">
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"
                                               class="form-control form-control-solid" v-debounce:4s="checkUserDetails"
                                               v-model="form.email" placeholder="Enter User Email" :disabled="emailDisabled">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" v-model="form.name" class="form-control form-control-solid"
                                               placeholder="Wait to display" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control form-control-solid" v-model="form.role">
                                            <option value="1">Normal Admin</option>
                                            <option value="2">Merge Admin</option>
                                        </select>
                                    </div>
                                    <!--end: Code-->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success font-weight-bold"
                                :disabled="submitBtnDisabled">{{mode == 'add' ? 'Submit' : 'Update'}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</template>

<script>
    export default {
        data() {
            return {
                mode: '',
                admin: {},
                admins: {},
                submitBtnDisabled: true,
                emailDisabled: false,
                form : new Form({
                    email : '',
                    name : '',
                    role : '',
                })
            }
        },

        methods: {
            myAdmins()
            {
                axios.get('/api/admin/manage-admin')
                    .then(result=>{
                        this.admins = result.data.admins;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },

            checkUserDetails(val, e) {
                let loader = this.$loading.show();
                // console.log(val) // => The value of the input
                // console.log(e) // => The event object
                axios.post('/api/admin/manage-admin', {'email' : val})
                    .then(result=>{
                        if(result.data)
                        {
                            this.admin = result.data;
                            this.form.name = result.data.name;
                            toastr.success("Email merged with ("+this.form.name+").");
                            this.submitBtnDisabled = false;
                        }else{
                            toastr.error("Error! "+val+". Check the details and try again.");
                        }
                        loader.hide();
                    })
                    .catch(()=>{
                        toastr.error("Admin management failed. Please try again.");
                        // location.reload();
                        loader.hide();
                    });
            },

            registerAdmin()
            {
                this.$Progress.start();
                this.form.put('/api/admin/manage-admin/'+this.admin.id)
                    .then(result=>{
                        if(this.mode == 'add')
                        {
                            toastr.success(result.data.name+" added successfully.");
                        }else{
                            toastr.success(result.data.name+" updated successfully.");
                        }
                        Fire.$emit('ReloadAdmins');
                        this.form.reset();
                        $('#adminModal').modal('hide');
                        $('.modal-backdrop').remove();
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        toastr.error("Oops!... An error just occurred, please try again.");
                        this.$Progress.fail();
                    });
            },

            getMode(mode)
            {
                this.mode = mode;
            },

            getAdmin(admin)
            {
                this.mode = 'edit';
                this.admin = admin;
                this.form.name = admin.name;
                this.form.email = admin.email;
                this.form.role = admin.user_type;
                this.submitBtnDisabled = false;
                this.emailDisabled = true;
            },

            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/manage-admin?page=' + page)
                    .then(result => {
                        this.admins = result.data.admins;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },

            deleteAdmin(admin)
            {
                Swal.fire({
                    title: "Delete "+admin.name+"?",
                    text: "You can always add later.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.delete('/api/admin/manage-admin/'+admin.id)
                            .then(result=>{
                                toastr.success("Admin deleted successfully.");
                                Fire.$emit('ReloadAdmins');
                                this.$Progress.finish();
                            })
                            .catch(()=>{
                                toastr.error("Oops!... An error just occurred, please try again.");
                                this.$Progress.fail();
                            })

                        // result.dismiss can be "cancel", "overlay",
                        // "close", and "timer"
                    } else if (result.dismiss === "cancel") {
                        Swal.fire(
                            "Cancelled",
                            "Process Terminated.",
                            "error"
                        )
                    }
                });
            }

        },

        created() {
            this.$Progress.start();
            this.myAdmins();
            Fire.$on('ReloadAdmins', ()=>{
                if(this.admins.current_page > 1)
                {
                    this.getResults(this.admins.current_page);
                }else{
                    this.myAdmins();
                }
            });

        }
    }
</script>

<style>
    #my-strictly-unique-vue-upload-multiple-image {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }

    h1, h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }

    .image-container{
        width: 100% !important;
    }

</style>