<template>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <h3 class="card-title">Profile Details</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title=""
                                  data-original-title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title=""
                                  data-original-title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form" @submit.prevent="updateProfile">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-xl-8">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                             style="background-image: url(../../../../../theme/html/demo1/dist/assets/media/users/blank.png)">
                                            <div class="image-input-wrapper"
                                                 :style="'background-image: url(/uploads/form.photo)'"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                   data-action="change" data-toggle="tooltip" title=""
                                                   data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" @change="changePhoto"
                                                       accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="profile_avatar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                  data-action="cancel" data-toggle="tooltip" title=""
                                                  data-original-title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
                                        </div>
                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Contact Info:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Full Name</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-user"></i>
																		</span>
                                                </div>
                                                <input type="text" disabled
                                                       class="form-control form-control-solid"
                                                       v-model="form.name" placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-at"></i>
																		</span>
                                                </div>
                                                <input type="text" disabled
                                                       class="form-control form-control-solid"
                                                       v-model="form.email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Contact Phone</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-phone"></i>
																		</span>
                                                </div>
                                                <input type="text"
                                                       class="form-control form-control-solid"
                                                       v-model="form.phone" disabled placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">User Type</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                   v-model="user_type" placeholder="Address" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">State</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" v-model="form.state">
                                                <option>Outside Nigeria</option>
                                                <option>ABUJA FCT</option>
                                                <option>ABIA</option>
                                                <option>ADAMAWA</option>
                                                <option>AKWA IBOM</option>
                                                <option>ANAMBRA</option>
                                                <option>BAUCHI</option>
                                                <option>BAYELSA</option>
                                                <option>BENUE</option>
                                                <option>BORNO</option>
                                                <option>CROSS RIVER</option>
                                                <option>DELTA</option>
                                                <option>EBONYI</option>
                                                <option>EDO</option>
                                                <option>EKITI</option>
                                                <option>ENUGU</option>
                                                <option>GOMBE</option>
                                                <option>IMO</option>
                                                <option>JIGAWA</option>
                                                <option>KADUNA</option>
                                                <option>KANO</option>
                                                <option>KATSINA</option>
                                                <option>KEBBI</option>
                                                <option>KOGI</option>
                                                <option>KWARA</option>
                                                <option>LAGOS</option>
                                                <option>NASSARAWA</option>
                                                <option>NIGER</option>
                                                <option>OGUN</option>
                                                <option>ONDO</option>
                                                <option>OSUN</option>
                                                <option>OYO</option>
                                                <option>PLATEAU</option>
                                                <option>RIVERS</option>
                                                <option>SOKOTO</option>
                                                <option>TARABA</option>
                                                <option>YOBE</option>
                                                <option>ZAMFARA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Address</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-solid" type="text"
                                                   v-model="form.address" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Bank Details:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Bank Name</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-solid" :disabled="disabled"
                                                    v-model="form.bank_code">
                                                <option :value="bank.code" v-for="bank in banks" :key="bank.code">
                                                    {{bank.name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Account Number</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-credit-card"></i>
																		</span>
                                                </div>
                                                <input type="number"
                                                       class="form-control form-control-solid"
                                                       v-debounce:4s="checkAccountDetails"
                                                       v-model="form.account_number" :disabled="disabled"
                                                       placeholder="Account Number"
                                                       oninput="javascript:if(this.value.length > this.maxLength)
                                                           this.value = this.value.slice(0, this.maxLength);"
                                                       :maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Account Name</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-solid">
                                                <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-user-alt"></i>
																		</span>
                                                </div>
                                                <input type="text"
                                                       class="form-control form-control-solid"
                                                       v-model="form.account_name" disabled="disabled"
                                                       placeholder="Account Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Support Pin:</h3>
                                    <div class="col-md-12 col-xxl-3 border-right-0 border-right-md border-bottom border-bottom-xxl-0">
                                        <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                                            <div class="d-flex flex-center position-relative mb-25">
														<span class="svg svg-fill-primary opacity-4 position-absolute">
															<svg width="175" height="200">
																<polyline
                                                                        points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline>
															</svg>
														</span>
                                                <span class="svg-icon svg-icon-5x svg-icon-primary">
															<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Shopping/Safe.svg-->
															<svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <polygon fill="#000000" opacity="0.3"
                                                                             transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) "
                                                                             points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
                                                                    <path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z"
                                                                          fill="#000000"
                                                                          transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
                                                                </g>
                                                            </svg>
                                                    <!--end::Svg Icon-->
														</span>
                                            </div>
                                            <span class="font-size-h1 d-block font-weight-boldest text-dark-75 py-2">{{form.support_pin}}</span>
                                            <h4 class="font-size-h6 d-block font-weight-bold mb-7 text-dark-50">Your
                                                support pin for today</h4>
                                            <p class="mb-15 d-flex flex-column">
                                            <h6 class="text-primary">Your 4-Digit Support PIN is required when you want
                                                to grant your Guider access
                                                to check and resolve issues on your account.
                                            </h6>
                                            <h6 class="text-primary">
                                                Please always keep your PIN secret and should never disclosed to anyone
                                                beside your Guider.
                                                You are only alowed to give it to your Guider when you believe your
                                                account may have an issue
                                                in regards to Merging.
                                            </h6>
                                            <h6 class="text-primary">
                                                Note that the system generates new Support PIN for your account
                                                everyday.
                                            </h6>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="my-5">
                                    <div class="card-footer bg-gray-100 border-top-0 text-right">
                                        <button type="submit" class="btn btn-success font-weight-bold mr-2"
                                                :disabled="submitBtnDisabled">Submit
                                        </button>
                                        <button type="button" @click="profileDetails"
                                                class="btn btn-light-primary font-weight-bold">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                    <!--end::Form-->
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
                account: {},
                fullPage: true,
                user_type: '',
                disabled: false,
                submitBtnDisabled: true,
                banks: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    state: '',
                    photo: '',
                    support_pin: '',
                    account_number: '',
                    account_name: '',
                    bank_code: '',
                })
            }
        },

        methods: {
            profileDetails() {
                axios.get('api/investor/profile')
                    .then(result => {
                        this.user_type = result.data.user.is_guider ? 'Guider' : 'Regular User';
                        this.form.fill(result.data.user);
                        this.form.account_number = result.data.bank ? result.data.bank.account_number : '';
                        this.form.account_name = result.data.bank ? result.data.bank.account_name : '';
                        this.form.bank_code = result.data.bank ? result.data.bank.bank_code : '';
                        this.disabled = result.data.bank ? true : false;
                        this.submitBtnDisabled = result.data.bank ? false : true;
                        this.banks = result.data.banks;
                        this.$Progress.finish()
                    }).catch(() => {

                })
            },

            checkAccountDetails(val, e) {
                let loader = this.$loading.show();
                // console.log(val) // => The value of the input
                // console.log(e) // => The event object
                axios.post('/api/investor/profile', {'account_number': val, 'bank_code': this.form.bank_code})
                    .then(result => {
                        if (result.data.status == true) {
                            this.form.account_name = result.data.data.account_name.replace(',', '');
                            toastr.success("Account Number verified with the name (" + this.form.account_name + ").");
                            this.disabled = true;
                            this.submitBtnDisabled = false;
                        } else {
                            toastr.error("Error! " + val + ". Check the details and try again.");
                        }
                        loader.hide();
                    })
                    .catch(() => {
                        toastr.error("Account Number verification failed. Please try again.");
                        // location.reload();
                        loader.hide();
                    });
            },

            updateProfile() {
                let loader = this.$loading.show();
                this.form.put('/api/investor/profile/' + this.form.id)
                    .then(result => {
                        Fire.$emit('ReloadUserInfo');
                        loader.hide();
                        toastr.success("Profile updated successfully.");

                    }).catch(() => {

                })
            },

            changePhoto(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                    };

                    reader.readAsDataURL(file)
                } else {
                    swal.fire({
                        title: 'Ooppss....',
                        text: "You are uploading a very large file",
                        type: 'error',
                    })
                }
            }
        },

        created() {
            this.$Progress.start();
            this.profileDetails();
            Fire.$on('ReloadUserInfo', () => {
                this.profileDetails();
            });

        }
    }
</script>

<style scoped>

</style>