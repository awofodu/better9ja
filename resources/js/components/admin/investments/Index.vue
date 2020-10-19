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
                            <div class="alert-text">ALL INVESTMENTS</div>
                        </div>
                    </div>

                    <div class="text-right mt-3" v-if="parseInt(admin.user_type) === 2">
                        <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#cInvestmentModal">
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
                    </span>Create Investment</button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-4 my-2 my-md-0">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search..."
                                   @keyup.enter="searchInvestment" v-model="search">
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Investor</th>
                                        <th scope="col">Investment</th>
                                        <th scope="col">Merge Balance</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(investment,index) in investments.data" :key="investment.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{investment.investment_id}}</td>
                                        <td>{{investment.user.name}}</td>
                                        <td>₦{{priceComma(investment.amount)}}</td>
                                        <td>₦{{priceComma(investment.inv_merge_balance)}}</td>
                                        <td>{{investment.created_at | shortDateWithTime}} </td>
                                        <td>
                                        <span class="label label-inline label-light-primary font-weight-bold"
                                              v-if="parseInt(investment.is_paid) === 1 && parseInt(investment.inv_merge_balance) === 0
                                                     && parseInt(investment.is_withdrawn) === 0">
                                            Paid</span>
                                            <span class="label label-inline label-light-warning font-weight-bold"
                                                  v-if="parseInt(investment.is_paid) === 0 && parseInt(investment.inv_merge_balance) === 0
                                                     && parseInt(investment.is_withdrawn) === 0">
                                            Not Fully Merged</span>
                                            <span class="label label-inline label-light-success font-weight-bold"
                                                  v-if="parseInt(investment.is_paid) === 1 && parseInt(investment.inv_merge_balance) === 0
                                                     && parseInt(investment.is_withdrawn) === 1">
                                            Withdrawn</span>
                                            <span v-if="parseInt(investment.is_paid) === 0 && parseInt(investment.inv_merge_balance) !== 0
                                                     && parseInt(investment.is_withdrawn) === 0 && parseInt(admin.user_type) === 2">
                                            <button type="button"
                                                    class="btn btn-success font-weight-bold" @click="mergeWith(investment)">Merge</button>
                                            </span>
                                            <span class="label label-inline label-light-warning font-weight-bold"
                                                  v-if="parseInt(investment.is_paid) === 0 && parseInt(investment.inv_merge_balance) !== 0
                                                     && parseInt(investment.is_withdrawn) === 0 && parseInt(admin.user_type) === 1">
                                            Merging...</span>

                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                               data-toggle="modal" data-target="#investmentModal"
                                               @click="getInvestment(investment, investment.user)">
                                                <i class="la la-eye"></i></a>
                                            <!--                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit User"-->
                                            <!--                                           data-toggle="modal" data-target="#editUserModal" @click="editUser(user, user.bank)">-->
                                            <!--                                            <i class="la la-edit"></i></a>-->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <pagination :data="investments" @pagination-change-page="getResults">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                                </pagination>
                            </div>


                            <!-- Modal name,amount,return,paid,created,withdrawal date merge: name,phone,email,bank and date-->
                            <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Investment Details</h5>
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
                                                    <span><b>Created: </b>{{investment.created_at | shortDateWithTime}}
                                                    </span><br><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span><b>Amount Paid: </b>₦{{priceComma(investment.amount)}}</span><br><br>
                                                    <span><b>Amount to Receive: </b>₦{{priceComma(investment.reward)}}</span><br><br>
                                                    <span><b>Withdrawal Date: </b>{{investment.withdrawal_date | shortDateWithTime}}
                                                    </span><br><br>
                                                </div>
                                            </div>


                                            <div class="separator separator-dashed my-8"></div>
                                            <h5 class="text-left">Merged Investor Info</h5>
                                            <div class="separator separator-dashed my-8"></div>
                                            <div class="row" v-if="investment.merges">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">

                                                        <table class="table table-hover mb-6">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Bank</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Created</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr v-for="(merge, index) in investment.merges" :key="merge.id" v-if="merge.withdrawal">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.withdrawal.investment_id}}</td>
                                                                <td>{{merge.withdrawal.user.name}}</td>
                                                                <td>({{merge.withdrawal.user.bank.account_number}}) {{merge.withdrawal.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
                                                                <td>
                                                                    <button class="btn btn-primary" @click="resolveMerge(merge)"
                                                                            v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 0 &&
                                                                            $options.filters.isPast(merge.created_at)">Resolve</button>
                                                                    <span class="label label-inline label-light-primary font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 1 && parseInt(merge.is_resolved) === 0 &&
                                                                            ($options.filters.isPast(merge.created_at) || $options.filters.isFuture(merge.created_at))">
                                                                        Paid</span>
                                                                    <span class="label label-inline label-light-warning font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 0 &&
                                                                            $options.filters.isFuture(merge.created_at)">
                                                                        Running</span>
                                                                    <span class="label label-inline label-light-success font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 1 &&
                                                                            $options.filters.isPast(merge.created_at)">
                                                                        Resolved</span>
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(merge, index) in investment.merges" :key="merge.id" v-if="merge.referral_withdrawal">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.referral_withdrawal.referral_id}}</td>
                                                                <td>{{merge.referral_withdrawal.user.name}}</td>
                                                                <td>({{merge.referral_withdrawal.user.bank.account_number}}) {{merge.referral_withdrawal.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
                                                                <td>
                                                                    <button class="btn btn-primary" @click="resolveMerge(merge)"
                                                                            v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 0 &&
                                                                            $options.filters.isPast(merge.created_at)">Resolve</button>
                                                                    <span class="label label-inline label-light-primary font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 1 && parseInt(merge.is_resolved) === 0 &&
                                                                            ($options.filters.isPast(merge.created_at) || $options.filters.isFuture(merge.created_at))">
                                                                        Paid</span>
                                                                    <span class="label label-inline label-light-warning font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 0 &&
                                                                            $options.filters.isFuture(merge.created_at)">
                                                                        Running</span>
                                                                    <span class="label label-inline label-light-success font-weight-bold"
                                                                          v-if="parseInt(merge.is_paid) === 0 && parseInt(merge.is_resolved) === 1 &&
                                                                            $options.filters.isPast(merge.created_at)">
                                                                        Resolved</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="vld-parent" ref="formContainer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &emsp;&emsp;


                            <!-- Modal name,amount,return,paid,created,withdrawal date merge: name,phone,email,bank and date-->
                            <div class="modal fade" id="mergeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Merge With:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <vue-numeric currency="₦" separator="," v-model="merge_amount"
                                                         class="form-control form-control-solid"
                                                         placeholder="Amount To Merge">
                                            </vue-numeric>
                                            <br>

                                            <div class="table-responsive">

                                                <table class="table table-hover mb-6">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Investor</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(merge,index) in merges.data" :key="merge.id">
                                                        <th scope="row">{{index+1}}</th>
                                                        <td>{{merge.investment_id}}</td>
                                                        <td>{{merge.user.name}}</td>
                                                        <td>₦{{priceComma(merge.merge_balance)}}</td>
                                                        <td>{{merge.withdrawal_date | shortDateWithTime}}</td>
                                                        <td>
                                                            <button type="button"
                                                                    @click="continueMerge(merge, investment)"
                                                                    class="btn btn-primary font-weight-bold">Go</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <pagination :data="merges" @pagination-change-page="getMergesResults">
                                                    <span slot="prev-nav">&lt; Previous</span>
                                                    <span slot="next-nav">Next &gt;</span>
                                                </pagination>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>


<!--                                        Referral Withdrawals-->
                                        <div class="modal-body">

                                            <div class="table-responsive">

                                                <table class="table table-hover mb-6">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Investor</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(referral,index) in referrals.data" :key="referral.id" v-if="parseInt(referral.merge_balance) !== 0">
                                                        <th scope="row">{{index+1}}</th>
                                                        <td>{{referral.ref_id}}</td>
                                                        <td>{{referral.user.name}}</td>
                                                        <td>₦{{priceComma(referral.merge_balance)}}</td>
                                                        <td>
                                                            <button type="button"
                                                                    @click="continueReferralMerge(referral, investment)"
                                                                    class="btn btn-primary font-weight-bold">Go</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <pagination :data="referrals" @pagination-change-page="getRefMergesResults">
                                                    <span slot="prev-nav">&lt; Previous</span>
                                                    <span slot="next-nav">Next &gt;</span>
                                                </pagination>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="vld-parent" ref="formContainer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
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


                <div class="modal fade" id="cInvestmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create A Dummy Investment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <form action="" @submit.prevent="createInvestment">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                   class="form-control form-control-solid" v-debounce:4s="checkUserDetails"
                                                   v-model="form.email" placeholder="Enter User Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" v-model="form.name" class="form-control form-control-solid"
                                                   placeholder="Wait to display" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <vue-numeric currency="₦" separator="," v-model="form.amount"
                                                         :class="{ 'is-invalid': form.errors.has('amount') }"
                                                         class="form-control form-control-solid"
                                                         placeholder="Amount To Invest">
                                            </vue-numeric>
                                        </div>
                                        <!--end: Code-->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success font-weight-bold"
                                            :disabled="submitBtnDisabled">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    export default {

        data() {
            return {
                investments: {},
                investment: '',
                admin: '',
                merge_amount: '',
                user: '',
                withdrawal: '',
                search: '',
                merges: {},
                referrals: {},
                submitBtnDisabled: true,
                form : new Form({
                    name : '',
                    email : '',
                    amount : '',
                })
            }
        },

        methods: {
            allInvestments() {
                axios.get('/api/admin/investments')
                    .then(result => {
                        this.investments = result.data.investments;
                        this.admin = result.data.admin;
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
                axios.get('/api/admin/investments?page=' + page)
                    .then(result => {
                        this.investments = result.data.investments;
                        this.admin = result.data.admin;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },


            // Our method to GET results from a Laravel endpoint
            getMergesResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/merges?page=' + page)
                    .then(result => {
                        this.merges = result.data.merges;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },


            // Our method to GET results from a Laravel endpoint
            getRefMergesResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/merges?page=' + page)
                    .then(result => {
                        this.referrals = result.data.referrals;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },

            getInvestment(investment, user)
            {
                this.$Progress.start();
                this.investment = investment;
                this.user = user;
                // this.withdrawal = withdrawal;
                this.$Progress.finish();
            },

            mergeWith(investment)
            {
                this.$Progress.start();
                this.investment = investment;
                axios.get('/api/admin/merges')
                    .then(result=>{
                        this.merges = result.data.merges;
                        this.referrals = result.data.referrals;
                        $('#mergeModal').modal('show');
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        toastr.error('Oops... An error just occurred.');
                        this.$Progress.fail();
                    });
            },

            continueMerge(merge, investment){
                if(this.form.amount <= merge.amount)
                {
                    let loader = this.$loading.show();
                    axios.put('/api/admin/investments/'+investment.id, {'merge_id':merge.id, 'investment':investment, 'merge_amount':this.merge_amount})
                        .then(result=>{
                            this.merges = result.data.merges;
                            Fire.$emit('ReloadInvestments');
                            $('#mergeModal').modal('hide');
                            $('.modal-backdrop').remove();
                            loader.hide();
                        })
                        .catch((err)=>{
                            toastr.error('Oops... An error just occurred.');
                            $('#mergeModal').modal('hide');
                            $('.modal-backdrop').remove();
                            loader.hide();
                        })
                }else{
                    toastr.error("Over-Price merging occur. Please try again.");
                }
            },

            continueReferralMerge(referral, investment){
                let loader = this.$loading.show();
                axios.post('/api/admin/investments', {'merge_id':referral.id, 'investment':investment, 'merge_amount':this.merge_amount})
                    .then(result=>{
                        this.referrals = result.data.referrals;
                        Fire.$emit('ReloadInvestments');
                        $('#mergeModal').modal('hide');
                        $('.modal-backdrop').remove();
                        loader.hide();
                    })
                    .catch((err)=>{
                        toastr.error('Oops... An error just occurred.');
                        $('#mergeModal').modal('hide');
                        $('.modal-backdrop').remove();
                        loader.hide();
                    })
            },

            resolveMerge(merge)
            {
                swal.fire({
                    title: "Resolve?",
                    text: "Continue to resolve merge?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Resolve!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        let loader = this.$loading.show();
                        axios.post('/api/admin/resolve-merges' , {'merge' : merge})
                            .then(result=>{
                                Fire.$emit('ReloadInvestments');
                                loader.hide();
                            })
                            .catch(()=>{
                                toastr.error('Oops... An error just occurred.');
                                loader.hide();
                            });
                        $('#investmentModal').modal('hide');
                        $('.modal-backdrop').remove();

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



            },

            searchInvestment(){
                this.$Progress.start();
                Fire.$emit('searching');
            },

            checkUserDetails(val, e) {
                let loader = this.$loading.show();
                // console.log(val) // => The value of the input
                // console.log(e) // => The event object
                axios.post('/api/admin/manage-admin', {'email' : val})
                    .then(result=>{
                        if(result.data)
                        {
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

            createInvestment()
            {
                let loader = this.$loading.show();
                this.form.post('/api/admin/investment/create-dummy')
                    .then(result=>{
                        Fire.$emit('ReloadInvestments');
                        this.form.reset();
                        $('#cInvestmentModal').modal('hide');
                        $('.modal-backdrop').remove();
                        loader.hide();
                    })
                    .catch(()=>{
                        toastr.error("Oops... An error just occurred.");
                        // location.reload();
                        loader.hide();
                    });
            }

        },

        created() {
            this.$Progress.start();
            this.allInvestments();
            Fire.$on('ReloadInvestments', ()=>{
                if(this.investments.current_page > 1)
                {
                    this.getResults(this.investments.current_page);
                }else{
                    this.allInvestments();
                }
            });


            Fire.$on('searching', ()=>{
                let query = this.search;
                if(query !== ''){
                    axios.get('/api/admin/investment/search?q='+query)
                        .then((result)=>{
                            this.investments = result.data.investments;
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
