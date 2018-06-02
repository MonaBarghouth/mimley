<template>

    <div class="panel panel-default">

        <div class="panel-heading"> </div>
            <div class="panel-body">
                <div class="notify_css"><span id="notifyType_css" class=""></span></div>

                <form v-on:submit.prevent="saveForm()" class="form-horizontal editprofile">

            <div class="">
                <div class="form-group">
                    <label class="col-md-4 control-label" >{{trans('editprofile.Enter old password')}}</label>

                    <div class="col-md-8">
                    <input type="password" v-model="password.password" class="form-control" >
                    </div>
                </div>

            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{trans('editprofile.Enter new password')}}</label>

                    <div class="col-md-8">

                        <input type="password" v-model="password.newpassword" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{trans('editprofile.Confirm a password')}}</label>

                    <div class="col-md-8">

                        <input type="password" v-model="password.password_confirmation" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary">
                            {{trans('editprofile.Save Changes')}}
                        </button>
                    </div>
                </div>
            </div>



        </form>

    </div>
        </div>

</template>

<script>
    export default {

        data: function () {
            return {
                password: {
                    password: '',
                    newpassword: '',
                    password_confirmation: '',
                }
            }

        },
        methods: {
            saveForm() {
                var app = this;
                var newpassword = app.password;
                axios.patch('/changePassword', newpassword)
                    .then(function (resp) {
                        app.password.password_confirmation=null;
                        app.password.newpassword=null;
                        app.password.password=null;

                        toastr.success('Password was change!','', {timeOut: 1000})
                        // $(".notify_css").toggleClass("active_css");
                        // $("#notifyType_css").toggleClass("success_css");
                        //
                        // setTimeout(function(){
                        //     $(".notify_css").removeClass("active_css");
                        //     $("#notifyType_css").removeClass("success_css");
                        // },2000);


                        // app.$router.replace('/api/v1/companies/' + app.companyId);
                       // alert("Saved");
                    })
                    .catch(function (resp) {
                        app.password.password_confirmation=null;
                        app.password.newpassword=null;
                        app.password.password=null;
                        toastr.error('Password not changed!','', {timeOut: 1000})
                        // console.log(resp);
                        // // alert("Could not create your Profile");
                        //     $(".notify_css").addClass("active_css");
                        //     $("#notifyType_css").addClass("failure_css");
                        //
                        //     setTimeout(function(){
                        //         $(".notify_css").removeClass("active_css");
                        //         $("#notifyType_css").removeClass("failure_css");
                        //     },2000);
                    });
            }
        }

    }



</script>

