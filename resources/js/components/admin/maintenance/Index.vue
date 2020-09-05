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
                            <div class="alert-text">MAINTENANCE INVESTMENT</div>
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Investor</th>
                                        <th scope="col">Maintenance Amount</th>
                                        <th scope="col">Merge Amount</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(maintenance,index) in maintenances.data" :key="maintenance.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{ maintenance.maintenance_id}}</td>
                                        <td>{{maintenance.user.name}}</td>
                                        <td>₦{{priceComma(maintenance.amount)}}</td>
                                        <td>₦{{priceComma(maintenance.main_merge_balance)}}</td>
                                        <td>{{maintenance.created_at | shortDateWithTime}} </td>
                                        <td>
                                        <span class="label label-inline label-light-primary font-weight-bold"
                                              v-if="parseInt(maintenance.is_paid) === 1 && parseInt(maintenance.main_merge_balance) === 0">
                                            Paid</span>
                                            <span class="label label-inline label-light-danger font-weight-bold"
                                                  v-if="parseInt(maintenance.is_paid) === 0 && parseInt(maintenance.main_merge_balance) === 0">
                                            {{maintenance.user.investments ? ((maintenance.user.investments.length/(maintenance.next_level - 1)) * 100) : 0}}%</span>
                                            <span v-if="parseInt(maintenance.is_paid) === 0 && parseInt(maintenance.main_merge_balance) !== 0">
                                            <button type="button"
                                                    class="btn btn-success font-weight-bold" @click="mergeWith(maintenance)">Merge</button>
                                        </span>

                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                               data-toggle="modal" data-target="#maintenanceModal"
                                               @click="getMaintenance(maintenance, maintenance.user)">
                                                <i class="la la-eye"></i></a>
                                            <!--                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit User"-->
                                            <!--                                           data-toggle="modal" data-target="#editUserModal" @click="editUser(user, user.bank)">-->
                                            <!--                                            <i class="la la-edit"></i></a>-->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- Modal name,amount,return,paid,created,withdrawal date merge: name,phone,email,bank and date-->
                            <div class="modal fade" id="maintenanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Maintenance Details</h5>
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
                                                    <span><b>Created: </b>{{maintenance.created_at | shortDateWithTime}}
                                                    </span><br><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span><b>Amount Paid: </b>₦{{priceComma(maintenance.amount)}}</span><br><br>
                                                </div>
                                            </div>


                                            <div class="separator separator-dashed my-8"></div>
                                            <h5 class="text-left">Merged Investor Info</h5>
                                            <div class="separator separator-dashed my-8"></div>
                                            <div class="row" v-if="maintenance.merges">
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
                                                            <tr v-for="(merge, index) in maintenance.merges" :key="merge.id" v-if="merge.withdrawal">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.withdrawal.maintenance_id}}</td>
                                                                <td>{{merge.withdrawal.user.name}}</td>
                                                                <td>({{merge.withdrawal.user.bank.account_number}}) {{merge.withdrawal.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.withdrawal.created_at | shortDateWithTime}} </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                                                       data-toggle="modal" data-target="#investmentModal">
                                                                        <i class="la la-window-close-o"></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(merge, index) in maintenance.merges" :key="merge.id" v-if="merge.referral_withdrawal">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.referral_withdrawal.referral_id}}</td>
                                                                <td>{{merge.referral_withdrawal.user.name}}</td>
                                                                <td>({{merge.referral_withdrawal.user.bank.account_number}}) {{merge.referral_withdrawal.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.referral_withdrawal.created_at | shortDateWithTime}} </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                                                       data-toggle="modal" data-target="#investmentModal">
                                                                        <i class="la la-window-close-o"></i></a>
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
                                                <button type="button" class="btn btn-warning font-weight-bold"
                                                        @click="suspendUser(user)">Suspend</button>
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
                                            <div class="table-responsive">

                                                <table class="table table-hover mb-6">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Investor</th>
                                                        <th scope="col" colspan="2">Amount</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(merge,index) in merges.data" :key="merge.id">
                                                        <th scope="row">{{index+1}}</th>
                                                        <td>{{merge.investment_id}}</td>
                                                        <td>{{merge.user.name}}</td>
                                                        <td>₦{{priceComma(merge.merge_balance)}}</td>
                                                        <td>
                                                            <vue-numeric currency="₦" separator="," v-model="merge_amount"
                                                                         class="form-control form-control-solid"
                                                                         placeholder="Amount To Merge">
                                                            </vue-numeric>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    @click="continueMerge(merge, maintenance)"
                                                                    class="btn btn-primary font-weight-bold">Go</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <pagination :data="merges" @pagination-change-page="getMergesResults">
                                                <span slot="prev-nav">&lt; Previous</span>
                                                <span slot="next-nav">Next &gt;</span>
                                            </pagination>
                                        </div>




                                        <!-- Referral Withdrawals-->
                                        <div class="modal-body">

                                            <div class="table-responsive">

                                                <table class="table table-hover mb-6">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Investor</th>
                                                        <th scope="col" colspan="2">Amount</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(referral,index) in referrals.data" :key="referral.id">
                                                        <th scope="row">{{index+1}}</th>
                                                        <td>{{referral.ref_id}}</td>
                                                        <td>{{referral.user.name}}</td>
                                                        <td>₦{{priceComma(referral.merge_balance)}}</td>
                                                        <td>
                                                            <vue-numeric currency="₦" separator="," v-model="merge_amount"
                                                                         class="form-control form-control-solid"
                                                                         placeholder="Amount To Merge">
                                                            </vue-numeric>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    @click="continueReferralMerge(referral, maintenance)"
                                                                    class="btn btn-primary font-weight-bold">Go</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <pagination :data="referrals" @pagination-change-page="getMergesResults">
                                                <span slot="prev-nav">&lt; Previous</span>
                                                <span slot="next-nav">Next &gt;</span>
                                            </pagination>
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

                <div class="card-footer">
                    <pagination :data="maintenances" @pagination-change-page="getResults">
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
    export default {

        data() {
            return {
                maintenances: {},
                maintenance: '',
                merge_amount: '',
                user: '',
                withdrawal: '',
                merges: {},
                referrals: {},
            }
        },

        methods: {
            allMaintenances() {
                axios.get('/api/admin/maintenances')
                    .then(result => {
                        this.maintenances = result.data.maintenances;
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
                axios.get('/api/admin/maintenances?page=' + page)
                    .then(result => {
                        this.maintenances = result.data.maintenances;
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

            getMaintenance(maintenance, user)
            {
                this.$Progress.start();
                this.maintenance = maintenance;
                this.user = user;
                // this.withdrawal = withdrawal;
                this.$Progress.finish();
            },

            mergeWith(maintenance)
            {
                this.$Progress.start();
                this.maintenance = maintenance;
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

            continueMerge(merge, maintenance){
                let loader = this.$loading.show();
                axios.put('/api/admin/maintenances/'+maintenance.id, {'merge_id':merge.id, 'maintenance':maintenance, 'merge_amount':this.merge_amount})
                    .then(result=>{
                        this.merges = result.data.merges;
                        Fire.$emit('ReloadMaintenances');
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

            continueReferralMerge(referral, maintenance){
                let loader = this.$loading.show();
                axios.post('/api/admin/maintenances', {'merge_id':referral.id, 'maintenance':maintenance, 'merge_amount':this.merge_amount})
                    .then(result=>{
                        this.referrals = result.data.referrals;
                        Fire.$emit('ReloadMaintenances');
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
            }

        },

        created() {
            this.$Progress.start();
            this.allMaintenances();
            Fire.$on('ReloadMaintenances', ()=>{
                if(this.maintenances.current_page > 1)
                {
                    this.getResults(this.maintenances.current_page);
                }else{
                    this.allMaintenances();
                }
            });

        }
    }
</script>

<style scoped>

</style>