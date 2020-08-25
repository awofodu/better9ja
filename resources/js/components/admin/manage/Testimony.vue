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
                            <div class="alert-text">ALL TESTIMONIES</div>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(testimony,index) in testimonies.data" :key="testimony.id">
                                        <th scope="row">{{index+1}}</th>
                                        <td>{{testimony.user.name}}</td>
                                        <td>{{testimony.user.email}}</td>
                                        <td>{{testimony.user.phone}}</td>
                                        <td>{{testimony.body}}</td>
                                        <td>
                                            <button class="btn btn-success btn-rounded" v-if="parseInt(testimony.is_approved) === 0"
                                            @click="approveTestimony(testimony)">Approve</button>
                                            <button class="btn btn-warning btn-rounded" v-else
                                            @click="approveTestimony(testimony)">Disapprove</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            &emsp;&emsp;
                            &emsp;&emsp;

                        </div>
                    </div>
                    <!--end::Example-->
                </div>

                <div class="card-footer">
                    <pagination :data="testimonies" @pagination-change-page="getResults">
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
                testimonies: {},
                user: '',
            }
        },

        methods: {
            allTestimonies()
            {
                axios.get('/api/admin/testimonies')
                    .then(result=>{
                        this.testimonies = result.data.testimonies;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            },

            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/admin/testimonies?page=' + page)
                    .then(result => {
                        this.testimonies = result.data.testimonies;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        // this.catchMessage();
                    });
            },

            approveTestimony(testimony)
            {
                Swal.fire({
                    title: "Approve?",
                    text: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Proceed!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios.get('/api/admin/testimonies/'+testimony.id)
                            .then(result=>{
                                toastr.success("Successful.");
                                Fire.$emit('ReloadTestimonies');
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
            this.allTestimonies();
            Fire.$on('ReloadTestimonies', ()=>{
                if(this.testimonies.current_page > 1)
                {
                    this.getResults(this.testimonies.current_page);
                }else{
                    this.allTestimonies();
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