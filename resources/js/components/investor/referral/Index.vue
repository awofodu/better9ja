<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Example-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Invite Your Friends And Earn Money
                                    <button type="button" class="btn btn-success"
                                            v-clipboard:copy="referral_link"
                                            v-clipboard:success="onCopy"
                                            v-clipboard:error="onError">Copy Link</button>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>You will be credited with a 5% bonus every investment your referred friends make. There are no limits to this.</p>
                            <p>Refer up to <b>15 Active Users</b> and become a <b>Guider</b></p>
                            <p><b>THE MORE YOUR FRIEND INVEST, THE MORE REWARDS YOU RECEIVE.</b></p>
                             <span class="text-success"><h4>Bonus:  &#8358; {{priceComma(bonus.bonus)}}.00</h4>
                                <button type="button" class="btn btn-dark mr-2" :disabled="disabled"
                                        @click="withdrawRefBonus()">Withdraw</button>
                             </span>
                            <div class="separator separator-dashed my-10"></div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <h4><b>You can invite friends through the following ways:</b></h4>
                                    <p>
                                    <ol>
                                        <li>Send an email to your contacts with your referral link.</li>
                                        <li>Send an SMS to your phone contacts with your referral link</li>
                                        <li>Share your referral link on your social networks.</li>
                                    </ol>
                                    </p>
                                </div>
                                <div class="col-xl-6">
                                    <h4><b>Steps to become a friend referree:</b></h4>
                                    <p>
                                    <ol>
                                        <li>Your friends click on your referral link.</li>
                                        <li>Each of them fills the form and creates an account with the link.</li>
                                        <li>The system permanently links them to you.</li>
                                    </ol>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <br><br>


            <!--begin::Card-->
            <div class="col-xl-12">
                <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                    <div class="alert-icon align-self-start mt-1">
                        <i class="flaticon2-user-1 text-primary"></i>
                    </div>
                    <div class="alert-text">YOUR GUIDER OR REFERER</div>
                </div>

                <!--begin::Tiles Widget 15-->
                <div class="row">
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 5-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center py-0 mt-8">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                                    <a href="#" class="card-title font-weight-bolder text-dark-75
                                    font-size-h5 mb-2 text-hover-primary">{{user.guider.name}}</a>
                                    <span class="font-weight-bold text-muted font-size-lg">{{user.guider.phone}}</span>
                                    <span class="font-weight-bold text-info font-size-lg">Guider</span>
                                </div>
                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/014-girl-7.svg"
                                     alt="" class="align-self-end h-100px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 5-->
                    </div>
                    <div class="col-xl-4" v-if="user.referrer">
                        <!--begin::Stats Widget 4-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center py-0 mt-8">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                                    <a href="#" class="card-title font-weight-bolder text-dark-75
                                    font-size-h5 mb-2 text-hover-primary">{{user.referrer.name}}</a>
                                    <span class="font-weight-bold text-muted font-size-lg">{{user.referrer.phone}}</span>
                                    <span class="font-weight-bold text-success font-size-lg">Referrer</span>
                                </div>
                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/029-boy-11.svg"
                                     alt="" class="align-self-end h-100px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 4-->
                    </div>
