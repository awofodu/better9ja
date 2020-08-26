<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title" style="margin-bottom: -18px;">
                        <div class="alert alert-custom gutter-b" role="alert">
                            <div class="alert-icon align-self-start mt-1">
                                <i class="flaticon2-layers-1 text-primary"></i>
                            </div>
                            <div class="alert-text">ALL INVESTORS</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-4 my-2 my-md-0">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search..."
                                   @keyup.enter="searchInvestor" v-model="search">
                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                        </div>
                    </div>
                    <br>

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
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(user,index) in users.data" :key="user.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{user.name}}</td>
                                        <td>{{user.email}}</td>
                                        <td>
                                            <a :href="'tel:'+user.phone">{{user.phone}}</a>
                                        </td>
                                        <td>
                                        <span class="label label-inline label-light-primary font-weight-bold"
                                              v-if="parseInt(user.is_activated) === 1 && parseInt(user.is_blocked) === 0">
                                            Active</span>
                                            <span class="label label-inline label-light-warning font-weight-bold"
                                                  v-if="parseInt(user.is_activated) === 1 && parseInt(user.is_blocked) === 1">
                                            Suspended</span>
                                            <span class="label label-inline label-light-danger font-weight-bold"
                                                  v-if="parseInt(user.is_activated) === 0 && !user.proof_document">Not Active</span>
                                            <span v-if="parseInt(user.is_activated) === 0 && user.proof_document">
                                            <button type="button" class="btn btn-primary font-weight-bold"
                                                    @click="viewProof(user)">View Proof</button>
                                        </span>

                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                               data-toggle="modal" data-target="#userModal" @click="getUser(user)">
                                                <i class="la la-eye"></i></a>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit User"
                                               data-toggle="modal" data-target="#editUserModal" @click="editUser(user, user.bank)">
                                                <i class="la la-edit"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- Modal-->
                            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Investor Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span><b>Name: </b>{{user.name}}</span><br><br>
                                                    <span><b>Phone: </b><a :href="'tel:'+user.phone">{{user.phone}}</a>
                                                    </span><br><br>
                                                    <span><b>Referred By: </b>
                                                        {{user.referrer ? user.referrer.name : 'Null'}}</span><br><br>
                                                    <span><b>No of Referral: </b>
                                                        {{user.referrals ? user.referrals.length : 'Null'}}</span><br><br>
                                                    <span><b>Guider: </b>
                                                        {{user.guider ? user.guider.name : 'Null'}}</span><br><br>
                                                    <span>Status:
                                                    <span class="label label-inline label-light-primary font-weight-bold"
                                                          v-if="parseInt(user.is_activated) === 1">Active</span>
                                                            <span class="label label-inline label-light-danger font-weight-bold"
                                                          v-else>Not Active</span>
                                                    </span><br><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span><b>Email: </b>{{user.email}}</span><br><br>
                                                    <span><b>User Type: </b>{{user.is_guider == 1 ? 'Guider' : 'Regular'}}</span><br><br>
                                                    <span><b>Bank Name: </b>
                                                        {{user.bank ? user.bank.bank_name : 'Null'}}</span><br><br>
                                                    <span><b>Account Name: </b>
                                                        {{user.bank ? user.bank.account_name : 'Null'}}</span><br><br>
                                                    <span><b>Account Number: </b>
                                                        {{user.bank ? user.bank.account_number : ''}}</span><br><br>
                                                    <span><b>Support Pin: </b>{{user.support_pin}}</span><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="vld-parent" ref="formContainer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-warning font-weight-bold"
                                                @click="suspendUser(user, 'suspend')" v-if="user.is_blocked == 0">Suspend</button>
                                                <button type="button" class="btn btn-primary font-weight-bold"
                                                @click="suspendUser(user, 'activate')" v-else>Activate</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &emsp;&emsp;




                            <!-- Modal-->
                            <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form class="form">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control form-control-solid"
                                                                       v-model="form.name" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control form-control-solid"
                                                                       v-model="form.email" placeholder="email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control form-control-solid"
                                                                       v-model="form.phone" placeholder="Phone Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control form-control-solid"
                                                                       v-model="form.address" placeholder="Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Bank Name</label>
                                                                <select class="form-control form-control-solid" v-model="form.bank_code">
                                                                    <option :value="bank.code" v-for="bank in banks.data"
                                                                            :key="bank.id">{{bank.name}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Account Name</label>
                                                                <input type="text" class="form-control form-control-solid" disabled
                                                                       v-model="form.account_name" placeholder="Account Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Account Number</label>
                                                                <input type="number" class="form-control form-control-solid"
                                                                       v-debounce:4s="checkAccountDetails"
                                                                       v-model="form.account_number"
                                                                       placeholder="Account Number"
                                                                       oninput="javascript:if(this.value.length > this.maxLength)
                                                           this.value = this.value.slice(0, this.maxLength);" :maxlength="10">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="vld-parent" ref="formContainer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary font-weight-bold"
                                                        @click="updateUser(user)">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &emsp;&emsp;

                            <!-- Modal-->
                            <div class="modal fade" id="proofModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Payment Proof</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12" v-if="form.proof_document">
                                                    <div v-swiper:mySwiper="swiperOptions">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide" :key="proof" v-for="proof in form.proof_document">
                                                                <img :src="'/uploads/'+proof" width="100%">
                                                            </div>
                                                        </div>
                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="vld-parent" ref="formContainer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-secondary font-weight-bold"
                                                        @click="activateUser">Activate</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &emsp;&emsp;

                        </div>
                    </div>
                    <!--end::Example-->
                </div>

                <div class="card-footer">
                    <pagination :data="users" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div>
            </div>
            <!--end::Card-->
            <!--end: Code-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</template>

<script>
    import VueImageLightboxCarousel from 'vue-image-lightbox-carousel'
    export default {
        components: {
            VueImageLightboxCarousel,
        },

        data() {
            return {
                swiperOptions: {
                    pagination: {
                        el: '.swiper-pagination'
                    },
                },
                referrals: {},
                users: {},
                bonus: '',
                banks: {},
                referral_link: '',
                price: '',
                user: '',
                search: '',
                form : new Form({
                    id : '',
                    name : '',
                    email : '',
                    phone : '',
                    address : '',
                    photo : '',
                    support_pin : '',
                    account_number : '',
                    account_name : '',
                    bank_name : '',
                    bank_code : '',
                    proof_document : [],
                })
            }
        },

        methods: {
            allInvestors() {
                axios.get('/api/admin/investors')
                    .then(result => {
                        // this.referrals = result.data.referrals;
                        this.users = result.data.users;
                        this.banks = result.data.banks;
                        // this.bonus = result.data.bonus;
                        // this.earnings = result.data.earnings;
                        // this.referral_link = 'https://better9ja.localhost/register/' + this.user.referral_id;
                        this.$Progress.finish();
                    })
                    .catch((err) => {
                        toastr.error('Oops... An error just occurred, kindly reload the page.');
                        this.$Progress.fail();
                    });
            },


            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/investors?page=' + page)
                    .then(result => {
                        this.users = result.data.users;
                        this.banks = result.data.banks;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        toastr.error('Oops... An error just occurred, please reload your page.');
                        this.$Progress.fail();
                    });
            },

            getUser(user)
            {
                this.$Progress.start();
                this.user = user;
                this.$Progress.finish();
            },

            suspendUser(user, mode)
            {
                swal.fire({
                    title: "Are you sure?",
                    html: "Do you want to continue?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Continue!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.delete('/api/admin/investors/'+user.id)
                            .then(result=>{
                                if(mode == 'suspend'){
                                    swal.fire(
                                        "Successful",
                                        ""+user.name+"has been suspended successfully.",
                                        "success",
                                    );
                                }else{
                                    swal.fire(
                                        "Successful",
                                        ""+user.name+"has been activated successfully.",
                                        "success",
                                    );
                                }

                                $('#userModal').modal('hide');
                                $('.modal-backdrop').remove();
                                Fire.$emit('ReloadUsers');
                                this.$Progress.finish();
                            })
                            .catch((err)=>{
                                toastr.error('Oops... An error just occurred, please reload your page.');
                                this.$Progress.fail();
                            });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire(
                            "Cancelled",
                            "Action reverted.",
                            "error"
                        )
                    }
                });



            },

            editUser(user, bank)
            {
                this.form.fill(user);
                this.form.account_number = bank ? bank.account_number : '';
                this.form.account_name = bank ? bank.account_name : '';
                this.form.bank_name = bank ? bank.bank_name : '';
                this.form.bank_code = bank ? bank.bank_code : '';
            },

            updateUser(user)
            {
                let loader = this.$loading.show();
                this.form.put('/api/admin/investors/'+this.form.id)
                    .then(result=>{
                        loader.hide();
                        Fire.$emit('ReloadUsers');
                        toastr.success('<b>'+result.data.name+'</b> profile updated successfully.');
                    })
                    .catch((err)=>{
                        loader.hide();
                        toastr.error('Oops... An error just occurred, please reload your page.');
                    });
            },

            checkAccountDetails(val, e) {
                let loader = this.$loading.show();
                // console.log(val) // => The value of the input
                // console.log(e) // => The event object
                axios.post('/api/admin/investors', {'account_number' : val, 'bank_code' : this.form.bank_code})
                    .then(result=>{
                        if(result.data.status == true)
                        {
                            this.form.account_name = result.data.data.account_name.replace(',', '');
                            toastr.success("Account Number verified with the name ("+this.form.account_name+").");
                            this.disabled = true;
                        }else{
                            toastr.error("Error! "+val+". Check the details and try again.");
                        }
                        loader.hide();
                    })
                    .catch(()=>{
                        toastr.error("Account Number verification failed. Please try again.");
                        loader.hide();
                    });
            },

            viewProof(user)
            {
                $('#proofModal').modal('show');
                this.user = user;
                this.form.proof_document = user.proof_document.split(',');
            },

            activateUser()
            {
                let loader = this.$loading.show();
                axios.get('/api/admin/investors/'+this.user.id)
                    .then(result=>{
                        Fire.$emit('ReloadUsers');
                        $('#proofModal').modal('hide');
                        $('.modal-backdrop').remove();
                        loader.hide();
                        toastr.success('<b>'+result.data.name+'</b> activated successfully.');
                    })
                    .catch((err)=>{
                        loader.hide();
                        toastr.error('Oops... An error just occurred, please reload your page.');
                    })
            },

            searchInvestor(){
                this.$Progress.start();
                Fire.$emit('searching');
            },
        },
        mounted() {
            console.log('Current Swiper instance object', this.mySwiper)
            this.mySwiper.slideTo(2, 1000, false)
        },
        created() {
            this.$Progress.start();
            this.allInvestors();
            Fire.$on('ReloadUsers', ()=>{
                if(this.users.current_page > 1)
                {
                    this.getResults(this.users.current_page);
                }else{
                    this.allInvestors();
                }
            });


            Fire.$on('searching', ()=>{
                let query = this.search;
                if(query !== ''){
                    axios.get('/api/admin/investor/search?q='+query)
                        .then((result)=>{
                            this.users = result.data.users;
                            this.banks = result.data.banks;
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.catchButtonMessage();
                        });
                }
            });

        }
    }
</script>

<style scoped>

</style>