<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->



            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title" style="margin-bottom: -18px;">
                        <div class="alert alert-custom gutter-b" role="alert">
                            <div class="alert-icon align-self-start mt-1">
                                <i class="flaticon2-layers-1 text-primary"></i>
                            </div>
                            <div class="alert-text">ALL REPORTS</div>
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
                                        <th scope="col">Reporting</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(report,index) in reports.data" :key="report.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td><span class="btn btn-link" @click="viewUser(report.reporter)"title="View User"
                                                  data-toggle="modal" data-target="#userModal">{{report.reporter.name}}</span></td>
                                        <td><span class="btn btn-link" @click="viewUser(report.reportee)"title="View User"
                                                  data-toggle="modal" data-target="#userModal">{{report.reportee.name}}</span></td>
                                        <td>{{report.message}}</td>
                                        <td>{{report.created_at | shortDateWithTime}}</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete Admin"
                                               @click="deleteReport(report)">
                                                <i class="la la-trash"></i></a>
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
                                                    <span><b>User Type: </b>{{user.is_guider ? 'Guider' : 'Regular'}}</span><br><br>
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

                            &emsp;&emsp;
                            &emsp;&emsp;

                        </div>
                    </div>
                    <!--end::Example-->
                </div>

                <div class="card-footer">
                    <pagination :data="reports" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div>
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
                reports: {},
                user: '',
            }
        },

        methods: {
            allReports()
            {
                axios.get('/api/admin/reports')
                    .then(result=>{
                        this.reports = result.data.reports;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },

            viewUser(user)
            {
                this.user = user;
            },

            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/reports?page=' + page)
                    .then(result => {
                        this.reports = result.data.reports;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
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
                                Fire.$emit('ReloadReports');
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

            deleteReport(report)
            {
                Swal.fire({
                    title: "Delete?",
                    text: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.delete('/api/admin/reports/'+report.id)
                            .then(result=>{
                                toastr.success("Report deleted successfully.");
                                Fire.$emit('ReloadReports');
                                this.$Progress.finish();
                            })
                            .catch(()=>{
                                toastr.error("Oops!... An error just occurred, please try again.");
                                this.$Progress.fail();
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
            }

        },

        created() {
            this.$Progress.start();
            this.allReports();
            Fire.$on('ReloadReports', ()=>{
                if(this.reports.current_page > 1)
                {
                    this.getResults(this.reports.current_page);
                }else{
                    this.allReports();
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