<!--                    <div class="col-xl-4">-->
<!--                        &lt;!&ndash;begin::Stats Widget 6&ndash;&gt;-->
<!--                        <div class="card card-custom card-stretch gutter-b">-->
<!--                            &lt;!&ndash;begin::Body&ndash;&gt;-->
<!--                            <div class="card-body d-flex align-items-center py-0 mt-8">-->
<!--                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">-->
<!--                                    <a href="#"-->
<!--                                       class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Opeyemei</a>-->
<!--                                    <span class="font-weight-bold text-muted font-size-lg">0904434343</span>-->
<!--                                    <span class="font-weight-bold text-danger font-size-lg">Not Active</span>-->
<!--                                </div>-->
<!--                                <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/004-boy-1.svg"-->
<!--                                     alt="" class="align-self-end h-100px">-->
<!--                            </div>-->
<!--                            &lt;!&ndash;end::Body&ndash;&gt;-->
<!--                        </div>-->
<!--                        &lt;!&ndash;end::Stats Widget 6&ndash;&gt;-->
<!--                    </div>-->
                </div>
                <!--end::Tiles Widget 15-->
            </div>
            <!--end::Card-->
            <!--begin::Card-->

            <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title" style="margin-bottom: -18px;">
                    <div class="alert alert-custom" role="alert">
                        <div class="alert-icon align-self-start mt-1">
                            <i class="flaticon-rotate text-primary"></i>
                        </div>
                        <div class="alert-text">REFERRED INVESTORS</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Example-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">

                            <table class="table table-hover table-striped mb-6">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(referral, index) in referrals.data" :key="referral.id">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{referral.name}}</td>
                                    <td>{{referral.phone}}</td>
                                    <td>
                                        <span class="label label-inline label-light-success font-weight-bold" v-if="parseInt(referral.is_activated) === 1">
                                            Active</span>
                                        <span class="label label-inline label-light-danger font-weight-bold" v-else>Not Active</span>
                                    </td>
                                    <td>{{referral.created_at | shortDateWithTime}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--end::Example-->
            </div>

            <div class="card-footer">
                <pagination :data="referrals" @pagination-change-page="getResults">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>
            </div>
        </div>
            <!--end::Card--> <br><br>
            <!--begin::Card--><div class="card card-custom">
            <div class="card-header">
                <div class="card-title" style="margin-bottom: -18px;">
                    <div class="alert alert-custom gutter-b" role="alert">
                        <div class="alert-icon align-self-start mt-1">
                            <i class="flaticon2-layers-1 text-primary"></i>
                        </div>
                        <div class="alert-text">REFERRED EARNINGS</div>
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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(earning, index) in  earnings.data">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{earning.user.name}}</td>
                                    <td>{{priceComma(earning.amount)}}</td>
                                    <td>
                                    <span class="label label-inline label-light-primary font-weight-bold">
                                        {{earning.percentage}}</span>
                                    </td>
                                    <td>{{earning.created_at | shortDateWithTime}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--end::Example-->
            </div>

            <div class="card-footer">
                <pagination :data="earnings" @pagination-change-page="getResults">
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
                referrals : {},
                user: {},
                bonus: '',
                earnings: {},
                referral_link: '',
                price : '',
                disabled: false,
            }
        },

        methods: {
            allReferrals(){
                axios.get('/api/investor/referrals')
                    .then(result=>{
                        this.referrals = result.data.referrals;
                        this.user = result.data.user;
                        this.bonus = result.data.bonus;
                        this.earnings = result.data.earnings;
                        this.disabled = result.data.bonus.bonus < 1000 ? true : false;
                        this.referral_link = 'https://better9ja.localhost/register/'+this.user.referral_id;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    });
            },



            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/investor/referrals?page=' + page)
                    .then(result => {
                        this.referrals = result.data.referrals;
                        this.user = result.data.user;
                        this.bonus = result.data.bonus;
                        this.earnings = result.data.earnings;
                        this.disabled = result.data.bonus.bonus < 1000 ? true : false;
                        this.referral_link = 'https://better9ja.localhost/register/'+this.user.referral_id;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        // this.catchMessage();
                    });
            },

            onCopy: function (e) {
                toastr.success('Referral Link Copied!')
            },
            onError: function (e) {
                alert('Failed to copy texts')
            },

            withdrawRefBonus()
            {

                swal.fire({
                    title: "Withdraw your "+this.bonus.bonus+" referral bonus?",
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
                        axios.put('/api/investor/referrals/'+this.user.id, {'price':this.bonus.bonus})
                            .then(result=>{
                                swal.fire(
                                    "Successful!",
                                    "Your referral bonus has been withdrawn.",
                                    "success"
                                );
                                Fire.$emit('ReloadReferrals');
                            })
                            .catch((err)=>{

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

        created() {
            this.$Progress.start();
            this.allReferrals();
            Fire.$on('ReloadReferrals', ()=>{
                this.allReferrals();
            });

        }
    }
</script>

<style scoped>

</style>