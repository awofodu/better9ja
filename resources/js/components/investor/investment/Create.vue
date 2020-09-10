<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="col-xl-12">
                <!--begin::Tiles Widget 15-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header">
                        <h3 class="card-title">Investment Plan</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Items-->
                        <div class="flex-grow-1"
                             v-if="investments && (parseInt(investments.length) !== parseInt(level)) && parseInt(maintenance.amount) === 0">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                        <div class="symbol-label">
<!--                                            <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/misc/006-plurk.svg" alt="" class="h-50">-->
                                            <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Arrow-from-top.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3" x="11" y="7" width="2" height="14" rx="1"/>
                                                    <path d="M6.70710678,20.7071068 C6.31658249,21.0976311 5.68341751,21.0976311 5.29289322,20.7071068 C4.90236893,20.3165825 4.90236893,19.6834175 5.29289322,19.2928932 L11.2928932,13.2928932 C11.6714722,12.9143143 12.2810586,12.9010687 12.6757246,13.2628459 L18.6757246,18.7628459 C19.0828436,19.1360383 19.1103465,19.7686056 18.7371541,20.1757246 C18.3639617,20.5828436 17.7313944,20.6103465 17.3242754,20.2371541 L12.0300757,15.3841378 L6.70710678,20.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 16.999999) scale(1, -1) translate(-12.000003, -16.999999) "/>
                                                    <rect fill="#000000" opacity="0.3" x="3" y="3" width="18" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Minimum Investment</a>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">&#8358;{{Number(user.minimum_investment).toLocaleString()}}<i class="fa fa-na"></i></div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Arrow-from-bottom.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="14" rx="1"/>
                                                    <path d="M6.70710678,10.7071068 C6.31658249,11.0976311 5.68341751,11.0976311 5.29289322,10.7071068 C4.90236893,10.3165825 4.90236893,9.68341751 5.29289322,9.29289322 L11.2928932,3.29289322 C11.6714722,2.91431428 12.2810586,2.90106866 12.6757246,3.26284586 L18.6757246,8.76284586 C19.0828436,9.13603827 19.1103465,9.76860564 18.7371541,10.1757246 C18.3639617,10.5828436 17.7313944,10.6103465 17.3242754,10.2371541 L12.0300757,5.38413782 L6.70710678,10.7071068 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <rect fill="#000000" opacity="0.3" x="3" y="19" width="18" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Maximum Investment</a>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">&#8358;{{Number(user.maximum_investment).toLocaleString()}}</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Devices/Diagnostics.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2"/>
                                                    <path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Deposit Return</a>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">50%</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                                    <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                                    <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Investment Amount</a>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">₦{{priceComma(form.amount)}}</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mr-2">
                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Communication/Reply-all.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8.29606274,4.13760526 L1.15599693,10.6152626 C0.849219196,10.8935795 0.826147139,11.3678924 1.10446404,11.6746702 C1.11907213,11.6907721 1.13437346,11.7062312 1.15032466,11.7210037 L8.29039047,18.333467 C8.59429669,18.6149166 9.06882135,18.596712 9.35027096,18.2928057 C9.47866909,18.1541628 9.55000007,17.9721616 9.55000007,17.7831961 L9.55000007,4.69307548 C9.55000007,4.27886191 9.21421363,3.94307548 8.80000007,3.94307548 C8.61368984,3.94307548 8.43404911,4.01242035 8.29606274,4.13760526 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M23.2951173,17.7910156 C23.2951173,16.9707031 23.4708985,13.7333984 20.9171876,11.1650391 C19.1984376,9.43652344 16.6261719,9.13671875 13.5500001,9 L13.5500001,4.69307548 C13.5500001,4.27886191 13.2142136,3.94307548 12.8000001,3.94307548 C12.6136898,3.94307548 12.4340491,4.01242035 12.2960627,4.13760526 L5.15599693,10.6152626 C4.8492192,10.8935795 4.82614714,11.3678924 5.10446404,11.6746702 C5.11907213,11.6907721 5.13437346,11.7062312 5.15032466,11.7210037 L12.2903905,18.333467 C12.5942967,18.6149166 13.0688214,18.596712 13.350271,18.2928057 C13.4786691,18.1541628 13.5500001,17.9721616 13.5500001,17.7831961 L13.5500001,13.5 C15.5031251,13.5537109 16.8943705,13.6779456 18.1583985,14.0800781 C19.9784273,14.6590944 21.3849749,16.3018455 22.3780412,19.0083314 L22.3780249,19.0083374 C22.4863904,19.3036749 22.7675498,19.5 23.0821406,19.5 L23.3000001,19.5 C23.3000001,19.0068359 23.2951173,18.2255859 23.2951173,17.7910156 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Total Return</a>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">&#8358;
                                    {{priceComma(parseInt(form.amount) + parseInt(form.amount * 50/100))}}</div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                        <!--begin::Action-->
                        <div class="pt-10 pb-5 text-center">
                            <div class="card-body" v-if="user.bank">
                                <!--begin::Form-->
                                <form class="form" id="kt_form" @submit.prevent="createInvestment"
                                      v-if="investments && (parseInt(investments.length) !== parseInt(level)) &&
                                      parseInt(maintenance.amount) === 0">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-8">
                                            <div class="my-5">
                                                <div class="form-group row">
                                                    <label class="col-3">Amount to Invest</label>
                                                    <div class="col-9">
                                                        <div class="input-group input-group-solid">
                                                            <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-money-bill-wave"></i>
																		</span>
                                                            </div>
                                                            <vue-numeric currency="₦" separator="," v-model="form.amount"
                                                                         :class="{ 'is-invalid': form.errors.has('amount') }"
                                                                         class="form-control form-control-solid"
                                                                         placeholder="Amount To Invest"
                                                                         :min="parseInt(user.minimum_investment)" :max="parseInt(user.maximum_investment)">
                                                            </vue-numeric>
                                                            <has-error :form="form" field="amount"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-5">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success font-weight-bold mr-2">Continue</button>
                                                        <button type="reset" class="btn btn-light-primary font-weight-bold">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->

                                <div v-if="investments && (parseInt(investments.length) === parseInt(level)) && maintenance.amount == 0">
                                    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                        <div class="alert-icon">
                                            <i class="flaticon-warning"></i>
                                        </div>
                                        <div class="alert-text">Your account have been placed on 100% upgrade for
                                            your {{maintenance.next_level | ordinal}} investment and
                                            maintenance fee. <b>Make A payment of ₦{{priceComma(maintenance_fee)}}
                                                to upgrade and activate your account</b>.</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">
																		<i class="ki ki-close"></i>
																	</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-success font-weight-bold mr-2"
                                                data-toggle="modal" data-target="#testimonyModal">Upgrade</button>
                                    </div>
                                </div>

                                <div v-else>
                                    <div class="alert alert-custom alert-light-info fade show mb-5" role="alert"
                                    v-if="investments && (parseInt(investments.length) === parseInt(level)) && !maintenance_merges">
                                        <div class="alert-icon">
                                            <i class="flaticon-warning"></i>
                                        </div>
                                        <div class="alert-text">You will be merged with whom to pay to soon.</div>
                                    </div>
                                    <div class="alert alert-custom alert-white alert-shadow fade show mb-5" role="alert"
                                         v-if="investments && (parseInt(investments.length) === parseInt(level)) && maintenance_merges">
                                        <div class="alert-text text-left">
                                            <div v-if="maintenance.withdrawal">
                                                <span class="text-primary">
                                                    <b>Pay to:</b> {{maintenance.withdrawal.user.bank.account_name}}</span><br>
                                                                <span>
                                                    <b>Account: </b> {{maintenance.withdrawal.user.bank.account_number}}
                                                    ({{maintenance.withdrawal.user.bank.bank_name}})
                                                </span><br>
                                                                <span>
                                                    <b>Phone: </b>  <a :href="'tel:'+maintenance.withdrawal.user.phone">{{maintenance.withdrawal.user.phone}}</a>
                                                    <a href="" class="btn btn-transparent-warning mr-1"> Report Phone</a>
                                                </span><br>
                                                            </div>
                                                            <span><b>Amount to Pay: </b> &#8358;{{priceComma(maintenance.amount)}}</span><br>
                                                            <div v-if="maintenance.withdrawal">
                                                <span>
                                                    <b>
                                                        Guider: </b> <a :href="'tel:'+maintenance.withdrawal.user.guider.phone">
                                                    {{maintenance.withdrawal.user.guider.phone}}</a>
                                                </span><br>
                                                                <span v-if="maintenance.withdrawal.user.referrer">
                                                    <b>Upline: </b> <a :href="'tel:'+maintenance.withdrawal.user.referrer.phone">
                                                    {{maintenance.withdrawal.user.referrer.phone}}</a>
                                                </span><br>
                                                            </div>
                                                            <span><b>Created: </b>{{maintenance.created_at | shortDateWithTime}}</span><br>
                                                            <span>
                                                <b>Status: </b>

                                                                <!-- Button trigger modal-->
                                                    <button type="button" v-if="maintenance_merges.length > 0" @click="viewMerges(maintenance)"
                                                            class="btn btn-transparent-primary font-weight-bold mr-2">
                                                        View Merges
                                                    </button>
                                                    <span class="text-center text-danger" v-else>
                                                        You will be merged with who to pay to you soon.
                                                    </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-body" v-else>
                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text"><b>You need to complete your profile before you can proceed to invest.
                                    </b></div>
                                </div>
                                <router-link :to="{name : 'editProfiles'}" class="btn btn-primary">Complete My Profile</router-link>
                            </div>


                            <div class="modal fade" id="testimonyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Write A Testimony</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <form action="" @submit.prevent="maintainAndUpgrade">
                                            <div class="modal-body">
                                                <div class="form-group mb-1">
                                                    <label for="reportTextarea">Testimony</label>
                                                    <textarea class="form-control" required id="reportTextarea" rows="3" v-model="testimony"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary font-weight-bold">Continue</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            &emsp;&emsp;
