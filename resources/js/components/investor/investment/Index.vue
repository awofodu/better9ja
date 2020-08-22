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
                <div class="alert-text text-warning" v-if="investments_chunk === 0">
                    You have not made any investment.
                </div>
                <div class="alert-text text-primary" v-if="investments_chunk.length > 0">
                    Investment Profiles.
                </div>

                <div class="text-right">
                    <router-link to="/invest" class="btn btn-primary mr-3">
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
                    </span>Invest</router-link>
                </div>
            </div>

            <div class="row" v-for="(investments, index) in investments_chunk" style="padding-bottom: 15px;">
                <div class="col-sm-4" v-for="(investment, index) in investments"
                     :key="investment.id"
                     v-if="parseInt(investment.is_paid) === 1 && parseInt(investment.is_withdrawn) === 0">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{investment.investment_id}}</span>
                                    <small>investment profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <span><b>Amount Paid: </b> &#8358;{{priceComma(investment.amount)}}</span><br>
                            <span><b>Amount to Receive: </b> &#8358;{{priceComma(investment.reward)}}</span><br>
                            <span><b>Date to Withdraw: </b>{{investment.withdrawal_date | shortDateWithTime}}</span><br>
                            <span><b>Created: </b>{{investment.created_at | shortDateWithTime}}</span><br>
                            <span><b>Status: </b>
                                <span class="text-success" v-if="parseInt(investment.is_paid) === 1
                                && $options.filters.isFuture(investment.withdrawal_date)">Paid</span>
                                <span class="text-warning" v-if="parseInt(investment.is_paid) === 1
                                && $options.filters.isPast(investment.withdrawal_date)">
                                    Ready for withdrawal</span>
                            </span><br><br>
                            <span class="text-center" v-if="parseInt(investment.is_paid) === 1
                                && $options.filters.isPast(investment.withdrawal_date)">
                                <a href="#" class="btn btn-primary btn-shadow font-weight-bold mr-2"
                                @click="withdrawInvestment(investment)">Withdraw</a>
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>

<!--                div for unpaid investment-->
                <div class="col-sm-4" v-for="(investment, index) in investments"
                     :key="investment.id"
                     v-if="parseInt(investment.is_paid) === 0">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label">
                                    <span class="text-primary" v-if="investment.withdrawal">
                                    Pay to {{investment.withdrawal.user.bank.account_name}}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <span>
                                    <b>ID: </b> {{investment.investment_id}}
                                </span><br>
                            </div>
                            <span><b>Amount to Pay: </b> &#8358;{{priceComma(investment.amount)}}</span><br>
                            <span><b>Amount Paid: </b> &#8358;{{priceComma(paid_investment)}}</span><br>
                            <span><b>Created: </b>{{investment.created_at | shortDateWithTime}}</span><br>
                            <span>
                                <b>Status: </b>
                                <!-- Button trigger modal-->
                                <button type="button" class="btn btn-transparent-primary font-weight-bold mr-2"
                                        data-toggle="modal" data-target="#proofModal"
                                        @click="getInvestment(investment)" v-if="investment.withdrawal">
                                    I have made payment
                                </button>
                                <!-- Button trigger modal-->
                                <button type="button" v-if="investment.merges.length > 0" @click="viewMerges(investment)"
                                        class="btn btn-transparent-primary font-weight-bold mr-2">
                                    View Merges
                                </button>

                                <span v-else class="text-danger">
                                    You would be merged with whom to pay to soon.</span>
<!--                                <span v-if="parseInt(investment.is_paid) === 1" class="text-info">-->
<!--                                    Please wait while the withdrawal-->
<!--                                    confirms your payment.-->
<!--                                </span>-->
                            </span>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>


<!--                div for withdrawn investment-->
                <div class="col-sm-4" v-for="(investment, index) in investments"
                     :key="investment.id"
                     v-if="parseInt(investment.is_paid) === 1 && parseInt(investment.is_withdrawn) === 1">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-list-3 text-primary"></i>
                                </span>
                                <h3 class="card-label"><span class="text-primary">{{investment.investment_id}}</span>
                                    <small>investment profile</small></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <span><b>ID: </b> {{investment.investment_id}}</span><br>
                            <span><b>Amount Paid: </b> &#8358;{{priceComma(investment.amount)}}</span><br>
                            <span><b>Amount to Receive: </b> &#8358;{{priceComma(investment.reward)}}</span><br>
                            <span><b>Amount Received: </b> &#8358;{{priceComma(investment.paid_amount)}}</span><br>
                            <span><b>Created: </b>{{investment.created_at | shortDateWithTime}}</span><br>
                            <span><b>Status: </b>
                                <span class="text-success">
                                    Withdrawn</span>
                            </span><br>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            &emsp;&emsp;
            <!--end::Card-->
            <!--end: Code-->


            <div class="card-footer">
                <pagination :data="investments" @pagination-change-page="getResults">
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
                investments_chunk: '',
                investments: {},
                merges: {},
                paid_investment: {},
                user: '',
                investment: '',
                name: 'Timer',
            }
        },

        methods: {
            myInvestments(){
                axios.get('/api/investor/investments')
                    .then(result=>{
                        this.investments_chunk = _.chunk(_.toArray(result.data.investments.data), 3); //result.data.investments
                        this.user = result.data.user;
                        this.investments = result.data.investments;
                        this.merges = result.data.merges;
                        this.paid_investment = result.data.paid_investment;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },

            withdrawInvestment(investment)
            {

                        swal.fire({
                            title: "Are you sure?",
                            html: "To withdraw your  <span class='text-success'> &#8358;"
                                +this.priceComma(investment.amount)+"</span>  you will have to " +
                                "recommit <span class='text-danger'> &#8358;"
                                +this.priceComma(investment.amount)+"</span> or higher.",
                        icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, proceed!",
                            cancelButtonText: "No, cancel!",
                            reverseButtons: true,
                    }).then((result) => {
                            if (result.value) {
                                // axios.delete('/api/investor/recommit/'+investment.id)
                                //     .then(result=>{
                                //
                                //     });
                                this.$router.push({name:'recommitWithdrawal', params: {id: investment.id}})
                                // Swal.fire(
                                //     "Deleted!",
                                //     "Your file has been deleted.",
                                //     "success"
                                // )
                                // result.dismiss can be "cancel", "overlay",
                                // "close", and "timer"
                            } else if (result.dismiss === "cancel") {
                                Swal.fire(
                                    "Cancelled",
                                    "Your imaginary file is safe :)",
                                    "error"
                                )
                            }
                        });
            },



            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/investor/investments?page=' + page)
                    .then(result => {
                        this.investments_chunk = _.chunk(_.toArray(result.data.investments.data), 3); //result.data.investments
                        this.user = result.data.user;
                        this.investments = result.data.investments;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.catchMessage();
                    });
            },

            viewMerges(investment)
            {
                this.$router.push({name: 'investmentMerges', params: {id: investment.id}});
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
            this.myInvestments();
            Fire.$on('ReloadInvestments', ()=>{
                if(this.investments.current_page > 1)
                {
                    this.getResults(this.investments.current_page);
                }else{
                    this.myInvestments();
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