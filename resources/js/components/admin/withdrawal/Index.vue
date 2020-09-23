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
                            <div class="alert-text">ALL WITHDRAWALS</div>
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
                                        <th scope="col">Type</th>
                                        <th scope="col">Investor</th>
                                        <th scope="col">Investment</th>
                                        <th scope="col">Return</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(withdrawal,index) in withdrawals.data" :key="withdrawal.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{withdrawal.investment_id ? withdrawal.investment_id : withdrawal.referral_id}}</td>
                                        <td>{{withdrawal.investment_id ? 'Investment' : 'Referral Bonus'}}</td>
                                        <td>{{withdrawal.user.name}}</td>
                                        <td>₦{{withdrawal.reward ? priceComma(withdrawal.amount) : 'Nil'}}</td>
                                        <td>₦{{withdrawal.reward ? priceComma(withdrawal.reward) : priceComma(withdrawal.amount)}}</td>
                                        <td>₦{{priceComma(withdrawal.paid_amount)}}</td>
                                        <td>{{withdrawal.created_at | shortDateWithTime}} </td>
                                        <td>
                                            <span class="label label-inline label-light-primary font-weight-bold"
                                                  v-if="parseInt(withdrawal.merge_balance) === 0">
                                            Completed</span>
                                            <span class="label label-inline label-light-warning font-weight-bold"
                                                  v-if="parseInt(withdrawal.merge_balance) !== 0">
                                            Incomplete</span>

                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                               data-toggle="modal" data-target="#investmentModal"
                                               @click="getWithdrawal(withdrawal)">
                                                <i class="la la-eye"></i></a>
                                            <!--                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit User"-->
                                            <!--                                           data-toggle="modal" data-target="#editUserModal" @click="editUser(user, user.bank)">-->
                                            <!--                                            <i class="la la-edit"></i></a>-->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <pagination :data="withdrawals" @pagination-change-page="getResults">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                                </pagination>
                            </div>


                            <!-- Modal name,amount,return,paid,created,withdrawal date merge: name,phone,email,bank and date-->
                            <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Withdrawal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" v-if="withdrawal">
                                                <div class="col-sm-6">
                                                    <span><b>Name: </b>{{withdrawal.user.name}}</span><br><br>
                                                    <span><b>Phone: </b><a :href="'tel:'+withdrawal.user.phone">{{withdrawal.user.phone}}</a>
                                                    </span><br><br>
                                                    <span><b>Created: </b>{{withdrawal.created_at | shortDateWithTime}}
                                                    </span><br><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span><b>Amount Paid: </b>
                                                        ₦{{priceComma(withdrawal.paid_amount)}}</span><br><br>
                                                    <span><b>Amount to Receive: </b>
                                                        ₦{{priceComma(withdrawal.reward)}}</span><br><br>
                                                </div>
                                            </div>


                                            <div class="separator separator-dashed my-8"></div>
                                            <h5 class="text-left">Merged Investor Info</h5>
                                            <div class="separator separator-dashed my-8"></div>
                                            <div class="row" v-if="withdrawal.withdrawal_merges">
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
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr v-for="(merge, index) in withdrawal.withdrawal_merges" :key="merge.id" v-if="merge.investor">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.investor.investment_id}}</td>
                                                                <td>{{merge.investor.user.name}}</td>
                                                                <td>({{merge.investor.user.bank.account_number}}) {{merge.investor.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
                                                            </tr>
                                                            <tr v-for="(merge, index) in withdrawal.withdrawal_merges" :key="merge.id" v-if="merge.maintenance_investor">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.maintenance_investor.maintenance_id}}</td>
                                                                <td>{{merge.maintenance_investor.user.name}}</td>
                                                                <td>({{merge.maintenance_investor.user.bank.account_number}}) {{merge.maintenance_investor.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row" v-if="withdrawal.ref_withdrawal_merges">
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
                                                            <tr v-for="(merge, index) in withdrawal.ref_withdrawal_merges" :key="merge.id" v-if="merge.investor">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.investor.investment_id}}</td>
                                                                <td>{{merge.investor.user.name}}</td>
                                                                <td>({{merge.investor.user.bank.account_number}}) {{merge.investor.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
                                                                <td>
                                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="View User"
                                                                       data-toggle="modal" data-target="#investmentModal">
                                                                        <i class="la la-window-close-o"></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(merge, index) in withdrawal.ref_withdrawal_merges" :key="merge.id" v-if="merge.maintenance_investor">
                                                                <th scope="row">{{index+1}}</th>
                                                                <td>{{merge.maintenance_investor.maintenance_id}}</td>
                                                                <td>{{merge.maintenance_investor.user.name}}</td>
                                                                <td>({{merge.maintenance_investor.user.bank.account_number}}) {{merge.maintenance_investor.user.bank.bank_name}}</td>
                                                                <td>₦{{priceComma(merge.amount)}}</td>
                                                                <td>{{merge.created_at | shortDateWithTime}} </td>
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
                withdrawals: {},
                withdrawal: '',
            }
        },

        methods: {
            allWithdrawals() {
                axios.get('/api/admin/withdrawals')
                    .then(result => {
                        this.withdrawals = result.data.withdrawals;
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
                axios.get('/api/admin/withdrawals?page=' + page)
                    .then(result => {
                        this.withdrawals = result.data.withdrawals;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },

            getWithdrawal(withdrawal)
            {
                this.$Progress.start();
                this.withdrawal = withdrawal;
                this.$Progress.finish();
            },
        },

        created() {
            this.$Progress.start();
            this.allWithdrawals();
            Fire.$on('ReloadWithdrawals', ()=>{
                this.allWithdrawals();
            })

        }
    }
</script>

<style scoped>

</style>