<!--                            <a href="#" class="btn btn-primary font-weight-bold px-5 py-3">Continue</a>-->
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 15-->
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
                amount: {},
                user: {},
                investments: {},
                maintenance_merges: {},
                last_investment: '',
                maintenance_fee: '',
                maintenance: '',
                testimony: '',
                level: '',
                images: [],
                fullPage: true,
                form : new Form({
                    id : '',
                    amount : '',
                    investment_id : '',
                    proof_document : [],
                })
            }
        },

        methods: {
            myInvestment(){
                axios.get('/api/investor/investments')
                    .then(result=>{
                        this.user = result.data.user;
                        this.maintenance_fee = result.data.bonus > 4999 ?
                            parseInt(result.data.bonus) * (30/100) :
                            result.data.last_investment ? parseInt(result.data.last_investment.amount) * (10/100) : 0;
                        this.maintenance = result.data.maintenance;
                        this.level = result.data.maintenance.next_level - 1;
                        this.investments = result.data.all_investments;
                        this.form.amount = result.data.user.minimum_investment;
                        this.maintenance_merges = result.data.maintenance_merges;
                        this.last_investment = result.data.last_investment;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.errorMessage()
                    })
            },

            createInvestment(){
                if(this.form.amount >= this.user.minimum_investment && this.form.amount <= this.user.maximum_investment)
                {
                    let loader = this.$loading.show();
                    this.form.post('api/investor/investments')
                        .then(result=>{
                            this.user = result.data.user;
                            this.form.amount = this.user.minimum_investment;
                            loader.hide();
                            swal.fire(
                                "Successful",
                                "Your investment request of <span class='text-success'>&#8358;"+this.priceComma(result.data.investment.amount)+
                                    "</span> was successful.",
                                "success",
                            ).then(result=>{
                                if(result.value)
                                {
                                    this.$router.push({name:'allInvestments'})
                                }
                            });
                            this.amount = result.data;
                            this.$Progress.finish();
                        })
                        .catch((error)=>{
                            this.errorMessage();
                        })
                }else{
                    swal.fire(
                        "Ooops!",
                        "You cannot invest <span class='text-danger'>&#8358;"+this.priceComma(this.form.amount)+
                        "</span> but can only invest between <b>&#8358;"+
                        this.priceComma(this.user.minimum_investment)+" - &#8358;"+
                        this.priceComma(this.user.maximum_investment)+"</b>",
                        "error"
                    )
                }

            },

            maintainAndUpgrade()
            {
                let maintenance_fee = this.maintenance_fee;
                Swal.fire({
                    title: "Upgrade?",
                    text: "Continue to make a payment of ₦"+this.priceComma(maintenance_fee)+".",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Proceed!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        let loader = this.$loading.show();
                        axios.post('/api/investor/maintenance', {'maintenance_fee':maintenance_fee, 'user_id':this.user.id, 'testimony':this.testimony})
                            .then(result=>{
                                loader.hide();
                                swal.fire(
                                    "Successful!",
                                    "You will be merged with who to pay to soon by the Admin.",
                                    "success"
                                );
                                Fire.$emit('ReloadInvestment');
                            })
                            .catch((error)=>{
                                toastr.error('Oops... An error just occurred.');
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
            },

            getMaintenance(maintenance)
            {
                this.maintenance = maintenance;
            },

            viewMerges(maintenance)
            {
                this.$router.push({name: 'maintenanceMerges', params: {id: maintenance.id}});
            }
        },

        created () {
            this.loadProgressBar();
            this.myInvestment();
            Fire.$on('ReloadInvestment', ()=>{
                this.myInvestment();
            })
        }
    }
</script>

<style scoped>

</style>
