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
                    Investment Merge Profiles.
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

            <div class="row" v-for="(merges, index) in merges_chunk" style="padding-bottom: 15px;">


                <!--                div for unpaid investment-->
                <div class="col-sm-4" v-for="(merge, index) in merges"
                     :key="merge.id" v-if="merge.withdrawal">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label">
                                    <span class="text-primary" v-if="merge.withdrawal">
                                    Pay to {{merge.withdrawal.user.bank.account_name}}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div v-if="merge.withdrawal">
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
                                <span>
                                    <b>ID: </b> {{merge.withdrawal.investment_id}}
                                </span><br>
                                <span>
                                    <b>Account: </b> {{merge.withdrawal.user.bank.account_number}}
                                    ({{merge.withdrawal.user.bank.bank_name}})
                                </span><br>
                                <span>
                                    <b>Phone: </b>  <a :href="'tel:'+merge.withdrawal.user.phone">{{merge.withdrawal.user.phone}}</a>
                                <button type="button" class="btn btn-transparent-warning mr-1" data-toggle="modal"
                                        data-target="#reportPhoneModal"  v-if="parseInt(merge.is_paid) === 0"
                                        @click="report(merge.withdrawal.user, user)">
                                    Report Phone</button>
                                </span><br>
                            </div>
                            <span><b>Amount: </b> &#8358;{{priceComma(merge.amount)}}</span><br>
                            <div v-if="merge.withdrawal">
                                <span>
                                    <b>
                                        Guider: </b> <a :href="'tel:'+merge.withdrawal.user.guider.phone">
                                    {{merge.withdrawal.user.guider.phone}}</a>
                                </span><br>
                                <span v-if="merge.withdrawal.user.referrer">
                                    <b>Upline: </b> <a :href="'tel:'+merge.withdrawal.user.referrer.phone">
                                    {{merge.withdrawal.user.referrer.phone}}</a>
                                </span><br>
                            </div>
                            <span><b>Created: </b>{{merge.created_at | shortDateWithTime}}</span><br>
                            <span>
                                <b>Status: </b>
                                <!-- Button trigger modal-->
                                <button type="button" class="btn btn-transparent-primary font-weight-bold mr-2"
                                        data-toggle="modal" data-target="#proofModal"
                                        @click="getMerge(merge)" v-if="parseInt(merge.is_paid) === 0 && !merge.proof_document">
                                    I have made payment
                                </button>
                                <span v-if="parseInt(merge.is_paid) === 0 && merge.proof_document" class="text-primary">
                                    Please wait while investor confirms your payment.
                                </span>
                                <span v-if="parseInt(merge.is_paid) === 1 && (!merge.proof_document || merge.proof_document)" class="text-success">
                                    Paid
                                </span>
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>


                <!--                div for unpaid investment-->
                <div class="col-sm-4" v-for="(merge, index) in merges"
                     :key="merge.id" v-if="merge.referral_withdrawal">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label">
                                    <span class="text-primary" v-if="merge.referral_withdrawal">
                                    Pay to {{merge.referral_withdrawal.user.bank.account_name}}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div v-if="merge.referral_withdrawal">
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

                                <span>
                                    <b>ID: </b> {{merge.referral_withdrawal.referral_id}}
                                </span><br>
                                <span>
                                    <b>Account: </b> {{merge.referral_withdrawal.user.bank.account_number}}
                                    ({{merge.referral_withdrawal.user.bank.bank_name}})
                                </span><br>
                                <span>
                                    <b>Phone: </b>  <a :href="'tel:'+merge.referral_withdrawal.user.phone">{{merge.referral_withdrawal.user.phone}}</a>
                                <button type="button" class="btn btn-transparent-warning mr-1" data-toggle="modal"
                                        data-target="#reportPhoneModal"  v-if="parseInt(merge.is_paid) === 0"
                                        @click="report(merge.referral_withdrawal.user, user)">
                                    Report Phone</button>
                                </span><br>
                            </div>
                            <span><b>Amount: </b> &#8358;{{priceComma(merge.amount)}}</span><br>
                            <div v-if="merge.referral_withdrawal">
                                <span>
                                    <b>
                                        Guider: </b> <a :href="'tel:'+merge.referral_withdrawal.user.guider.phone">
                                    {{merge.referral_withdrawal.user.guider.phone}}</a>
                                </span><br>
                                <span v-if="merge.referral_withdrawal.user.referrer">
                                    <b>Upline: </b> <a :href="'tel:'+merge.referral_withdrawal.user.referrer.phone">
                                    {{merge.referral_withdrawal.user.referrer.phone}}</a>
                                </span><br>
                            </div>
                            <span><b>Created: </b>{{merge.created_at | shortDateWithTime}}</span><br>
                            <span>
                                <b>Status: </b>
                                <!-- Button trigger modal-->
                                <button type="button" class="btn btn-transparent-primary font-weight-bold mr-2"
                                        data-toggle="modal" data-target="#proofModal"
                                        @click="getReferralMerge(merge)"
                                        v-if="parseInt(merge.is_paid) === 0 && !merge.proof_document && parseInt(merge.is_terminated) === 0 && parseInt(merge.is_resolved) === 0">
                                    I have made payment
                                </button>
                                <span v-if="parseInt(merge.is_paid) === 0 && merge.proof_document && parseInt(merge.is_terminated) === 0 && parseInt(merge.is_resolved) === 0" class="text-primary">
                                    Please wait while investor confirms your payment.
                                </span>
                                <span v-if="parseInt(merge.is_paid) === 1 && (!merge.proof_document || merge.proof_document) && parseInt(merge.is_terminated) === 0 && parseInt(merge.is_resolved) === 0" class="text-success">
                                    Paid
                                </span>
                                <span v-if="parseInt(merge.is_paid) === 0 && merge.proof_document && parseInt(merge.is_terminated) === 1 && (parseInt(merge.is_resolved) === 1 || parseInt(merge.is_resolved) === 0)" class="text-danger">
                                    Terminated.
                                </span>
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>&emsp;&emsp;
            </div>




            <!-- Modal-->
            <div class="modal fade" id="proofModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Proof Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <vue-upload-multiple-image
                                    @upload-success="uploadImageSuccess"
                                    @before-remove="beforeRemove"
                                    @edit-image="editImage"
                                    :data-images="images"
                                    browseText="Upload Proof Document"
                                    dragText="Drag and Drop here."
                                    primaryText="Betta9ja"
                                    marklsPrimaryText="Betta9ja"
                            ></vue-upload-multiple-image>
                        </div>
                        <div class="modal-footer">
                            <form @submit.prevent="uploadProofDocument" class="vld-parent" ref="formContainer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
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
            <!--end::Card-->
            <!--end: Code-->


            <div class="card-footer">
                <pagination :data="merges" @pagination-change-page="getResults">
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
    import VueUploadMultipleImage from 'vue-upload-multiple-image'
    export default {

        components: {
            VueUploadMultipleImage,
        },

        data() {
            return {
                id: this.$route.params.id,
                merges_chunk: '',
                investments: {},
                merges: {},
                paid_investment: {},
                user: '',
                reportee: '',
                reporter: '',
                message: '',
                merge: '',
                name: 'Timer',
                images: [],
                fullPage: true,
                form: new Form({
                    proof_document: [],
                })
            }
        },

        methods: {
            mergeInvestment(){
                axios.get('/api/investor/investment/merges/'+this.id)
                    .then(result=>{
                        this.merges_chunk = _.chunk(_.toArray(result.data.merges.data), 3); //result.data.investments
                        this.user = result.data.user;
                        // this.investments = result.data.investments;
                        this.merges = result.data.merges;
                        // this.paid_investment = result.data.paid_investment;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.catchMessage();
                    })
            },

            uploadImageSuccess(formData, index, fileList) {
                // console.log('data', formData, index, fileList)
                // this.form.proof_document = fileList;
                // Upload image api
                this.form.proof_document = fileList;
            },
            beforeRemove (index, done, fileList) {
                console.log('index', index, fileList)
                var r = confirm("remove image")
                if (r == true) {
                    done()
                } else {
                }
            },
            editImage (formData, index, fileList) {
                console.log('edit data', formData, index, fileList)
            },

            getMerge(merge)
            {
                this.merge = merge;
            },

            getReferralMerge(merge)
            {
                this.merge = merge;
            },

            uploadProofDocument()
            {
                let loader = this.$loading.show();
                if(this.merge.withdrawal)
                {
                    // Controller <---->  Api\Admin\InvestmentController@update
                    this.form.put('/api/investor/investments/'+this.merge.id).then(result => {
                        Swal.fire(
                            "Successful!",
                            "Proof submitted successfully.",
                            "success"
                        );
                        Fire.$emit('ReloadMerges');
                        loader.hide();
                        $('#proofModal').modal('hide');
                        $('.modal-backdrop').remove();
                    });
                }

                if(this.merge.referral_withdrawal)
                {
                    // Controller <---->  Api\Admin\MergeController@update
                    this.form.put('/api/investor/investment/merges/'+this.merge.id).then(result => {
                        Swal.fire(
                            "Successful!",
                            "Proof submitted successfully.",
                            "success"
                        );
                        Fire.$emit('ReloadMerges');
                        loader.hide();
                        $('#proofModal').modal('hide');
                        $('.modal-backdrop').remove();
                    });
                }

            },



            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/investor/investment/merges/'+this.id+'?page=' + page)
                    .then(result => {
                        this.merges_chunk = _.chunk(_.toArray(result.data.merges.data), 3); //result.data.investments
                        this.user = result.data.user;
                        // this.investments = result.data.investments;
                        this.merges = result.data.merges;
                        // this.paid_investment = result.data.paid_investment;
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

            startCallBack: function (x) {
                console.log(x)
            },
            endCallBack: function (x) {
                console.log(x)
            }
        },

        created() {
            this.$Progress.start();
            this.mergeInvestment();
            Fire.$on('ReloadMerges', ()=>{
                if(this.merges.current_page > 1)
                {
                    this.getResults(this.merges.current_page);
                }else{
                    this.mergeInvestment();
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
