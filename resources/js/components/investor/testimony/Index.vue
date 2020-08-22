<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="col-xl-12">
                <!--begin::Tiles Widget 15-->
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">My Testimony
                                <span class="d-block text-muted pt-2 font-size-sm">All our testimonies</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                  fill="#000000" opacity="0.3"></path>
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                  fill="#000000"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>Export
                                </button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choose an option:
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-print"></i>
																</span>
                                                <span class="navi-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
                                                <span class="navi-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
                                                <span class="navi-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
                                                <span class="navi-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
                                                <span class="navi-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->

                        <div class="table-responsive">

                            <table class="table table-hover table-striped mb-6">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Body</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(testimony, index) in testimonies.data" :key="testimony.id">
                                    <th scope="row">{{index+1}}</th>
                                    <td v-html="testimony.body"></td>
                                    <td>{{testimony.created_at | shortDateWithTime}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable-->
                    </div>

                    <div class="card-footer">
                        <pagination :data="testimonies" @pagination-change-page="getResults">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
                        </pagination>
                    </div>
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
                testimonies : {},
            }
        },

        methods: {
            allTestimonies(){
                axios.get('/api/investor/testimonies')
                    .then(result=>{
                        this.testimonies = result.data.testimonies;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    });
            },



            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('/api/investor/testimonies?page=' + page)
                    .then(result => {
                        this.testimonies = result.data.testimonie;
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        // this.catchMessage();
                    });
            }
        },

        created() {
            this.$Progress.start();
            this.allTestimonies();
            Fire.$on('ReloadTestimonies', ()=>{
                this.allTestimonies();
            });

        }
    }
</script>

<style scoped>

</style>