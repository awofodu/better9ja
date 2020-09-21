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
                <div class="alert-text text-warning" v-if="merges_chunk === 0">
                    You have not made any withdrawal.
                </div>
                <div class="alert-text text-primary" v-if="merges_chunk.length > 0">
                    Referral Withdrawal Profiles.
                </div>

                <div class="text-right">
                    <a @click="$router.go(-1)" class="btn btn-primary mr-3">
                    <span class="svg-icon">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M11.0879549,18.2771971 L17.8286578,12.3976203 C18.0367595,12.2161036 18.0583109,11.9002555 17.8767943,11.6921539 C17.8622027,11.6754252 17.8465132,11.6596867 17.8298301,11.6450431 L11.0891271,5.72838979 C10.8815919,5.54622572 10.5656782,5.56679309 10.3835141,5.7743283 C10.3034433,5.86555116 10.2592899,5.98278612 10.2592899,6.10416552 L10.2592899,17.9003957 C10.2592899,18.1765381 10.4831475,18.4003957 10.7592899,18.4003957 C10.8801329,18.4003957 10.9968872,18.3566309 11.0879549,18.2771971 Z"
                                      fill="#000000" opacity="0.3"
                                      transform="translate(14.129645, 12.002277) scale(-1, 1) translate(-14.129645, -12.002277) "/>
                                <path d="M5.08795487,18.2771971 L11.8286578,12.3976203 C12.0367595,12.2161036 12.0583109,11.9002555 11.8767943,11.6921539 C11.8622027,11.6754252 11.8465132,11.6596867 11.8298301,11.6450431 L5.08912711,5.72838979 C4.8815919,5.54622572 4.56567821,5.56679309 4.38351414,5.7743283 C4.30344325,5.86555116 4.25928988,5.98278612 4.25928988,6.10416552 L4.25928988,17.9003957 C4.25928988,18.1765381 4.48314751,18.4003957 4.75928988,18.4003957 C4.88013293,18.4003957 4.99688719,18.3566309 5.08795487,18.2771971 Z"
                                      fill="#000000"
                                      transform="translate(8.129645, 12.002277) scale(-1, 1) translate(-8.129645, -12.002277) "/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Go Back</a>
                </div>
            </div>

            <div class="row" v-for="(merges, index) in merges_chunk">
                <div class="col-sm-4" v-for="(merge, index) in merges"
                     :key="merge.id" v-if="merge.investor">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{merge.referral_withdrawal.referral_id}}</span>
                                    <small>Withdrawal profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <vue-countdown-timer
                                        @start_callback="startCallBack('event started')"
                                        @end_callback="endCallBack('event ended')"
                                        :start-time="merge.created_at | myDate"
                                        :end-time="merge.created_at | myDateAddHours"
                                        :interval="1000"
                                        :start-label="''"
                                        :end-label="''"
                                        label-position="begin"
                                        :end-text="'Transaction Terminated!'"
                                        :day-txt="'days'"
                                        :hour-txt="'hours'"
                                        :minutes-txt="'minutes'"
                                        :seconds-txt="'seconds'" v-if="parseInt(merge.is_paid) === 0 &&
                                        $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at))">

                                    <template slot="countdown" slot-scope="scope">
                                        <span class="text-danger">{{scope.props.hours}}{{scope.props.hourTxt}}</span>
                                        <span class="text-danger">{{scope.props.minutes}}{{scope.props.minutesTxt}}</span>
                                        <span class="text-danger">{{scope.props.seconds}}{{scope.props.secondsTxt}}</span>
                                    </template>
                                </vue-countdown-timer>

                                <span><b>ID: </b> {{merge.investor.investment_id}}</span><br>
                                <span><b>Payer: </b> {{merge.investor.user.bank.account_name}}</span><br>
                                <span>
                                    <b>Phone: </b>  <a :href="'tel:'+merge.investor.user.phone">
                                {{merge.investor.user.phone}}</a>
                                <button type="button" class="btn btn-transparent-info mr-1" data-toggle="modal"
                                        data-target="#reportPhoneModal" v-if="parseInt(merge.is_paid) === 0"
                                        @click="report(merge.investor.user, user)">Report Phone</button>
                            </span><br>
                                <span>
                                    <b>
                                        Guider: </b> <a :href="'tel:'+merge.investor.user.guider.phone">
                                    {{merge.investor.user.guider.phone}}</a>
                            </span><br>
                                <span v-if="merge.investor.user.referrer">
                                    <b>Upline: </b> <a :href="'tel:'+merge.investor.user.referrer.phone">
                                    {{merge.investor.user.referrer.phone}}
                                    </a>
                                </span>
                                <span v-else>
                                    <b>Upline: </b> Null
                                </span><br>
                            </div>
                            <span><b>Amount: </b> &#8358;{{priceComma(merge.amount)}}</span><br>
                            <span><b>Upload: </b> {{merge.proof_document ? 'Yes' : 'No'}}</span><br>
                            <span><b>Date: </b>{{merge.created_at | shortDateWithTime}}</span><br>
                            <span class="text-center"><b>Status: </b>
                                <button type="button" class="btn btn-warning"
                                        v-if="parseInt(merge.is_paid) === 0 && $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at))"
                                        @click="viewProof(merge)">Confirm</button>
                                <span class="text-danger"
                                      v-if="parseInt(merge.is_paid) === 0 && $options.filters.isPast($options.filters.myDateAddHours(merge.created_at))">
                                    Terminated</span>
                                <span class="text-success"
                                      v-if="parseInt(merge.is_paid) === 1 && ($options.filters.isPast($options.filters.myDateAddHours(merge.created_at)) ||
                                        $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at)))">
                                    Received</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>


                <div class="col-sm-4" v-for="(merge, index) in merges"
                     :key="merge.id" v-if="merge.maintenance_investor">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{merge.referral_withdrawal.referral_id}}</span>
                                    <small>Withdrawal profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <vue-countdown-timer
                                        @start_callback="startCallBack('event started')"
                                        @end_callback="endCallBack('event ended')"
                                        :start-time="merge.created_at | myDate"
                                        :end-time="merge.created_at | myDateAddHours"
                                        :interval="1000"
                                        :start-label="''"
                                        :end-label="''"
                                        label-position="begin"
                                        :end-text="'Transaction Terminated!'"
                                        :day-txt="'days'"
                                        :hour-txt="'hours'"
                                        :minutes-txt="'minutes'"
                                        :seconds-txt="'seconds'" v-if="parseInt(merge.is_paid) === 0 &&
                                        $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at))">

                                    <template slot="countdown" slot-scope="scope">
                                        <span class="text-danger">{{scope.props.hours}}{{scope.props.hourTxt}}</span>
                                        <span class="text-danger">{{scope.props.minutes}}{{scope.props.minutesTxt}}</span>
                                        <span class="text-danger">{{scope.props.seconds}}{{scope.props.secondsTxt}}</span>
                                    </template>
                                </vue-countdown-timer>

                                <span><b>ID: </b> {{merge.maintenance_investor.maintenance_id}}</span><br>
                                <span><b>Payer: </b> {{merge.maintenance_investor.user.bank.account_name}}</span><br>
                                <span>
                                    <b>Phone: </b>  <a :href="'tel:'+merge.maintenance_investor.user.phone">
                                {{merge.maintenance_investor.user.phone}}</a>
                                <button type="button" class="btn btn-transparent-info mr-1" data-toggle="modal"
                                        data-target="#reportPhoneModal" v-if="parseInt(merge.is_paid) === 0"
                                        @click="report(merge.maintenance_investor.user, user)">Report Phone</button>
                            </span><br>
                                <span>
                                    <b>
                                        Guider: </b> <a :href="'tel:'+merge.maintenance_investor.user.guider.phone">
                                    {{merge.maintenance_investor.user.guider.phone}}</a>
                            </span><br>
                                <span v-if="merge.maintenance_investor.user.referrer">
                                    <b>Upline: </b> <a :href="'tel:'+merge.maintenance_investor.user.referrer.phone">
                                    {{merge.maintenance_investor.user.referrer.phone}}
                                    </a>
                                </span>
                                <span v-else>
                                    <b>Upline: </b> Null
                                </span><br>
                            </div>
                            <span><b>Amount: </b> &#8358;{{priceComma(merge.amount)}}</span><br>
                            <span><b>Upload: </b> {{merge.proof_document ? 'Yes' : 'No'}}</span><br>
                            <span><b>Date: </b>{{merge.created_at | shortDateWithTime}}</span><br>
                            <span class="text-center"><b>Status: </b>
                                <button type="button" class="btn btn-warning"
                                        v-if="parseInt(merge.is_paid) === 0 && $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at))"
                                        @click="viewProof(merge)">Confirm</button>
                                <span class="text-danger"
                                      v-if="parseInt(merge.is_paid) === 0 && $options.filters.isPast($options.filters.myDateAddHours(merge.created_at))">
                                    Terminated</span>
                                <span class="text-success"
                                      v-if="parseInt(merge.is_paid) === 1 && ($options.filters.isPast($options.filters.myDateAddHours(merge.created_at)) ||
                                        $options.filters.isFuture($options.filters.myDateAddHours(merge.created_at)))">
                                    Received</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>&emsp;&emsp;
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
                                <div v-if="parseInt(form.proof_document.length) === 0" class="text text-danger">No proof document uploaded yet.</div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <form class="vld-parent" ref="formContainer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning font-weight-bold"
                                        @click="confirmWithdrawal(merge)">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                id: this.$route.params.id,
                merges_chunk: '',
                merge: '',
                merges: {},
                user: '',
                reportee: '',
                reporter: '',
                message: '',
                withdrawal: '',
                name: 'Timer',
                withdrawals: {},
                images: [],
                fullPage: true,
                form: new Form({
                    proof_document: [],
                })
            }
        },

        methods: {
            mergeWithdrawal() {
                axios.get('/api/investor/referral/merges/'+this.id)
                    .then(result => {
                        this.merges_chunk = _.chunk(_.toArray(result.data.merges.data), 3); //result.data.investments
                        this.user = result.data.user;
                        // this.investments = result.data.investments;
                        this.merges = result.data.merges;
                        // this.paid_investment = result.data.paid_investment;
                        this.$Progress.finish();
                    })
                    .catch(() => {

                    })
            },

            confirmWithdrawal(merge)
            {
                if(merge.investor)
                {
                    swal.fire({
                        title: "Confirm payment from "+merge.investor.user.bank.account_name+"?",
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
                            axios.post('/api/investor/referrals', {'merge':merge})
                                .then(result=>{
                                    swal.fire(
                                        "Confirmed!",
                                        "Your payment is confirmed successfully.",
                                        "success"
                                    );
                                    Fire.$emit('ReloadWithdrawals');
                                    $('#proofModal').modal('hide');
                                    $('.modal-backdrop').remove();
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
                }

                if(merge.maintenance_investor)
                {
                    swal.fire({
                        title: "Confirm payment from "+merge.maintenance_investor.user.bank.account_name+"?",
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
                            axios.post('/api/investor/referrals', {'merge':merge})
                                .then(result=>{
                                    swal.fire(
                                        "Confirmed!",
                                        "Your payment is confirmed successfully.",
                                        "success"
                                    );
                                    Fire.$emit('ReloadWithdrawals');
                                    $('#proofModal').modal('hide');
                                    $('.modal-backdrop').remove();
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
                }
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
                        Swal.fire(
                            "Successful!",
                            "Report submitted successfully.",
                            "success"
                        );
                        this.$Progress.finish();
                        $('#reportPhoneModal').modal('hide');
                        $('.modal-backdrop').remove();
                    })
                    .catch(()=>{
                        this.catchMessage();
                    });
            },

            viewMerges(withdrawal)
            {
                this.$router.push({name: 'withdrawalMerges', params: {id: withdrawal.id}});
            },

            viewProof(merge)
            {
                $('#proofModal').modal('show');
                this.merge = merge;
                this.form.proof_document = merge.proof_document.split(',');
            },

            startCallBack: function (x) {
                console.log(x)
            },
            endCallBack: function (x) {
                this.$router.go(0);
            }

        },
        mounted() {
            console.log('Current Swiper instance object', this.mySwiper)
            this.mySwiper.slideTo(2, 1000, false)
        },

        created() {
            this.$Progress.start();
            this.mergeWithdrawal();
            Fire.$on('ReloadWithdrawals', ()=>{
                if(this.merges.current_page > 1)
                {
                    this.getResults(this.merges.current_page);
                }else{
                    this.mergeWithdrawal();
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

</style>
