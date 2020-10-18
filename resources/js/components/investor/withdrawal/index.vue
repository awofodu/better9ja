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
                <div class="alert-text text-warning" v-if="withdrawals_chunk === 0">
                    You have not made any withdrawal.
                </div>
                <div class="alert-text text-primary" v-if="withdrawals_chunk.length > 0">
                    Withdrawal Profiles.
                </div>
            </div>

            <div class="row" v-for="(withdrawals, index) in withdrawals_chunk">



                <div class="col-sm-4" v-for="(withdrawal, index) in withdrawals"
                     :key="withdrawal.id" v-if="withdrawal.withdrawal_merges && parseInt(withdrawal.balance) !== 0">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{withdrawal.investment_id}}</span>
                                    <small>Withdrawal Profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                                <span><b>ID: </b> {{withdrawal.investment_id}}</span><br>
                            <span><b>Amount to Receive: </b> &#8358;{{priceComma(withdrawal.reward)}}</span><br>
                            <span><b>Amount Received: </b> &#8358;{{priceComma(withdrawal.paid_amount)}}</span><br>
                            <span><b>Date: </b>{{withdrawal.withdrawal_date | shortDateWithTime}}</span><br>
                            <!-- Button trigger modal-->
                            <button type="button" v-if="withdrawal.withdrawal_merges.length > 0" @click="viewMerges(withdrawal)"
                                    class="btn btn-transparent-primary font-weight-bold mr-2">
                                View Merges
                            </button>
                            <span class="text-center text-danger" v-else>
                                You will be merged with who to pay to you soon.
                            </span>
                        </div>
                    </div>&emsp;&emsp;&emsp;&emsp;
                    <!--end::Card-->
                </div>



                <div class="col-sm-4" v-for="(withdrawal, index) in withdrawals"
                     :key="withdrawal.id" v-if="withdrawal.ref_withdrawal_merges && parseInt(withdrawal.balance) !== 0">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{withdrawal.referral_id}}</span>
                                    <small>Ref. Withdrawal Profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                                <span><b>ID: </b> {{withdrawal.referral_id}}</span><br>
                            <span><b>Amount: </b> &#8358;{{priceComma(withdrawal.amount)}}</span><br>
                            <span><b>Amount Received: </b> &#8358;{{priceComma(withdrawal.paid_amount)}}</span><br>
                            <span><b>Balance: </b> &#8358;{{priceComma(withdrawal.balance)}}</span><br>
                            <span><b>Date: </b>{{withdrawal.withdrawal_date | shortDateWithTime}}</span><br>
                            <!-- Button trigger modal-->
                            <button type="button" v-if="withdrawal.ref_withdrawal_merges.length > 0" @click="viewReferralMerges(withdrawal)"
                                    class="btn btn-transparent-primary font-weight-bold mr-2">
                                View Merges
                            </button>
                            <span class="text-center text-danger" v-else>
                                You will be merged with who to pay to you soon.
                            </span>
                        </div>
                    </div>&emsp;&emsp;&emsp;&emsp;
                    <!--end::Card-->
                </div>



                <div class="modal fade" id="reportPhoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Report {{reportee.phone}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <form action="" @submit.prevent="reportPhone">
                                <div class="modal-body">
                                    <div class="form-group mb-1">
                                        <label for="reportTextarea">Message</label>
                                        <textarea class="form-control" id="reportTextarea" rows="3" v-model="message"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary font-weight-bold">Report</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                &emsp;&emsp;
            </div>
            &emsp;&emsp;


            <!--end::Card-->
            <!--end: Code-->

            <div class="card-footer">
                <pagination :data="withdrawals" @pagination-change-page="getResults">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>
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
                withdrawals_chunk: '',
                user: '',
                reportee: '',
                reporter: '',
                message: '',
                withdrawal: '',
                withdrawals: {},
                images: [],
                fullPage: true,
                form: new Form({
                    proof_document: [],
                })
            }
        },

        methods: {
            myWithdrawals() {
                axios.get('/api/investor/withdrawals')
                    .then(result => {
                        this.withdrawals_chunk = _.chunk(_.toArray(result.data.withdrawals.data), 3);
                        this.user = result.data.user;
                        this.withdrawals = result.data.withdrawals;
                        this.$Progress.finish();
                    })
                    .catch(() => {

                    })
                },

            confirmWithdrawal(withdrawal)
            {
                swal.fire({
                    title: "Confirm payment from "+withdrawal.investor.user.bank.account_name+"?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, confirm!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonColor: '#1BC5BD',
                    reverseButtons: true
                }).then(result => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.put('/api/investor/withdrawals/'+withdrawal.id, {'withdrawal_id':withdrawal.investor.id})
                            .then(result=>{
                                Fire.$emit('ReloadWithdrawals');
                                this.$Progress.finish();
                            })
                            .catch(()=>{

                            });
                        swal.fire(
                            "Confirmed!",
                            "Your payment is confirmed successfully.",
                            "success"
                        );
                        // loader.hide();
                        // result.dismiss can be "cancel", "overlay",
                        // "close", and "timer"
                    } else if (result.dismiss === "cancel") {
                        swal.fire(
                            "Cancelled",
                            "Confirmation status not altered.",
                            "error"
                        )
                    }
                });
            },

            //Still withdrawal module, but they are withdrawal merged with maintenance payment
            confirmMaintenanceWithdrawal(withdrawal)
            {
                swal.fire({
                    title: "Confirm payment from "+withdrawal.maintenance_investor.user.bank.account_name+"?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, confirm!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonColor: '#1BC5BD',
                    reverseButtons: true
                }).then(result => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.get('/api/investor/withdrawals/'+withdrawal.id)
                            .then(result=>{
                                swal.fire(
                                    "Confirmed!",
                                    "Your payment is confirmed successfully.",
                                    "success"
                                );
                                Fire.$emit('ReloadWithdrawals');
                                this.$Progress.finish();
                            })
                            .catch(()=>{

                            });

                        // loader.hide();
                        // result.dismiss can be "cancel", "overlay",
                        // "close", and "timer"
                    } else if (result.dismiss === "cancel") {
                        swal.fire(
                            "Cancelled",
                            "Confirmation status not altered.",
                            "error"
                        )
                    }
                });
            },

            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/investor/withdrawals?page=' + page)
                    .then(result => {
                        this.withdrawals_chunk = _.chunk(_.toArray(result.data.withdrawals.data), 3);
                        this.user = result.data.user;
                        this.withdrawals = result.data.withdrawals;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.catchMessage();
                    });
            },

            report(reportee, reporter)
            {
                this.reportee = reportee;
                this.reporter = reporter;
            },

            reportPhone()
            {
                this.$Progress.start();
                axios.post('/api/investor/report', {'reporter':this.reporter,'reportee':this.reportee, 'message':this.message})
                    .then(result => {
                        console.log(result);
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.catchMessage();
                    });
            },

            viewMerges(withdrawal)
            {
                this.$router.push({name: 'withdrawalMerges', params: {id: withdrawal.id}});
            },

            viewReferralMerges(withdrawal)
            {
                this.$router.push({name: 'referralMerges', params: {id: withdrawal.id}});
            }

        },

        created() {
            this.$Progress.start();
            this.myWithdrawals();
            Fire.$on('ReloadWithdrawals', ()=>{
                this.myWithdrawals();
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

</style>
